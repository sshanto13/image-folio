<!DOCTYPE html>
<html lang="en">
<head>
    <title>Imagefolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/styles.css">
    <link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet">
    <link type="text/css" href="css/service-basic.css" rel="stylesheet">
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
<!-- header header end-->
<!-- image container started-->
<section class="bg-gray">
    <div class="container">
        <div class="row">
            <div class="col">
				<?php
					include 'model.php';
					$model = new Model();
					$id = $_REQUEST['id'];
					$row = $model->edit($id);
				?>
                <h2 class="text-left py-5 text-black"><?php echo $row['image_url']; ?></h2>
				<p id="myDIV" style="display:none"><?php echo $row['id']; ?></p>
            </div>
        </div>
    </div>
        
    <div class="container">
	<div class="image-show py-5 px-5 bg-white">
		 <div class="row ">
			<div class="col-12">
				<div class="tui-image-editor" >

				</div>
				<div class="tui-image-editor-controls">
					<ul class="menu">
					  <li class="menu-item" id="btn-image-filter">Filter</li>
					  <li class="menu-item" id="btn-crop">Crop</li>
					  <li class="menu-item" id="btn-flip">Flip</li>
					  <li class="menu-item" id="btn-rotation">Rotation</li>
					  <li class="menu-item disabled" id="btn-undo">Undo</li>
					  <li class="menu-item disabled" id="btn-redo">Redo</li>
					  
					</ul>
					<div class="sub-menu-container" id="crop-sub-menu">
					  <ul class="menu">
						<li class="menu-item" id="btn-apply-crop">Apply</li>
						<li class="menu-item" id="btn-cancel-crop">Cancel</li>
					  </ul>
					</div>
					<div class="sub-menu-container" id="flip-sub-menu">
					  <ul class="menu">
						<li class="menu-item" id="btn-flip-x">FlipX</li>
						<li class="menu-item" id="btn-flip-y">FlipY</li>
						<li class="menu-item" id="btn-reset-flip">Reset</li>
						<li class="menu-item close">Close</li>
					  </ul>
					</div>
					<div class="sub-menu-container" id="rotation-sub-menu">
					  <ul class="menu">
						<li class="menu-item" id="btn-rotate-clockwise">Clockwise(30)</li>
						<li class="menu-item" id="btn-rotate-counter-clockwise">Counter-Clockwise(-30)</li>
						<li class="menu-item no-pointer">
						  <label>
							Range input
							<input id="input-rotation-range" type="range" min="-360" value="0" max="360">
						  </label>
						</li>
						<li class="menu-item close">Close</li>
					  </ul>
					</div>
					<div class="sub-menu-container" id="rotation-sub-menu">
					  <ul class="menu">
						<li class="menu-item" id="btn-rotate-clockwise">Clockwise(30)</li>
						<li class="menu-item" id="btn-rotate-counter-clockwise">Counter-Clockwise(-30)</li>
						<li class="menu-item no-pointer">
						  <label>
							Range input
							<input id="input-rotation-range" type="range" min="-360" value="0" max="360">
						  </label>
						</li>
						<li class="menu-item close">Close</li>
					  </ul>
					</div> 
					<div class="sub-menu-container" id="image-filter-sub-menu">
					  <ul class="menu">
						<li class="menu-item align-left-top">
						  <table>
							<tbody>
							  <tr>
								<td>
								  <label><input type="checkbox" id="input-check-grayscale">Grayscale</label>
								</td>
								<td>
								  <label><input type="checkbox" id="input-check-invert">Invert</label>
								</td>
								<td>
								  <label><input type="checkbox" id="input-check-sepia">Sepia</label>
								</td>
							  </tr>
							  <tr>
								<td>
								  <label><input type="checkbox" id="input-check-sepia2">Sepia2</label>
								</td>
								<td>
								  <label><input type="checkbox" id="input-check-blur">Blur</label>
								</td>
								<td>
								  <label><input type="checkbox" id="input-check-sharpen">Sharpen</label>
								</td>
							  </tr>
							  <tr>
								<td>
								  <label><input type="checkbox" id="input-check-emboss">Emboss</label>
								</td>
							  </tr>
							</tbody>
						  </table>
						</li>
					   
						<li class="menu-item close">Close</li>
					  </ul>
					</div>
				</div>
			</div>
		 </div>
		</div>
    </div>
</section>
<section class="save-area bg-white">
	<div class="container">	
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-6 mb-3 mt-3">
				<li class="menu-item revert-li" ><button class="btn revert-edit-btn mr-2" onclick="history.go(-1);" >Back </button></li>			
				<li class="menu-item border mr-2" id="btn-download">Download</li>
				<li class="menu-item border btn-save" id="btn-save">Save</li>							
			</div>
		</div>
    </div>
</section>
    <script type="text/javascript" src="https://api-storage.cloud.toast.com/v1/AUTH_e18353c4ea5746c097143946d0644e61/toast-ui-cdn/tui-image-editor/v3.11.0/example/fabric-v4.2.0.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
    <script type="text/javascript" src="js/tui-image-editor.js"></script>
    <script src="js/service-basic.js"></script>
	
    <script>
    	var imgURL = 'http://localhost/PHP_folio/images/'+'<?php  echo $row['image_url']; ?>';
        imageEditor.loadImageFromURL(imgURL, 'SampleImage').then(function (sizeValue) {
        console.log(sizeValue);
        imageEditor.clearUndoStack();
        });
        var image_id = $('#myDIV').html();
        $('#btn-save').click(function(){
      
          var imageDataURL = imageEditor.toDataURL();
		      //var url = window.location.href
            jQuery.ajax({
                url: 'http://localhost/PHP_folio/saveImage.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: image_id, // id of the image
                    screen_shot: imageDataURL
                },
                success: function (response, textStatus, jqXHR) {
					alert('Image Saved Successfully');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(jqXHR.message);
                }
            });

          });
    </script>
	</body>
</html>