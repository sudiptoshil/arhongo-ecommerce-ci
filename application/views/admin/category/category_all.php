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
          <li class="breadcrumb-item active">Categories</li>
        </ol>
        <!-- /Breadcrumbs-->
     

        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header bg-white">
              <div class="row">
                  <div class="col">
                  <?php if($root_id == null){ ?>
              <a href='<?=base_url("category_ctrl/add/0")?>'
              <?php }else{ ?>
              <a href='<?=base_url("category_ctrl/add/".$root_id)?>'
              <?php } ?>
             
               class="btn btn-sm btn-outline-success">Add new
            </a>
              </div>
              <div class="col">
                   <?php $category = $this->db->where('id',$root_id==null?0:$root_id)->get('product_category')->row_array(); ?>
            <h3 class="">Category : <?= $root_id==null?'Root':$category['category_name'] ?></h3>
              </div>
              <div class="col"></div>
              </div>
              
              
           
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="width: 20px;">No.</th>
                    <th style="width: 30px;">Name</th>
                    <th style="width: 300px;">Image</th>
                    <th style="width: 20px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach($categories as $category) { $i++?>
                  <tr>
                    <td><?= $i ?></td>
                    <?php $sub_cat = $this->db->where('root_id',$category->id)->get('product_category')->result_array(); ?>
                    <td><a href="<?= base_url('category_ctrl/get/'.$category->id) ?>"><?= $category->category_name ?></a></td>
                    
                    <td><img src="<?= base_url('assets/img/category/'.$category->category_image) ?>" width='30%' /></td>
                    <td>
                        <a 
                            href="<?=base_url()?>Category_ctrl/show/<?=$category->id?>" 
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


