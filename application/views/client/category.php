<?php $this->load->view('client/layouts/header.php'); ?>

        <div class="related_product_page">
        	<div class="container">
        		<div class="row">
					<div class="col-md-12">
						<div class="product-title">
							<h2>Fitness</h2>
						</div>	
					</div>
				</div>

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


                <?php  } ?>
			</div>
		<!--end  testing product -->






				<!-- <div class="row">
                <?php if(count($products) > 0){ 
                    foreach($products as $product){
                    $product_images = $this->db->where('product_id',$product['id'])->get('product_image')->result_array();
                   
                    ?>
					<div class="col-md-3">
						<div class="page-single-product">
							<img src="<?= base_url('assets/'.$product_images[0]['image_url']) ?>" width="100%" height="100%">
							<div class="cart-btn">
								<a href="#">Add to cart </a>
							</div>	
						</div>
						<h3><?= $product['product_name'] ?></h3>
					</div>
                <?php } } ?>	
				</div> -->

				<!-- <div class="row">
					<div class="col-md-3">
						<div class="page-single-product">
							<img src="assets/img/product_11.jpg">
							<div class="cart-btn">
								<a href="#">Add to cart</a>
							</div>	
						</div>
						<h3>Gym Equipments</h3>
					</div>
					<div class="col-md-3">
						<div class="page-single-product">
							<img src="assets/img/product_12.jpg">
							<div class="cart-btn">
								<a href="#">Add to cart</a>
							</div>
						</div>
						<h3>Multi Gym Machine</h3>	
					</div>
					<div class="col-md-3">
						<div class="page-single-product">
							<img src="assets/img/product_13.jpg">
							<div class="cart-btn">
								<a href="#">Add to cart</a>
							</div>
						</div>
						<h3><a href="#">Elliptical Cross Trainer</a></h3>	
					</div>
					<div class="col-md-3">
						<div class="page-single-product">
							<img src="assets/img/product_14.jpg">
							<div class="cart-btn">
								<a href="#">Add to cart</a>
							</div>
						</div>
						<h3><a href="#">Exercise Treadmill</a></h3>	
					</div>
				</div> -->
        	</div>
        </div>


<!-- modal for show product details start here -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-7">
						<div id="product_photo"></div>
					</div>
					<div class="col-md-6 col-12">
						<div class="pro-details">
							<h1 id="pro-name"></h1>
							<h2 id="pro-price"></h2>
							<div id="product_cart"></div>
						</div>

						<hr>
						<p id="desc"></p>
					</div>
				</div>
			</div>
			<div class="modal-footer pro-details-footer">
				<div class="row">
					<div class="col-md-8 col-12">
						<span><i class="fas fa-truck"></i> Quick Delivery</span>
						<span><i class="fas fa-money-bill-alt"></i> Cash on Delivery</span>

						<hr>
						<h1>Arhongo</h1>
						<p>
							Arhongo is an online shop in Bangladesh. We believe time is valuable to our clients and that they should not have to waste hours in traffic, brave bad weather and wait in line just to buy basic necessities like eggs! This is why Arhongo delivers everything you need right at your door-step and at no additional cost.
						</p>
						<hr>
					</div>
					<div class="col-md-4 col-12">
						<h4>Call us for any query</h4><br>
						<h3><i class="fas fa-phone"></i> +880 1826 XXXXXX</h3>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- modal for show product details end here -->

<?php $this->load->view('client/layouts/footer.php'); ?>

<script>
	$(document).ready(function () {
		$(".pro-box-btn").click(function(){
			var desc=$(this).attr("data-desc");
			var id=$(this).attr("data-id");
            var image=$(this).attr("data-image");
            
			var name=$(this).attr("data-name");
			var price=$(this).attr("data-price");
			image="<img src='<?php echo base_url()?>assets/"+image+"' width='100%'>";
			cart_btn="<button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fas fa-shopping-cart'></i> Add to cart</button>";
			$('#product_photo').html(image);
			$('#product_cart').html(cart_btn);
			$('#desc').text(desc);
			$('#pro-name').text(name);
			$('#pro-price').text("৳ "+price);
		});
	});
</script>