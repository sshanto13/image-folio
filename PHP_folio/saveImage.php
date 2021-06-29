<?php
    include_once 'model.php';
    saveImage();
	function saveImage(){
		$id = $_REQUEST['id'];
		$screen_shot = $_REQUEST['screen_shot'];
		$file_name = imageSaver($screen_shot, $id);
       // $file_to_db = saveUpdatedImage($screen_shot, $id);
        //exit($file_to_db);
	    //response($message, false, ["chat_data" => $chatData['chats'], "totalImages"=>$chatData['totalImages']], false);
    }
	function imageSaver($image_data, $id){
    	list($type, $data) = explode(';', $image_data); // exploding data for later checking and validating
    	if (preg_match('/^data:image\/(\w+);base64,/', $image_data, $type)){
        	$data = substr($data, strpos($data, ',') + 1);
        	$type = strtolower($type[1]); // jpg, png, gif
        	if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
            	throw new \Exception('invalid image type');
        	}
        	$data = base64_decode($data);
        	if ($data === false) {
            	throw new \Exception('base64_decode failed');
        	}
        	//$dirName = __DIR__. DIRECTORY_SEPARATOR . 'images'. DIRECTORY_SEPARATOR .$id.".". $type;	
            $dirName = __DIR__. DIRECTORY_SEPARATOR . 'images';
            
            if (!file_exists($dirName)){
        		mkdir($dirName, 0777, TRUE);
        	}
            $fqpn = $dirName . DIRECTORY_SEPARATOR . $id.".". $type;
            $only_file_name = $id.".". $type;
    		if(file_put_contents($fqpn, $data)){
        		$result = $id.".". $type ;
                $model = new Model();
                $model->insertUpdatedImage($only_file_name, $id);
				
    		}else{
        		$result =  "error";
    		}
    		/* it will return image name if image is saved successfully
    		or it will return error on failing to save image. */
    		return $result;
		}
	}
