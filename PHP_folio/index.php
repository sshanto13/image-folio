<?php 
session_start();
header('Access-Control-Allow-Origin: *');
include_once"app.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Imagefolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<!-- header start-->
<header class="bg-white t-b-1 py-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="assets/logo.png" alt="imagefolio">
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<!-- image container started-->
<section class="bg-gray p-b-68">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-left py-5 text-black">Media Library</h2>
            </div>
            <div class="col-12">
            <?php 
                if(isset($_SESSION['status']))
                    {
                        ?>
                           <div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <?= $_SESSION['status']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php 
                        unset($_SESSION['status']);
                        
                    }
                ?>
            </div>

        </div>
        <div class="image-show py-5 px-5 bg-white">
            <div class="row px-5 ">
                <div class="col-12">

                     <?php
                         $model = new Model();   
                         $insert = $model->insert();
                         $rows = $model->fetch();
                         $number_of_image= $rows;     
                     ?>
                    <?php 
                    if($number_of_image != null){
                        $total_images = count($number_of_image);
                    }
                    else{
                        $total_images ="No Items";
                    }
                   ?>
                    <h6 class="seleted-item-number"><?php  echo"$total_images Items"?></h6>
                </div>
                <?php
                
                  $i = 1;
                  if(!empty($rows)){
                    foreach($rows as $row){ 
                  ?>

                <div class="col-sm-4 mb-3">                  
                    <div class="card mb-1">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" >
                            <div class="card-body home-show-card">
                                
                            <img class="card-img-top"  src="http://localhost/PHP_folio/images/<?php 
                            if($row['update_image_url']){
                                echo $row['update_image_url'];
                            }
                            else{
                                echo $row['image_url'];
                            }
                            ?>">
                               
                            </div>
                            
                        </a>
                        <p class="card-text"><?php echo $row['image_url']; ?> </p>                        
                    </div>
					<div class="btn-group d-none" role="group" aria-label="Basic example">
						<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn delete-btn">Delete</a>
					</div>
					
                </div>
                <?php
                }
                  }else{
                  echo "no data";
                  }
  	             ?>   
            </div>

        </div>
      
		<!-- upload image button area-->
		<div class="upload-btn-area px-5 py-3 ">
			<form method="POST"  enctype="multipart/form-data">
				<div class="row px-5">
                    <div class="col-9">
						<div class="variants">
							<div class='file'>
							<label for='input-file'>
							<img src="assets/cloud-upload-alt-solid.svg" alt=""> <span class="ml-2">Drag and Drop or <span style="color: blue">Browse for files</span></span>
							</label>
							<input id='photo' name="my_image" type='file' />
							</div>
						</div>
					</div>
					<div class="col-3 text-right">
                        <button type="submit" name="submit" class="btn btn-lg btn-primary upload-btn"> Upload Image</button>
					</div>
				</div>
			</form>
        </div>
    </div>
</section>
<!-- image container end-->

</body>
</html>

                