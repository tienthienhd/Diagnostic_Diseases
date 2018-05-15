<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Disease;
use App\FeedBack;

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

    public function getPredictResult1(Request $request){
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

    public function getPredictResult(Request $request){
        $symptoms = $request->get('content');
        $param = str_replace(',', ' ', $symptoms);

        $port = 1997;
        $address = 'HPZbook15-PC';

        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if($socket === false){
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
            return 'false';
        }
        $result = socket_connect($socket, $address, $port);
        if($result === false){
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
            return 'false';
        }
        socket_write($socket, $param, strlen($param));
        $bytes = socket_recv($socket, $predict_result, 3000, MSG_WAITALL);
        // $predict_result
        socket_close($socket);
        return response($predict_result);
    }

    public function getAccount(){
        return view('account');
    }

    public function savePredict(Request $request){
        $symptoms = $request->get('symptoms');
        $diseases = $request->get('diseases');
        $evaluations = $request->get('evaluations');

        $s = "";
        foreach ($symptoms as $key => $value) {
            $s .= $value . ';';
        }
        $s = rtrim($s, ";");

        $d = "";
        foreach ($diseases as $key => $value) {
            $d .= $value . ';';
        }
        $d = rtrim($d, ";");

        $e = "";
        foreach ($evaluations as $key => $value) {
            $e .= $value . ';';
        }
        $e = rtrim($e, ";");    

        $feedback = new FeedBack;
        $feedback->symptoms = $s;
        $feedback->diseases = $d;
        $feedback->evaluation = $e;
        $feedback->save();

        return "ok";
    }

    public function getExpert(){
        $feedbacks = FeedBack::all();
        $fb = [];
        foreach ($feedbacks as $key => $value) {
            $symptoms = $value['symptoms'];
            $symptoms = explode(";", $symptoms);
            // dd($symptoms);

            $diseases = $value['diseases'];
            $diseases = explode(";", $diseases);
            // dd($diseases);

            $evaluation = $value['evaluation'];
            $evaluation =  str_replace('1', 'Đúng', $evaluation);
            $evaluation =  str_replace('0', 'Sai', $evaluation);
            $evaluation = explode(";", $evaluation);
            // dd($evaluation);

            $countDiseases = count($diseases);
            $countSymptoms = count($symptoms);
            // dd($count);

            array_push($fb, ['symptoms'=>$symptoms, 'diseases'=>$diseases, 'evaluation'=>$evaluation, 'countDiseases'=>$countDiseases, 'countSymptoms'=>$countSymptoms]);

        }
        // dd($fb);
        return view('expert', compact('fb'));
    }

    public function expertDone(){
        FeedBack::truncate();
        return "ok";
    }

}
