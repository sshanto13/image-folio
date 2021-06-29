<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    //exit("working");
    include_once '../model.php';
    $model = new Model(); 

    $id = $_GET['id'];
    //exit( $id );
    $data['rows'] = $model->fetch_single($id);
    if(isset($_GET["id"])){
       if (count ($data['rows']) == 0 ){
        echo json_encode(
            array("message" => "No record found.")
        );
    }else{
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode( $data['rows']);
    }
    exit;
    }
      
    else{
        http_response_code(404);
        echo json_encode("ID not found.");
    }
?>