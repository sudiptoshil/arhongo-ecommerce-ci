<?//php include ('client/layouts/headar.php'); ?>
<?php $this->load->view('client/layouts/header.php'); ?>

	    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
         
                  <?php $i=0; foreach($sliders as $key=>$slider){ ?>
                   

    <div class="carousel-item <?php echo $key== 0 ? 'active':'' ?>">
                        <img class="d-block w-100" src="<?= base_url("assets/img/slider/".$slider['slider_image']) ?>">
                    </div>
    <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--<div class="home_slide_bottom">-->
<!--            <div class="container slider_bottom">-->
<!--                <div class="row">-->
                    
<!--                    <div class="col-md-4">-->
<!--                        <img src="<?= base_url() ?>client_assets/img/ban01.png">-->
<!--                    </div>-->
<!--                    <div class="col-md-4">-->
<!--                        <img src="<?= base_url() ?>client_assets/img/ban01.png">-->
<!--                    </div>-->
<!--                    <div class="col-md-4">-->
<!--                        <img src="<?= base_url() ?>client_assets/img/ban01.png">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<div class="home_slide_bottom">
            <div class="container slider_bottom">
                <div class="row">
<div class="owl-carousel owl-theme">
    <?php foreach($root_categories as $rc){ ?>
        <a href="<?= base_url('client_controllers/main_ctrl/sub_categories/'.$rc['id']) ?>">
            <div class="item text-center"><h4><?= $rc['category_name'] ?></h4>
            <img src="<?= base_url('assets/img/category/'.$rc['category_image']) ?>" width="100%" style="max-height:300px;"/>
        </div>
        </a>
    <?php } ?>

</div>
    </div>
        </div>
            </div>




    

<div class="home_section_area">
    <div class="container home_section">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Discover our <a href="">Fitness Equipment</a> Store!</h3>
                        <div class="home_menu">
                        <?php if($root_categories){ 
                            foreach($root_categories as $cat){
                            ?>
                            <h2><a href="<?= base_url('client_controllers/main_ctrl/products/'.$cat['id']) ?>"><?= $cat['category_name'] ?></a></h2>
                            <?php $sub_categories = $this->db->where('root_id',$cat['id'])->get('product_category')->result_array(); 
                            if(count($sub_categories) > 0){
                                foreach($sub_categories as $s_cat){
                            ?>
                            <ul>
                                <!--<li><a href="<?= base_url('client_controllers/main_ctrl/products/'.$cat['id']).'/'.$s_cat['id'] ?>"><?= $s_cat['category_name'] ?></a></li>-->
                                <li><a href="<?= base_url('client_controllers/main_ctrl/products/'.$s_cat['id']) ?>"><?= $s_cat['category_name'] ?></a></li>
                                
                            </ul>
                            <?php }} ?>
                               
                        <?php } } ?>
                            <!-- <h2>Sports</h2>
                            <ul>
                                <li><a href="#">Cricket</a></li>
                                <li><a href="#">Football</a></li>
                                <li><a href="#">Cycling </a></li>
                                <li><a href="#">Badminton</a></li>
                                <li><a href="#">Basketball</a></li>
                                <li><a href="#">Golf</a></li>
                                <li><a href="#">Skating</a></li>
                                <li><a href="#">Table Tennis</a></li>
                                <li><a href="#">LongTennis</a></li>
                                <li><a href="#">Water Sport</a></li>
                                <li><a href="#">Volleyball</a></li>
                                <li><a href="#">Others</a></li>
                            </ul>
                            <h2>Accessories</h2> -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 right-home">
                                <?php $category = $this->db->where('home_page',1)->get('product_category')->row_array(); ?>
                                <img src="<?= base_url('assets/img/category/'.$category['category_image']) ?>" width="100%">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                <?php foreach($products as $data){ ?>
                                    <div class="col-md-6 left-home">
                                    <button class="pro-box-btn" data-toggle="modal" data-target="#myModal" data-image="<?= $data['image_url'] !== null ? $data['image_url'] : 'alt="no image"'?>" data-id="<?php echo $data['id']?>" data-desc="<?php echo $data['product_description']?>" data-name="<?php echo $data['product_name']?>" data-price="<?php echo $data['display_price']?>"><br>
                                        <span><img src="<?= $data['image_url'] !== null ? base_url('assets/'.$data['image_url']) : 'alt="No Image"' ?>" width="100%" style="max-height:100px"></span><br>
                                        <span><?= $data['product_name'] ?></span><br>
                                        <span>&#2547;<?= $data['display_price'] ?></span><br>
                                    </button>
                                        <!-- for add to cart button -->
                                        

                                        <button class='btn-cart' data-id='<?php echo $data['id']?>' data-bangla='<?php echo $data['product_name']?>' data-name='<?php echo $data['product_name']?>' data-price='<?php echo $data['display_price']?>'><i class='fa fa-shopping-cart'></i> Add to cart</button>
                                        <!-- for add to cart button -->
                                    </div>
                                <?php } ?>
                                    <!-- <div class="col-md-6 left-home">
                                        <h4>Amazing deals! </h4>
                                        <h5>Up to 47% off</h5>
                                        <img src="<?= base_url() ?>client_assets/img/dumbbell-set-5kg-black.jpg">
                                    </div> -->
                                </div>

                                <!-- <div class="row">
                                    <div class="col-md-6 left-home2">
                                        <h4>Sit up bench</h4>
                                        <h5>Up to 25% off!</h5>
                                        <img src="<?= base_url() ?>client_assets/img/sit-up-bench.jpg">
                                    </div>
                                    <div class="col-md-6 left-home2">
                                        <h4>Home gym</h4>
                                        <h5>Up to 13% off!</h5>
                                        <img src="<?= base_url() ?>client_assets/img/home-gym.jpg">
                                    </div>
                                </div>   -->
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
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

<?//php include ('client/layouts/footer.php'); ?>
<?php $this->load->view('client/layouts/footer.php'); ?>

<script>
	$(document).ready(function () {
	   // var form1 = $(this).prevAll('.item:last');
	   //jQuery('.carousel-inner').siblings('.item:first').addClass( "active" );
        // var a = $(this).siblings('.line_item_wrapper').eq(0);
        //console.log(form1);

		$(".pro-box-btn").click(function(){
			var desc=$(this).attr("data-desc");
			var id=$(this).attr("data-id");
            var image=$(this).attr("data-image");
            
			var name=$(this).attr("data-name");
			var price=$(this).attr("data-price");
			image="<img src='<?php echo base_url()?>assets/"+image+"' width='100%'>";
			cart_btn="<button class='btn-cart' data-id='"+id+"' data-name='"+name+"' data-price='"+price+"'><i class='fa fa-shopping-cart'></i> Add to cart</button>";
			$('#product_photo').html(image);
			$('#product_cart').html(cart_btn);
			$('#desc').text(desc);
			$('#pro-name').text(name);
			$('#pro-price').text("৳ "+price);
		});
	});
</script>