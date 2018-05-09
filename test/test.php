<?php
	exec("C:/ProgramData/Anaconda3/python.exe E:/Code/term6/knowlegde_base_system/doctorAI4/DiseasePredict.py itching yellow_crust_ooze", $output, $return);

	foreach ($output as $key => $value) {
		print($value . "<br>");
	}

	if(!$return){
		echo "<br> end ok";
	} else {
		echo "<br> call failure";
	}
?>