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
        <div class="pl-5 pr-5 pt-3">

            <h2 class="text-center"><span class="badge badge-pill badge-info"><?= $slider['slider_title']; ?></span></h2>
             
            <div class="text-center">
                <a href="<?=base_url('home/edit_slider')?>/<?=$slider['id']?>" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;"><i class="fas fa-edit"></i></a>
                <form action="<?=base_url('home/delete_slider/'.$slider['id'])?>" method="post" style="display:inline-block">
                    <input type="hidden" name="delete_slider" value="<?= $slider['trash'] ?>" />
                    <button  type="submit"  style="border-radius: 18px;"><i class="fas fa-trash"></i></button>
                </form>
                <!--<a href="<?=base_url('home/delete_slider')?>/<?=$slider['id']?>" -->
                <!--class="btn btn-sm btn-outline-danger"></a>-->
            </div>
            
            <hr>
            <br>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php if($slider['status'] == 1  && $slider['trash'] == 0){
                            echo "<h4 class='text-center text-success'>Active</h4>";
                        }elseif($slider['status'] == 0 && $slider['trash'] == 0){
                            echo "<h4 class='text-center text-danger'>Deactive</h4>";
                        }elseif($slider['trash'] == 1){
                            echo "<h4 class='text-center text-danger'>Deleted</h4>";
                        } ?>    
                
                    <!-- List of Categories -->
                <img class="mx-auto d-block" width="100%" src="<?= base_url('assets/img/slider/'.$slider['slider_image']) ?>" alt="">
               <br>
               <p class="text-center">
                   <?= $slider['content'] ?>
               </p>
               

                </div>


            </div>


        </div>
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

   // function showProductDetail(product){

    // $('#myModal').on('shown.bs.modal', function () {
    // $('#myInput').trigger('focus')
    // })
    // Clearing Previous Data
    //$('#product-detail').html('');
    //console.log(product);
    //$('#productDetailModal').modal('show');
    
   // }

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


