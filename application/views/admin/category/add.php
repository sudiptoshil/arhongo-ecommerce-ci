<!--header-->
<?php $this->load->view("layouts/header"); ?>
<!--/header-->

<body id="page-top">

<!--TopNav-->
<?php $this->load->view("layouts/navbar"); ?>  
<!--TopNav-->  

  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("layouts/sidebar"); ?>
    <!--/Sidebar-->

    <div id="content-wrapper">

      <div class="container-fluid">


      
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Categories</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
     



        <!-- Add Form -->

        <div class="col-md-6 offset-md-3">

          <form action="<?=base_url('Category_ctrl/store')?>" method="Post" enctype="multipart/form-data">
              
               <?php $category = $this->db->where('id',$root_id==0?0:$root_id)->get('product_category')->row_array(); ?>
            <h3 class="">Category : <?= $root_id==0?'Root':$category['category_name'] ?></h3>
            
                <input type="hidden" name="root_id" value="<?= $root_id ?>" />
            <!--<div class="">               -->
            <!--  <select class="form-control form-control-lg" id="pt" name="root_id"-->
            <!--  style="border-radius: 20px;" >-->
            <!--      <option value="">Select Parent Category</option>-->
            <!--      <?php foreach($categories as $category) { ?>-->
            <!--          <option value="<?=$category->id?>"><?=$category->category_name?></option>-->
            <!--      <?php } ?>-->
            <!--  </select>-->
            <!--</div>-->

            <br>
            
            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
              <input id="type_name" name="category_name" class="form-control form-control-lg" type="text" placeholder="Enter Category Name" required
              style="border-radius: 20px;">
            </div>

         
           
            <small class="text-info">**Please set a proper suitable name for the image file before uploading.</small>
                <div class="form-row">
                    
                    <div class="col-md-6">
                        
                        <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                        <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span class="text text-white-50">Upload Image</span>
                        </label>
                        <input required id="file-upload" style="display: none" type="file" name="file"/>
                        
                    </div> 

                    <div class="col-md-9">
                        <div class="">
                            <div class="">
                                <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                            </div>
                        </div>
                    </div>
                </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary" style="border-radius: 20px;">
                Submit
              </button>
            </div>
          </form>

        </div>  


        <!-- /Add Form -->


        



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php $this->load->view("layouts/footer"); ?>
      <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("layouts/logoutmodal"); ?>
  <!--/ Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("layouts/endgame"); ?>


  <script>

   function showProductDetail(product){

    // $('#myModal').on('shown.bs.modal', function () {
    // $('#myInput').trigger('focus')
    // })
    // Clearing Previous Data
    //$('#product-detail').html('');
    //console.log(product);
    //$('#productDetailModal').modal('show');

   }   
  

  </script>
<script>
$('#blah').hide();


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
        }

        $('#blah').show();
    }

    $("#file-upload").change(function() {
    readURL(this);
});        



</script>

