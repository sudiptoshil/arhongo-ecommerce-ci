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
          <li class="breadcrumb-item">Sliders</li>
          <li class="breadcrumb-item active">Add New</li>
        </ol>
        <!-- /Breadcrumbs-->
     



        <!-- Add Form -->

        <div class="col-md-6 offset-md-3">

          <form action="<?=base_url('home/update_slider/'.$slider['id'])?>" method="Post" enctype="multipart/form-data">

                       
            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
              <input id="slider_title" name="slider_title" value="<?= $slider['slider_title'] ?>" class="form-control form-control-lg" type="text" placeholder="Enter Slider Title" required
              style="border-radius: 20px;">
            </div>
         
            <br>
            
            <div class="form-group">
                <textarea name="content" id="content" col="10" row="3" class="form-control form-control-lg" style="border-radius: 20px;" placeholder="Write Slider Content (Optional)"><?= $slider['content'] ?></textarea>
              
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" <?= $slider['status'] == 1 ? 'checked':'' ?>>
              <label class="form-check-label" for="exampleRadios1">
                Active
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0"  <?= $slider['status'] == 0 ? 'checked':'' ?>>
              <label class="form-check-label" for="exampleRadios2">
                Deactive
              </label>
            </div>


            <small class="text-info">**Please set a proper suitable name for the image file before uploading.</small>
                <div class="form-row">
                    
                    <div class="col-md-6">
                        
                        <label for="slider_image" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                        <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span class="text text-white-50">Upload Image</span>
                        </label>
                        <input id="slider_image" style="display: none" type="file" name="slider_image"/>
                        
                    </div> 

                    <div class="col-md-9">
                        <div class="">
                            <div class="">
                                <img id="blah" src="<?= base_url('assets/img/slider/'.$slider['slider_image']) ?>" width="100%" alt=""/><br>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary mt-2" style="border-radius: 20px;">
                Update
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
// $('#blah').hide();


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

    $("#slider_image").change(function() {
    readURL(this);
});        



</script>

