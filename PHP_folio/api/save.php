<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    include_once '../model.php';

    if($_SERVER["REQUEST_METHOD"] !== 'POST'){
    	echo json_encode(array("message" => "Submit form using POST method."));
		exit;
    }

	$allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
    $allowedSize  = 1*1024*1024;
	$messege   = "";
	$filename  = $_FILES['my_image']['name'];
	$tempname  = $_FILES['my_image']['tmp_name'];
	$file_type = $_FILES['my_image']['type'];
	$file_size = $_FILES['my_image']['size'];
	$folder    = "../images/" .$filename;
    //exit($folder);
	if(in_array($file_type, $allowedTypes) &&  ($file_size <= $allowedSize)){
		if(move_uploaded_file( $tempname,  $folder )){

    		$model = new Model();
    		if ($model->apiSave($filename)){
				$data = [];
				$data["message"] = "data saved successfully";
				$data["status"] = "Ok";
				echo json_encode($data);    
				exit;
    		}else{
				$data = [];
				$data["message"] = "failed to save into database";
				$data["status"] = "error";
				echo json_encode($data);    
				exit;
    		}    		
	  	}
	  	else{
	  		//file upload error
			$data = [];
			$data["message"] = "Upload failed";
			$data["status"] = "error";
			echo json_encode($data);    
			exit;
	  	}
	}else{
		$data = [];
		$data["message"] = "Invalid file type or wrong file size";
		$data["status"] = "error";
		echo json_encode($data);    
		exit;
	}