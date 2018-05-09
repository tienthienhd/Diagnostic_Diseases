<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Disease;

class MainController extends Controller
{

    public function getHome(){
        return view('home');
    }

    public function getPredict(){
        return view('predict');
    }

    public function getSearch(){
    	$categories = Category::all();
    	$diseases = array();
    	foreach ($categories as $key => $value) {
    		$ds = Disease::where('idcat', $value['id'])->get();
    		$diseases[$value['id']] = $ds;
    	}
    	// $disease = Disease::where('id', $id)->get();
    	return view('search', compact('categories', 'diseases'));
    }

    public function getDisease(Request $request){
        $id = $request->input('id');
        $disease = Disease::where('id', $id)->first();
        // dd($disease);

        $categories = Category::all();
        $diseases = array();

        foreach ($categories as $key => $value) {
            $ds = Disease::where('idcat', $value['id'])->get();
            $diseases[$value['id']] = $ds;
        }
        return view('disease_info', compact('disease', 'categories', 'diseases'));
    }

    public function getPredictResult(Request $request){
        // if($request->ajax()){
        $symptoms = $request->get('content');

        $param = str_replace(',', ' ', $symptoms);
        
        $cmd = "C:/ProgramData/Anaconda3/python.exe C:/usersetup/xampp/htdocs/Diagnostic_Diseases/PredictDiseases/AI/DiseasePredict.py " . $param;
        
        
        exec($cmd, $output, $return);

        if(!$return){

            $output = array('result' => $output);

        } else {
            foreach ($output as $value) {
                echo $value . "<br/>";
            }
            echo "<br/><h2 style='background-color: red'>call failure</h2>";
            echo $cmd;
        }

        return response($output);
        // } else {
        //     echo "not ajax";
        // }
    }

    public function getAccount(){
        return view('account');
    }

}
