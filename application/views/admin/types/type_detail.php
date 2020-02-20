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

            <h2 class="text-center"><span class="badge badge-pill badge-info"><?= $type->type_name; ?></span></h2>
            <div class="text-center">
                <a href="<?=base_url('type_ctrl/edit')?>/<?=$type->id?>" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;"><i class="fas fa-edit"></i></a>
            </div>
            
            <hr>
            <br>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- List of Categories -->

                <h5 class="text-center">This type has the following categories</h5>    
                
                <br>

                <ul class="list-group list-group-flush">
                    
                <?php foreach ($type->Category as $Category) { ?>
                   
                  <li class="list-group-item text-center"><?=$Category->category_name ?></li>                                    

                <?php } ?>    

                </ul>

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


