<template>
    <div>                
        <section class="bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="text-left py-5 text-black">Media Library</h2>
                    </div>
                </div>
                <div class="image-show py-5 px-5 bg-white">
                    <div class="row px-5 ">
                        <div class="col-12">
                            <h6 class="seleted-item-number">Items</h6>
                        </div>
                        <div class="col-sm-4 mb-3" v-for="image in images" :key="image.id">
                            <div class="card mb-1">
                            <router-link :to="{ path: '/edit/' + image.id}" class="d-block product-image h-100">	
                                <div class="card-body home-show-card">
                                    <img class="card-img-top"  :src="siteBaseUrl+image.image_url">                                   
                                </div>
                            </router-link>
                            <p class="card-text">{{image.image_url}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="upload-btn-area px-5 py-3 mb-5 ">                                     
                    <div class="row px-5">
                        <div class="col-9">
                                <div class="variants">
                                    <div class='file'>
                                    <label for='input-file'>
                                    <img src="assets/cloud-upload-alt-solid.svg" alt=""> <span class="ml-2">Drag and Drop or <span style="color: blue">Browse for files</span></span>
                                    </label>
                                       <input type='file' name="my_image" @change="onFileSelected"/>
                                    </div>
                                </div>
                        </div>
                        <div class="col-3">
                             <button @click="onUpload" type="submit" name="submit" class="btn btn-lg btn-primary upload-btn"> Upload Image</button>
                        </div>		                           
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
            images:[],
            selectedFile:null,
            siteBaseUrl: 'http://localhost/PHP_folio/images/',
        }
    },

    methods: {
        onFileSelected(event){
            this.selectedFile = event.target.files[0]
        },
        onUpload(){
            const fd = new FormData();
            fd.append('my_image', this.selectedFile, this.selectedFile.name)
            axios.post('http://localhost/PHP_folio/api/save.php', fd).then( response => 
            alert('Image Saved Successfully')                 
        )
        }
    },
     
      mounted() {
            axios.get('http://localhost/PHP_folio/api/read.php').then( response => 
                  this.images = response.data                 
            );
           
            console.log('Component mounted.')
      },
     
}
</script>

<style>

</style>