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

        <div class="pl-5 pr-5 pt-3">

            <h2 class="text-center"><span class="badge badge-pill badge-info"> Details of Product</span></h2>
            <div class="text-center">
                <a href="<?=base_url('product_ctrl/product_edit_form')?>/<?=$product->id?>" class="btn btn-sm btn-outline-warning" style="border-radius: 18px;"><i class="fas fa-edit"></i></a>
            </div>
            
            <hr>
            <br>

            <div class="row">
                <div class="col-md-6">
                    <!-- Product Details -->
                    <h6>Name: <strong><?= $product->product_name; ?></strong></h6>
                    <!--<h6>Type: <strong><?= $product->type->type_name; ?></strong></h6>-->
                    <h6>Category: <strong><?= $product->category->category_name; ?></strong></h6>
                    <!--<h6>Sub-Category: <strong><?= $product->subcategory->subcategory_name; ?></strong></h6>-->
                    <h6>
                        Total Quantity: <strong><?php if($product->size_color->count()) echo $product->size_color->sum('qt'); else echo $product->product_quantity; ?> <?= $product->sell_unit; ?></strong>
                        <?php if($product->sc != 1) {?>
                        <button onclick="restockProduct()" class="btn btn-sm btn-outline-warning border-0" style="border-radius: 18px;"><i class="fas fa-arrow-up"></i></button>
                        <button onclick="destockProduct()" class="btn btn-sm btn-outline-warning border-0" style="border-radius: 18px;"><i class="fas fa-arrow-down"></i></button>
                        <?php } ?>    
                    </h6>
                    <h6>Price: <strong><?= $product->display_price; ?> <?= $product->currency; ?></strong></h6>
                </div>

                <div class="col-md-6">
                    <h6>Description: </h6>
                    <p><?=$product->product_description ?></p>
                </div>
            </div>


            
            <br>

    

            <div class="pt-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <h4 class=""> 
                                <span class="badge badge-pill badge-secondary"> Size & Color: <strong class="text-success"><?php if($product->size_color->count())  echo 'Available'; else echo 'N/A'; ?></strong></span>
                            </h4>
                            <?php if($product->sc==1) { ?>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addSizeColor" style="border-radius: 50px;">
                                <i class="fas fa-plus"></i>
                            </button>
                            <?php } ?>
                        </div>
                        <br><br>
                        <?php if($product->size_color->count()) { ?>
                            <div class="table">
                                <table class="table table-bordered" id="dataTable-" max-width="100%" cellspacing="1">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Qt</th>
                                            <th class="" style="width: 150px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($product->size_color as $moreDetail) {?>
                                        <tr>
                                            <td><?=$moreDetail->size ?></td>
                                            <td><?=$moreDetail->color ?></td>
                                            <td><?=$moreDetail->qt ?></td>
                                            <td class=""> 
                                                <div class='row'>
                                                    <div class="col-sm-4 mx-auto mr-auto">
                                                        <button class="btn btn-sm btn-outline-warning border-0" style="border-radius: 14px" onclick="RestockSizeColor('<?=$moreDetail->id?>')"><i class="fas fa-arrow-up"></i></button> 
                                                    </div>
                                                    <div class="col-sm-4 mx-auto mr-auto">
                                                        <button class="btn btn-sm btn-outline-warning border-0" style="border-radius: 14px" onclick="DestockSizeColor('<?=$moreDetail->id?>')"><i class="fas fa-arrow-down"></i></button>
                                                    </div>
                                                    <div class="col-sm-4 mx-auto mr-auto">
                                                    <button class="btn btn-sm btn-outline-warning border-0" style="border-radius: 14px" onclick="editSizeColor('<?=$moreDetail->id?>', '<?=$moreDetail->size?>', '<?=$moreDetail->color?>', '<?=$moreDetail->qt?>')"><i class="fas fa-edit"></i></button>
                                                    </div>
                                                </div>    
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>


                                </table> 
                            </div>
                        <?php } ?> 
                    </div>
                </div>
            </div>
            
            <br>

            <div class="row">
                <?php if($product->product_image->count()) { ?>
                <div class="col-sm-12">
                    <div class="text-center">
                        <h4> 
                            <strong class="badge badge-pill badge-danger">Image Available</strong>
                        </h4>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addImageModal" style="border-radius: 50px;">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- <div class="product-images p-3 row mr-auto mx-auto">
                    <?php //foreach($product->product_image as $image) { ?>    
                        <div class="col-md-3" >
                            <img src="<?php //echo base_url('assets/' . $image->image_url);?>" alt="" style="width: 300px">
                            <div class="text-center">
                                <a class="btn btn-sm btn-danger border-0" style="border-radius: 25px;"  href="<?=base_url('product_ctrl/delete_product_image/') ?><?=$image->id?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div> 
                            
                        </div>
                    <?php //} ?>
                    </div> -->

                    <br>

                    <div class="tz-gallery">

                        <div class="row">
                        <?php foreach($product->product_image as $image) { ?>
                            <div class="col-sm-6 col-md-4">
                                <a class="lightbox" href="<?php echo base_url('assets/' . $image->image_url);?>">
                                    <img src="<?php echo base_url('assets/' . $image->image_url);?>" alt="Sky">
                                </a>
                                <div class="text-center">
                                    <a class="btn btn-sm btn-danger border-0" style="border-radius: 25px;"  href="<?=base_url('product_ctrl/delete_product_image/') ?><?=$image->id?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>                                 
                            </div>
                        <?php } ?>
                        </div>

                    </div>


                </div>
                <?php } else {?>
                <div class="col-sm-12">
                    <div class="p-3">
                        <div class="text-center">
                            <h4> 
                                <strong class="badge badge-pill badge-danger"> No Image Available</strong>
                            </h4>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addImageModal" style="border-radius: 50px;">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div> 
                <?php } ?>   
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

    <!-- Product image add Modal -->
    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Image</h5>    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            

            <form class="form-group" action="<?=base_url('product_ctrl/add_product_image')?>" method="POST" enctype="multipart/form-data">
                
                <?php if(count($product->product_image->where('featured_image', 1)) == 0) { ?>    
                    <div class="form-check text-center">
                        <input type="checkbox" name="featured" class="form-check-input" id="featured">
                        <label class="form-check-label" for="featured">Make Featured Image</label>
                    </div>
                <?php } ?>


            
                <div class="modal-body">
                    
                        
                        <input type="hidden" name="product_id" value="<?=$product->id?>">
                        
                        
                        <div class="">

    

                            <div class="text-center">
                            
                                <label for="file-upload" class="btn btn-primary btn-lg btn-icon-split" style="cursor: pointer">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-file-upload"></i>
                                    </span>
                                    <span class="text text-white-50">Upload Image</span>
                                </label>
                                <input required id="file-upload" style="display: none" type="file" name="image-file"/>
                            
                            </div> 

                        </div>    

                        <div class="">
                            <div class="text-center">
                                <div class="">
                                    <div class="">
                                        <img id="blah" src="#" alt="" style="height:300px; border: 2px solid grey" />
                                    </div>
                                </div>
                            </div>
                        </div>    

                        <br>
                        <br>

                        <button type="submit" class="btn btn-primary">Save changes</button>
                        
                    
                </div>

            </form>    
           
            </div>
        </div>
    </div>
    <!-- / Product image add Modal -->

    <!-- Poduct size color add Modal -->
    <div class="modal fade" id="addSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?=base_url('product_ctrl/add_product_size_color')?>" method="POST">
                    
                    <input type="hidden" name="product_id" value="<?=$product->id?>">
                    
                    
                    <div class="form-row">
                        Size <br>
                        <input type="text" class="form-control" name="size">
                    </div>    

                    <div class="form-row">
                        Color <br>
                        <input type="text" class="form-control" name="color">
                    </div>
                    
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" class="form-control" name="qt">
                    </div> 

                    <br>
                    <br>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                    
                </form>
            </div>
           
            </div>
        </div>
    </div>    
    <!-- / Product size color add modal -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Variation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?=base_url('product_ctrl/edit_product_size_color')?>" method="POST">
                    
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" name="product_id" value="<?=$product->id?>">
                    
                    
                    <div class="form-row">
                        Size <br>
                        <input type="text" id="e_size" class="form-control" name="size">
                    </div>    

                    

                    <div class="form-row">
                        Color <br>
                        <input type="text" id="e_color" class="form-control" name="color">
                    </div>
                    
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div> 

                    <br>
                    <br>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                    
                </form>
            </div>
           
            </div>
        </div>
    </div>     
    <!-- /Edit Modal -->

    <!-- Restock Variation Modal -->
    <div class="modal fade" id="RestockProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?=base_url('product_ctrl/restock_product/')?><?=$product->id?>" method="POST">
                    <input type="hidden" id="R_id" name="id">
                                        
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>           
            </div>
        </div>
    </div>     
    <!-- /Restock Modal -->

    <!-- Destock Product Modal -->
    <div class="modal fade" id="DestockProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Destock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?=base_url('product_ctrl/destock_product/')?><?=$product->id?>" method="POST">
                    <input type="hidden" id="D_id" name="id">
                                        
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>           
            </div>
        </div>
    </div>    
    <!-- /Destock Product Modal -->


    <!-- Restock Product Variation Modal -->
    <div class="modal fade" id="RestockSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Restock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?=base_url('product_ctrl/restock_product_variation/')?><?=$product->id?>" method="POST">
                    <input type="hidden" id="vR_id" name="id">
                    <input type="hidden" name="product_id" value="<?=$product->id?>">
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>           
            </div>
        </div>
    </div>     
    <!-- /Restock Product Variation Modal -->

    <!-- Destock Product Variation Modal -->
    <div class="modal fade" id="DestockSizeColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Destock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" action="<?=base_url('product_ctrl/destock_product_variation/')?><?=$product->id?>" method="POST">
                    <input type="hidden" id="vD_id" name="id">
                    <input type="hidden" name="product_id" value="<?=$product->id?>">                    
                    <div class="form-row">
                        Quantity <br>
                        <input type="text" id="e_qt" class="form-control" name="qt">
                    </div> 
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>           
            </div>
        </div>
    </div>    
    <!-- /Destock Product Modal -->    

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

    function editSizeColor(id, size, color, qt){
        $('#e_size').val(size);
        $('#e_color').val(color);
        $('#e_qt').val(qt);
        $('#id').val(id);

        $('#editSizeColor').modal('show');
    } 

    function RestockSizeColor(id) {
        $('#vR_id').val(id);
        $('#RestockSizeColor').modal('show');
    }

    function DestockSizeColor(id) {
        $('#vD_id').val(id);
        $('#DestockSizeColor').modal('show');
    }

    function destockProduct() {
        $('#DestockProduct').modal('show');
    }

    function restockProduct() {
        $('#RestockProduct').modal('show');
    }  
  

  </script>


