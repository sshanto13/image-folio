<template>
  <div>
   <!-- header start-->
  <header class="bg-white t-b-1 py-2">
      <div class="container">
          <div class="row">
              <div class="col">
                  <router-link :to="{ path: '/'}" class="navbar-brand" >
                                   
                    <img 
                    :src="image" 
                    alt="Image Folio" 
                    style="max-width:100%;"
                  >
                                </router-link>
                  
              </div>
          </div>
      </div>
  </header>

<!-- header end -->
  </div>
</template>

<script>
import image from "../assets/image/logo.png"
export default {
  data(){
       return{
        image: image
       }
  },
}
</script>
<style>

</style>