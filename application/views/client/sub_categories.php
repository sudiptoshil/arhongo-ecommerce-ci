<?php $this->load->view('client/layouts/header.php'); ?>

        <?php $category = $this->db->where('id',$category_id)->get('product_category')->row_array() ?>
    <div class="page_head" style="background-image:url(<?= base_url('assets/img/category/'.$category['category_image']) ?>); background-repeat: no-repeat; background-position:center center; z-index:-100;background-size:100% 100%;">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                           
                           <h2 class="text-center" style="color:#2f3640; font-weight:bold;padding:10px 5px;text-shadow: 2px 2px #ff0000;  "><?= $category['category_name'] ?></h2>
                        </div>
                </div>
        </div>
    </div>
        
    <div class="content_page">
        <div class="container">
            
                <div class="row">
                <hr>
                <?php if(count($sub_categories) > 0){ 
                    foreach($sub_categories as $sub_cat){ ?>
                    <div class="col-lg-4">
                        <div class="jumbotron">
                              <h2 class="display-3 text-center"><?= $sub_cat['category_name'] ?></h2>
                              <img src="<?= base_url('assets/img/category/'.$sub_cat['category_image']); ?>"  width="100%" style="max-height:200px"/>
                              <hr class="my-4">
                              <p class="lead">
                                <a class="btn btn-primary btn-lg" href="<?= base_url('client_controllers/main_ctrl/sub_categories/'.$sub_cat['id']) ?>" role="button">See All Products</a>
                              </p>
                            </div>
                    </div>
                        
                   
               
                 <?php } }else{?>
                    <h3>No Sub Category</h3>
                 <?php } ?>
              
            <hr>
            </div> <!--end of row -->
            
            
            	<!--start testing product -->
		<div class="row">
				<?php if($products){ ?>
                    <?php foreach($products as $data){ ?>
				<div class="col-lg-3">
                <?php $product_images = $this->Main->get_all('product_image',['product_id'=>$data['id']]); ?>
					<p class="border border-success p-2 text-center">
                    <span><button class="pro-box-btn" data-toggle="modal" data-target="#myModal" data-image="<?= count($product_images) > 0 ? $product_images[0]['image_url'] : 'alt="no image"'?>" data-id="<?php echo $data['id']?>" data-desc="<?php echo $data['product_description']?>" data-name="<?php echo $data['product_name']?>" data-price="<?php echo $data['display_price']?>"><br>
                        <span><img src="<?= count($product_images) > 0 ? base_url('assets/'.$product_images[0]['image_url']) : 'alt="No Image"' ?>" width="100%" style="max-height:100px"></span><br>
                        <span><?= $data['product_name'] ?></span><br>
                        <span>&#2547;<?= $data['display_price'] ?></span><br>
                    </button></span><br>
                        <!-- <span><button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fas fa-shopping-cart'></i> Add to cart</button></span> -->
                        <button class='btn-cart' data-id='<?php echo $data['id']?>' data-bangla='<?php echo $data['product_name']?>' data-name='<?php echo $data['product_name']?>' data-price='<?php echo $data['display_price']?>'><i class='fas fa-shopping-cart'></i> Add to cart</button>
                    </p>
				</div>

				<?php } ?>


                <?php  }else{ ?>
                    <h3>No Products in category <b><?= $category['category_name'] ?></b></h3>
                <?php } ?>
			</div>
		<!--end  testing product -->
                
        </div>
    </div>
    <?php $this->load->view('client/layouts/footer.php'); ?>
