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

          <form action="<?=base_url('Category_ctrl/update')?>/<?=$category->id?>" method="Post"  enctype="multipart/form-data">

            <div class="">               
              <select  class="form-control form-control-lg" id="pt" name="root_id"
              style="border-radius: 20px;" >
                   <option value="" selected disabled>Select Root Category</option> 
                  <?php foreach($categories as $cat) { ?>
                      <option <?= $cat->id == $category->root_id ? 'selected':'' ?> value="<?=$cat->id?>"><?=$cat->category_name?></option>
                  <?php } ?>
              </select>
            </div>

            <br>
            
            <div class="form-group">
              <!-- <label for="type_name">Type Name</label> -->
              <input id="category_name" name="category_name" class="form-control form-control-lg" type="text" placeholder="<?=$category->category_name?>" value="<?=$category->category_name?>" required
              style="border-radius: 20px;">
            </div>
            
            <img class="rounded-circle mx-auto d-block" width="50%" id="blah" src="<?= base_url('assets/img/category/'.$category->category_image) ?>" alt="">
            
            
            <div class="col-md-6">
                        
                <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                <span class="icon text-white-50">
                        <i class="fas fa-file-upload"></i>
                    </span>
                    <span class="text text-white-50">Upload Image</span>
                </label>
                <input id="file-upload" style="display: none" type="file" name="file"/>
                
            </div> 
            <div class="form-check">
              <input type="checkbox" name="home_page" value="1" <?= $category->home_page == 1 ? 'checked':'' ?> class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Display On Home Page</label>
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

<!-- Product image add Modal -->
<!--<div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Add More Image</h5>    -->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">&times;</span>-->
<!--                </button>-->
<!--            </div>-->

            

<!--            <form class="form-group" action="<?//=base_url('product_ctrl/add_product_image')?>" method="POST" enctype="multipart/form-data">-->
<!--                <div class="modal-body">-->
<!--                        <input type="hidden" name="product_id" value="<?//=$category->id?>">                     -->
<!--                        <div class="">-->

<!--                            <div class="text-center">-->
                            
<!--                                <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">-->
<!--                                    <span class="icon text-white-50">-->
<!--                                        <i class="fas fa-file-upload"></i>-->
<!--                                    </span>-->
<!--                                    <span class="text text-white-50">Upload Image</span>-->
<!--                                </label>-->
<!--                                <input required id="file-upload" style="display: none" type="file" name="image-file"/>-->
                            
<!--                            </div> -->

<!--                        </div>    -->

<!--                        <div class="">-->
<!--                            <div class="text-center">-->
<!--                                <div class="">-->
<!--                                    <div class="">-->
<!--                                        <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>    -->

<!--                        <br>-->
<!--                        <br>-->

<!--                        <button type="submit" class="btn btn-primary">Save changes</button>-->
                        
                    
<!--                </div>-->

<!--            </form>    -->
           
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- / Product image add Modal -->
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


