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
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Sub-categories</li>
        </ol>
        <!-- /Breadcrumbs-->
     


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header bg-white">
            <a href="<?=base_url()?>subcategory_ctrl/add/" 
               class="btn btn-sm btn-outline-success">Add new
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 30px;">Name</th>
                    <th style="width: 300px;">Image</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach($subcategories as $subcategory) { $i++?>
                  <tr>
                    <td><?= $i ?></td>
                    <td><?= $subcategory->subcategory_name ?></td>
                    <td><img src="<?= base_url('assets/img/subcategory/'.$subcategory->sub_cat_image) ?>" width="30%" /></td>
                    <td>
                        <a 
                            href="<?=base_url()?>subcategory_ctrl/show/<?=$subcategory->id?>" 
                            class="btn btn-sm btn-info border-0" style="border-radius: 12px;">
                            Details
                        </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
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


