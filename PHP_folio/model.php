<?php 
	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "test_db";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}
        //update api
		public function apiUpdate ($id, $filename){
			$query = "UPDATE images SET image_url = '$filename' WHERE id='$id';";
			if ($this->conn->query($query)){
				return true;
			}

			return false;
		}
		// save api
		public function apiSave ($filename){
			$query = "INSERT INTO images (image_url) VALUES ('$filename')";
			if ($this->conn->query($query)){
				return true;
			}

			return false;
		}

		public function readByID ($filename){
			$id =filter_user_data($_GET["id"]);
			$query = "SELECT * FROM images where id in (".$id.")";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}
		public function insertUpdatedImage($only_file_name, $id){
			//$query = "INSERT INTO images (update_image_url) VALUES ('$image_data')";
			$query = "UPDATE images SET update_image_url = '$only_file_name' WHERE id='$id';";
			if ($this->conn->query($query)){
				return true;
			}
			return $data;
		}
		public function insert(){

			if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
				
				 $allowedTypes = array(
					'image/png',
					'image/jpg',
					'image/jpeg'
				  );
				  $fileSize = 1*1024*1024;
				  $messege ="";
				  $filename = $_FILES['my_image']['name'];
				  
				  $tempname = $_FILES['my_image']['tmp_name'];
				 
				  $file_type = $_FILES['my_image']['type'];
				  $file_size = $_FILES['my_image']['size'];
				  $folder = "images/" .$filename;			
			  
				  // execute query
				  
				  $query = "INSERT INTO images (image_url) VALUES ('$filename')";			
			  
				  // check file type for security purposes
			  
				  if(in_array($file_type, $allowedTypes) !=false &&  $file_size < $fileSize){
					  if(move_uploaded_file( $tempname,  $folder )){
						if ($sql = $this->conn->query($query)) {	
							$_SESSION['status'] = "Image uploaded suceessfully";
						}else{
							$_SESSION['status'] = "Image uploaded failed";
						}
						
						$messege ="Photo Uploaded Successfully";
					  }
					  else{
						$_SESSION['status'] = "Image uploaded failed";
					  }
				  }
				
			}
				

			
		}

		public function fetch(){
			$data = null;

			$query = "SELECT * FROM images";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){

			$query = "DELETE FROM images where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				
				return true;
				$_SESSION['status'] = "Image deleted suceessfully";
			}else{
				$_SESSION['status'] = "Image cant deleted";
				return false;
				
			}
		}

		public function fetch_single($id){

			$data = null;

			$query = "SELECT * FROM images WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($id){

			$data = null;

			$query = "SELECT * FROM images WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE images SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

	}


 ?>