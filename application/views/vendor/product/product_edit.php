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


        <!-- Success and Error -->
        <?php $this->load->view('/layouts/custom_error') ?>
        <!-- /Success and Error -->


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Edit Product
          </div>
          <div class="card-body">
            <form class="form-group" action="<?=base_url('product_ctrl/product_edit_submit/');?><?=$product->id?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <!-- <input type="hidden" name="product_id" value="<?//=$product->id?>"> -->
                    <?php if($this->session->userdata('admin')){ ?>
                    <div class="col">
                        <label for="vendor_id">Select Vendor</label>    
                            <select name="vendor_id" class="form-control" id="vendor_id" onchange="getBrands(this.value)">
                                <option value="" selected disabled>Select Vendor</option>
                                <?php foreach($vendors as $vendor){ ?>
                                <option value="<?= $vendor->id ?>" <?= $product->vendor_id == $vendor->id ? 'selected':'' ?>><?= $vendor->username ?></option>
                                <?php } ?>
                            </select>
                        <small class="text-danger"><?php echo form_error('vendor_id'); ?></small>    
                    </div>
                    <?php } ?>
                    <div class="col">
                        <label for="product_name">Product Name</label>    
                        <input required type="text" class="form-control" name="product_name" id="product_name" value="<?=$product->product_name?>"/>
                        <small class="text-danger"><?php echo form_error('product_name'); ?></small>    
                    </div>
                        <div class="col">
                        <label for="product_description">Description</label>
                        <textarea required type="text" class="form-control" name="product_description" id="product_description"><?=$product->product_description?></textarea>
                        <small class="text-danger"><?php echo form_error('product_description'); ?></small>
                    </div>
                </div>

                <br>
                <hr>
                <br>

                <div class="form-row">
                    <!-- <div class="col-md-3">
                        <label for="pt">Pruduct Type</label>
                        <select required class="form-control form-control-sm" id="pt" name="type_id">
                            <option value="">Select</option>
                            <?php //foreach($types as $type) { ?>
                                <option <?php //if($product->type->id == $type->id ) echo 'selected' ?> value="<?//=$type->id?>"><?//=$type->type_name?></option>
                            <?php //} ?>
                        </select>
                    </div> -->
                    <!--<div class="col-md-3">-->
                    <!--    <label for="pc">Category</label>-->
                    <!--    <select required class="form-control form-control-sm" id="pc" name="category_id">-->
                    <!--        <option value="">select</option>-->
                    <!--        <?php foreach($cats as $cat) { ?>-->
                    <!--            <option <?php if($product->category->id == $cat->id ) echo 'selected' ?> value="<?=$cat->id?>"><?=$cat->category_name?></option>-->
                    <!--        <?php } ?>-->
                    <!--    </select>-->
                    <!--</div>-->
                    <!--<div class="col-md-3">-->
                    <!--    <label for="psc">Sub-Category</label>-->
                    <!--    <select required class="form-control form-control-sm" id="psc" name="subcategory_id">-->
                    <!--        <option value="">select</option>-->
                    <!--        <?php foreach($subcats as $subcat) { ?>-->
                    <!--            <option <?php if($product->subcategory->id == $subcat->id ) echo 'selected' ?> value="<?=$subcat->id?>"><?=$subcat->subcategory_name?></option>-->
                    <!--        <?php } ?>-->
                    <!--    </select>-->
                    <!--</div>-->
                    
                    <!--update edit start-->
                    <div class="col">
                        <?php $category = $this->db->where('id',$product->category_id)->get('product_category')->row_array(); ?>
                        <label for="pc">Category</label>
                        <select required class="form-control form-control-sm" id="pc" name="category_id" onchange="getCategories(this.value)">
                            <option value="<?= $category['id'] ?>"><?= $category['category_name'] ?></option>
                            <?php foreach($cats as $cat) { ?>
                                <option value="<?=$cat->id?>"><?=$cat->category_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col" id="cat_level_one" style="display:none">
                        <label for="psc">Sub-Category 1</label>
                        <select  class="form-control form-control-sm" id="psc1" name="cat_level_one" onchange="catLevelTwo(this.value)">
                            <option value="">select</option>
                            
                        </select>
                    </div>
                    <div class="col" id="cat_level_two" style="display:none">
                        <label for="psc">Sub-Category 2</label>
                        <select  class="form-control form-control-sm" id="psc2" name="cat_level_two" onchange="catLevelThree(this.value)">
                            <option value="">select</option>
                           
                        </select>
                    </div>
                    <div class="col" id="cat_level_three" style="display:none">
                        <label for="psc">Sub-Category 3</label>
                        <select  class="form-control form-control-sm" id="psc3" name="cat_level_three" onchange="catLevelFour(this.value)">
                            <option value="">select</option>
                           
                        </select>
                    </div>
                    <!--update edit end-->
                    
                    
                    
                    <div class="col-md-3">
                        <label for="pb">Brand</label>
                        <select required class="form-control form-control-sm" id="pb" name="brand_id">
                            <option value="">select</option>
                            <?php foreach($brands as $brand) { ?>
                                <option <?php if($product->brand->id == $brand->id ) echo 'selected' ?> value="<?=$brand->id?>"><?=$brand->brand_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col">
                        <label for="pr">Price</label>
                        <input required type="text" class="form-control form-control-sm" id="pr" name="display_price" value="<?=$product->display_price?>" />
                        <small class="text-danger"><?php echo form_error('display_price'); ?></small>        
                    </div>
                    <div class="col">
                        <label for="cur">Currency</label>
                        <!-- <select class="form-control form-control-sm" id="cur">
                            <option>Small select</option>
                        </select> -->
                        <input required type="text" class="form-control form-control-sm" value="BDT" id="cur" name="currency" />
                        
                        <small class="text-danger">i:g: BDT, USD, EUR </small>
                    </div>
                    <div class="col">
                        <label for="unit">Unit</label>
                        <!-- <select class="form-control form-control-sm" id="unit">
                            <option>Small select</option>
                        </select> -->
                        <input required type="text" class="form-control form-control-sm" id="unit" name="sell_unit" value="<?=$product->sell_unit?>"/>
                        <small class="text-danger">Display Price is cost per unit. i:g: Kg, g, Piece </small>
                        <small class="text-danger"><?php echo form_error('sell_unit'); ?></small>        
                    </div>
                    <div class="col">
                        <label for="discount">Discount</label>
                        <input type="number" value="<?= $product->discount ?>" class="form-control form-control-sm" id="discount" name="discount" />
                    </div>
                </div>

                <br>
                <hr>
                <br>

                

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="text-center pt-5">
                            <input type="submit" class="btn btn-primary btn-xl">
                            <br>
                        </div>
                    </div>
                </div>            
            </form>
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
    
    
    
        // get child category level 1
    function getCategories(cat_id){
        var url = "<?= base_url('product_ctrl/getCategories/') ?>"+cat_id;
        if(cat_id){
            $.ajax({
                type : 'POST',
                url : url,
                dataType : 'json',
                success : function(categories){
                    var category_count = categories.length;
                    
                    var html = `<option value="">select</option>`;
                    for(var i = 0; i < category_count; i++){
                        html += `
                            <option value="${categories[i].id}">${categories[i].category_name}</option>
                        `;
                    }
                    $('#psc1').html(html);
                    $("#cat_level_one").css("display","block");
                }
            })
        }
    }
    
    
    // get child category level 2
    function catLevelTwo(cat_id){
        var url = "<?= base_url('product_ctrl/getCategories/') ?>"+cat_id;
        if(cat_id){
            $.ajax({
                type : 'POST',
                url : url,
                dataType : 'json',
                success : function(categories){
                    var category_count = categories.length;
                    
                    var html = `<option value="">select</option>`;
                    for(var i = 0; i < category_count; i++){
                        html += `
                            <option value="${categories[i].id}">${categories[i].category_name}</option>
                        `;
                    }
                    $('#psc2').html(html);
                    $("#cat_level_two").css("display","block");
                }
            })
        }
    }
    
    // get child category level 3
    function catLevelThree(cat_id){
        var url = "<?= base_url('product_ctrl/getCategories/') ?>"+cat_id;
        if(cat_id){
            $.ajax({
                type : 'POST',
                url : url,
                dataType : 'json',
                success : function(categories){
                    var category_count = categories.length;
                    
                    var html = `<option value="">select</option>`;
                    for(var i = 0; i < category_count; i++){
                        html += `
                            <option value="${categories[i].id}">${categories[i].category_name}</option>
                        `;
                    }
                    $('#psc3').html(html);
                    $("#cat_level_three").css("display","block");
                }
            })
        }
    }
  

  </script>


