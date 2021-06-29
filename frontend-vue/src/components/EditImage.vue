<template>
  <div>
<section class="bg-gray">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-left py-5 text-black">{{image.image_url}}</h2>
                <p id="myDIV" style="display:none">{{image.id}}</p>
            </div>
        </div>
    </div>  
    <div class="container  pb-5">
      <div class="tui-image-editor bg-white px-5 py-5" >
            
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
 
     </section>  
     <section class="save-area bg-white">
	<div class="container">	
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-6 mb-3 mt-3">
					<li class="menu-item revert-li d-none" ><button class="btn revert-edit-btn mr-2" onclick="history.go(-1);" >Back </button></li>
				    <li class="menu-item revert-li"> <a  class="btn revert-edit-btn mr-2" href="#" >Revert</a></li>
					<li class="menu-item border mr-2" id="btn-download">Download</li>
					<li class="menu-item border btn-save" @click="saveImage" id="btn-save">Save</li>					
			</div>
		</div>
    </div>

</section>  
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return {
            image:[],
            siteBaseUrl: 'http://localhost/PHP_folio/images/',
            imageEditor:[],
        }
    },
    methods: {  
        saveImage(){
            axios.post('http://localhost/PHP_folio/saveImage.php').then( response => 
            alert('Image Saved Successfully')                 
          )
        }
    },
    created() {   
        axios.get( 'http://localhost/PHP_folio/api/readByID.php?id='+this.$route.params.id).then(response =>
          //console.log(response)
        this.image = response.data   
          
        );
        
    },
}
</script>

<style>
  @import '../assets/css/service-basic.css';
</style>