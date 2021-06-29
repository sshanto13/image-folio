<?php
    header("Access-Control-Allow-Origin: *");
    
    include_once '../model.php';
    $model = new Model();   
    $data['rows'] = $model->fetch();

	if (count ($data['rows']) == 0 ){
        echo json_encode(
            array("message" => "No record found.")
        );
	}else{
    	header("Content-Type: application/json; charset=UTF-8");
	    echo json_encode( $data['rows']);
	}
	exit;
?>