<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class predictdiseases extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
	}

	public function index()
	{
		
		$string1 = file_get_contents(base_url()."Symptom.txt");
		$string1 = explode("\n", $string1);

		$string2 = file_get_contents(base_url()."Diseases.txt");
		$string2 = explode("\n", $string2);

		// echo "<pre>";
		// var_dump($string);
		// echo "</pre>";
		$user = false;

		$ketqua = array('diseases' => $string2, "symptoms" => $string1, 'isLogin' => $user);
		$this->load->view('predictdiseases_view',$ketqua);
	}
	public function result(){
		$param = $this->input->post('param');
		
		$cmd = "C:/Anaconda3/python.exe C:/Apache24/htdocs/PredictDiseases/AI/DiseasePredict.py " . $param;
		
		
		exec($cmd, $output, $return);
		// foreach ($output as $key => $value) {
		// 	echo '<pre>';
		// 	var_dump($value);
		// 	echo '</pre>';
		// }

		if(!$return){
			
			$output = array('result' => $output);
			$this->load->view('success_view', $output);
		} else {
			foreach ($output as $value) {
				echo $value . "<br/>";
			}
			echo "<br/><h2 style='background-color: red'>call failure</h2>";
			echo $cmd;
		}
		
	}
	public function login(){
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$this->load->model('authentication_model');
		$users = $this->authentication_model->getAllData();

		$info = false;
		foreach ($users as $user) {
			if($user['email']==$email){
				if($user['password']==$pass){
					$info = $user;
				}
			}
		}
		$string1 = file_get_contents(base_url()."Symptom.txt");
		$string1 = explode("\n", $string1);

		$string2 = file_get_contents(base_url()."Diseases.txt");
		$string2 = explode("\n", $string2);
		

		$ketqua = array('diseases' => $string2, "symptoms" => $string1, 'isLogin' => $info);
		$this->load->view('predictdiseases_view',$ketqua);
	}

}

/* End of file predictdiseases.php */
/* Location: ./application/controllers/predictdiseases.php */