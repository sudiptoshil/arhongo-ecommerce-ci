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
            Add a New Product to Your Inventory
          </div>
          <div class="card-body">
            <form class="form-group" action="<?=base_url('product_ctrl/add_product');?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <?php if($this->session->userdata('admin') == true){ ?>
                    <div class="col">
                        <label for="vendor_id">Select Vendor</label>    
                            <select name="vendor_id" class="form-control" id="vendor_id" onchange="getBrands(this.value)">
                                <option value="" selected disabled>Select Vendor</option>
                                <?php foreach($vendors as $vendor){ ?>
                                <option value="<?= $vendor->id ?>"><?= $vendor->username ?></option>
                                <?php } ?>
                            </select>
                        <small class="text-danger"><?php echo form_error('vendor_id'); ?></small>    
                    </div>
                    <?php } ?>
                    <div class="col">
                        <label for="product_name">Product Name</label>    
                        <input required type="text" class="form-control" name="product_name" id="product_name"/>
                        <small class="text-danger"><?php echo form_error('product_name'); ?></small>    
                    </div>
                        <div class="col">
                        <label for="product_description">Description</label>
                        <textarea required type="text" class="form-control" name="product_description" id="product_description"></textarea>
                        <small class="text-danger"><?php echo form_error('product_description'); ?></small>
                    </div>
                </div>

                <br>
                <hr>
                <br>

                <div class="form-row">
                    <!--<div class="col">-->
                    <!--    <label for="pt">Pruduct Type</label>-->
                    <!--    <select required class="form-control form-control-sm" id="pt" name="type_id">-->
                    <!--        <option value="">Select</option>-->
                    <!--        <?php foreach($types as $type) { ?>-->
                    <!--            <option value="<?=$type->id?>"><?=$type->type_name?></option>-->
                    <!--        <?php } ?>-->
                    <!--    </select>-->
                    <!--</div>-->
                    <div class="col">
                        <label for="pc">Category</label>
                        <select required class="form-control form-control-sm" id="pc" name="category_id" onchange="getCategories(this.value)">
                            <option value="">select</option>
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
                    <div class="col">
                        <label for="pb">Brand</label>
                        <select required class="form-control form-control-sm" id="pb" name="brand_id">
                            <option value="">select</option>
                            <?php foreach($brands as $brand) { ?>
                                <option value="<?=$brand->id?>"><?=$brand->brand_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <br>

                <div class="form-row">
                    <div class="col-md-3">
                        <label for="pr">Price</label>
                        <input required type="text" class="form-control form-control-sm" id="pr" name="display_price" />
                        <small class="text-danger"><?php echo form_error('display_price'); ?></small>        
                    </div>
                    <div class="col-md-3">
                        <label for="cur">Currency</label>
                        <!-- <select class="form-control form-control-sm" id="cur">
                            <option>Small select</option>
                        </select> -->
                        <input required type="text" class="form-control form-control-sm" value="BDT" id="cur" name="currency" />
                        
                        <small class="text-danger">i:g: BDT, USD, EUR </small>
                    </div>
                    <div class="col-md-3">
                        <label for="unit">Unit</label>
                        <!-- <select class="form-control form-control-sm" id="unit">
                            <option>Small select</option>
                        </select> -->
                        <input required type="text" class="form-control form-control-sm" id="unit" name="sell_unit" />
                        <small class="text-danger">Display Price is cost per unit. i:g: Kg, g, Piece </small>
                        <small class="text-danger"><?php echo form_error('sell_unit'); ?></small>        
                    </div>
                    <div class="col-md-3">
                        <label for="qt">Quantity</label>
                        <input type="number" class="form-control form-control-sm" id="qt" name="product_quantity" />
                        <small class="text-danger">Don't add quantity if the product is of **Clothing Type</small>
                    </div>
                </div>

                <br>
                <hr>
                <br>

                
                <small class="text-info">**Please set a proper suitable name for the image file before uploading.</small>
                <div class="form-row">
                    
                    <div class="col">
                        
                        <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                            <span class="icon text-white-50">
                                <i class="fas fa-file-upload"></i>
                            </span>
                            <span class="text text-white-50">Upload Image</span>
                        </label>
                        <input required id="file-upload" style="display: none" type="file" name="file"/>
                        
                    </div> 

                    <div class="col">
                        <div class="">
                            <div class="">
                                <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control form-control-sm" id="discount" name="discount" />
                    </div>
                </div>

                <!-- <div class="form-row">
                    <div class="col-md-4">
                        <label for="sz">Size</label>
                        <input type="text" class="form-control form-control-sm" id="sz" name="product_size" />
                    </div>
                    <div class="col-md-4">
                        <label for="cl">Color</label>
                        <input type="text" class="form-control form-control-sm" id="cl" name="product_color" />
                    </div>
                    <div class="col-md-3">
                        <label for="sub">Click to Submit</label>
                        <input type="submit" value="Submit" class="form-control form-control-sm btn btn-primary btn-sm btn-block" id="sub" name="submit" />
                    </div>
                </div> -->

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

  <!-- Product Detail Modal -->
  <!-- Modal -->
        <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="product-detail">

            <h2 id="product-name"></h2>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
  <!-- / Product Detail Modal -->

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("layouts/endgame"); ?>


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
    
    
    
    // function for get brands according to vendor
    function getBrands(vendor_id){
        var url = "<?= base_url('product_ctrl/getBrands/') ?>"+vendor_id;
        if(vendor_id){
            $.ajax({
                type : 'POST',
                url : url,
                dataType : 'json',
                success : function(brands){
                    console.log(brands);
                    var brand_count = brands.length;
                    
                    var html = `<option value="">select</option>`;
                    for(var i = 0; i < brand_count; i++){
                        html += `
                            <option value="${brands[i].id}">${brands[i].brand_name}</option>
                        `;
                    }
                    $('#pb').html(html);
                }
            })
        }
    }
    
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


