<div class="footer_area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer">
                    <h2>Useful Links</h2>
                    <ul>
                        <li><a href="#">Become a Trusted Seller</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Mobile App</a></li>
                        <li><a href="#">Sitemap</a></li>
                        <li><a href="#">Buyer Protection</a></li>
                        <li><a href="#">Brands</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">eCommerce Report</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-3">
                <div class="footer">
                    <h2>Services</h2>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms and Conditions</a></li>
                        <li><a href="#">Payment Methods</a></li>
                        <li><a href="#">Press Center</a></li>
                        <li><a href="#">Jobs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer">
                    <h2>Company</h2>
                    <ul>
                        <li><a href="#">Registration</a></li>
                        <li><a href="#">Money Back Guarantee</a></li>
                        <li><a href="#">Bidding & buying help</a></li>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">Local</a></li>
                        <li><a href="#">guides</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer">
                    <h2>Contact US</h2>
                    <p>House # 82/A, Road # 2/1, Block # B, Sugandha R/A Panchlaish, Chittagong, Bangladesh</p>

                    <p>Call: 01812 351155</p>
                </div>

                <div class="social">
                    <a href="#" class="social-btn facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="social-btn twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="social-btn google"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                Copyright &copy; 2017 Sportive Cocoloco. All Rights Reserved.
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?= base_url('client_assets/js/owl.carousel.min.js') ?>"></script>
<!--<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>-->
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
</script>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!--<script src="<?= base_url() ?>client_assets/js/bootstrap.min.js"></script>-->
<script src="<?= base_url() ?>client_assets/js/plugins.js"></script>
<script src="<?= base_url() ?>client_assets/js/main.js"></script>


<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/card/jquery.hoverIntent.min.js"></script>			
<script src="<?php echo base_url(); ?>assets/js/card/jquery.mb.flipText.js"></script>			
<script src="<?php echo base_url(); ?>assets/js/card/slide.js"></script>			
<script src="<?php echo base_url(); ?>assets/js/card/mbExtruder.js"></script>			
<script src="<?php echo base_url(); ?>assets/js/card/jquery.animateNumber.min.js"></script>	 -->






<?php if($this->session->flashdata('success') !== null){ ?>
<script>
	swal({
		title: "Done",
		text: "<?php echo $this->session->flashdata('success'); ?>",
		timer: 5000,
		showConfirmButton: false,
		type: 'success'
	});
</script>
<?php } ?>
<?php if($this->session->flashdata('error') !== null){ ?>
<script>
	swal({
		title: "Done",
		text: "<?php echo $this->session->flashdata('error'); ?>",
		timer: 5000,
		showConfirmButton: false,
		type: 'error'
	});
</script>
<?php } ?>


<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText : ["<i class='fa fa-angle-left' style='font-size:36px'></i>","<i class='fa fa-angle-right' style='font-size:36px'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$(document).ready(function() {
	$(".megamenu").on("click", function(e) {
		e.stopPropagation();
	});
});


		function cart_data_display(){
			$.ajax({
				type : 'post',
				dataType : 'json',
				url : "<?= base_url('client_controllers/cart/getCartData') ?>",
				success : function(data){
						var html = ``;
						for (var key in data) {

						if (!data.hasOwnProperty(key)) continue;

						var obj = data[key];
						html += `
							<tr>
								<td>${obj.name}</td>
								<td>${obj.qty}</td>
								<td>${obj.price/obj.qty}</td>
							</tr>
						`;
					}
						
						$('#ttttt').html(html);
						$('#shoppingcart').modal('show');
				}
			});
		}
    $(document).ready(function () {

		//add cart data
		$(document).on( 'click', '.btn-cart', function () {
			if (Modernizr.mq('(min-width: 768px)')) {
				$("#toggle").show();
			} else {
				$("#toggle").hide();
			}

			$('#myModal').modal('hide');

			var product_id = $(this).attr('data-id');
			var product_name = $(this).attr('data-name');
			var price = $(this).attr('data-price');
			//alert(price);
			var type = 1;
			$(".btn-cart").attr("disabled", "disabled");
			$.ajax({
				type: 'POST',
				//dataType: 'json',
				url: "<?php echo base_url('client_controllers/cart/addToCart')?>",
				data: {product_id: product_id, product_name: product_name,price: price,type:type},
				success: function (data) {
					// console.log(data);
					$(".btn-cart").removeAttr("disabled");
					getTotalItem();
					getCartData();
					getTotalAmount();
					getCartDataForFreehand();
					getDiscountedAmount();
				}
			});
		});
		$(document).on('click','.btn-cart',function(){
			if (Modernizr.mq('(min-width: 768px)')) {
				if($("#toggle").is(":visible")){
					$("#addRemoveClass").addClass("col-md-10 col-sm-10 col-12");
					$("#addRemoveClass").removeClass("col-md-12 col-sm-12 col-12");
				} else{
					$("#addRemoveClass").addClass("col-md-12 col-sm-12 col-12");
					$("#addRemoveClass").removeClass("col-md-10 col-sm-10 col-12");
				}
			}
		});

		// add to cart
		$(".btn-cart").click(function () {
			if (Modernizr.mq('(min-width: 768px)')) {
				$("#toggle").show();
			} else {
				$("#toggle").hide();
			}

			var product_id = $(this).attr('data-id');
			var product_name = $(this).attr('data-name');
			var price = $(this).attr('data-price');
			var type = 1;
			// console.log('product_id : '+product_id+' product_name '+product_name+' price :'+price+' type : '+type);
			$(".btn-cart").attr("disabled", "disabled");
			$.ajax({
				type: 'POST',
				// dataType: 'json',
				url: "<?php echo base_url('client_controllers/cart/addToCart')?>",
				data: {product_id: product_id, product_name: product_name,price: price,type:type},
				
				success: function (data) {
					// console.log(data);
					$(".btn-cart").removeAttr("disabled");
					getTotalItem();
					getCartData();
					getTotalAmount();
					getCartDataForFreehand();
					getDiscountedAmount();
				}
			});
		});

		$(document).on('click','.subtract-qty',function(){
			var rowId = $(this).attr('data-rowid');
			var qty = $(this).attr('data-qty');
			var price = $(this).attr('data-price');
			$(".subtract-qty").attr("disabled", "disabled");
			$.ajax({
				type: 'POST',
				//dataType: 'json',
				url: "<?php echo base_url('client_controllers/cart/subtract_cart_qty')?>",
				data: {rowid: rowId, qty: qty,price:price},
				success: function (data) {
					$(".subtract-qty").removeAttr("disabled");
					getTotalItem();
					getCartData();
					getTotalAmount();
					getCartDataForFreehand();
					getDiscountedAmount();
				}
			});
		});
		$(document).on('click','.add-qty',function(){
			var rowId = $(this).attr('data-rowid');
			var qty = $(this).attr('data-qty');
			var price = $(this).attr('data-price');
			$(".subtract-qty").attr("disabled", "disabled");
			$.ajax({
				type: 'POST',
				//dataType: 'json',
				url: "<?php echo base_url('client_controllers/cart/add_cart_qty')?>",
				data: {rowid: rowId, qty: qty,price:price},
				success: function (data) {
					$(".subtract-qty").removeAttr("disabled");
					getTotalItem();
					getCartData();
					getTotalAmount();
					getCartDataForFreehand();
					getDiscountedAmount();
				}
			});
		});
		$(document).on('click','.delete-single-cart-item',function(){
					var rowId = $(this).attr('data-rowid');

					$(".subtract-qty").attr("disabled", "disabled");
					$.ajax({
						type: 'POST',
						//dataType: 'json',
						url: "<?php echo base_url('client_controllers/cart/delete_single_cart_item')?>",
						data: {rowid: rowId},
						success: function (data) {
							$(".subtract-qty").removeAttr("disabled");
							getTotalItem();
							getCartData();
							getTotalAmount();
							getCartDataForFreehand();
							getDiscountedAmount();
						}
					});
				});


		getCartData();
		getTotalItem();
		getTotalAmount();
		getCartDataForFreehand();
		getDiscountedAmount();


        function getTotalItem() {

            var items="";
            $.getJSON( "<?php echo base_url('client_controllers/cart/getTotalItem')?>",function(data){
                items=data+" Items";
				$("#total-item").html(items);
				$("#total-cart-item").html(items);

				if(data==0){
					$(".order-btn").hide();
					$(".freehand-btn").hide();
					$("#place_order").hide();
					$("#need_to_add_cart").show();
				}
				else{
					$(".order-btn").show();
					$(".freehand-btn").show();
					$("#place_order").show();
					$("#need_to_add_cart").hide();
				}
            });
        }

		function getDiscountedAmount(){
			$.getJSON("<?php echo base_url('client_controllers/cart/getDiscountedAmount')?>", function (data) {
				$("#discounted_amount").text("৳ "+data);
				var a = $("#total-amount").html();
				
				
			}
			)};
		
		function getTotalAmount() {

			var items = "";
			$.getJSON("<?php echo base_url('client_controllers/cart/getTotalAmount')?>", function (data) {
				// console.log(data);
				items = "৳ "+data;
				$("#total-amount").html(items);
				$("#total_amount").html(items);
				
				if (data == 0) {
					$(".order-btn").hide();
					$("#place_order").hide();
					$("#need_to_add_cart").show();
				} else {
					$(".order-btn").show();
					$("#place_order").show();
					$("#need_to_add_cart").hide();
				}
			});
		}

		

		
		function getCartData() {

			var items="";
			var rows="";
			var discount = 0;
			var total = 0;
			
			$.getJSON( "<?php echo base_url('client_controllers/cart/getCartData')?>",function(data){
				$.each(data,function(index,item)
				{
					// console.log(item);
					rows+="<tr><td>"+item.name+"</td><td>"+item.price/item.qty+"</td><td>"+item.qty+"</td><td>"+item.price+"</td><td>"+`${item.discount?(item.discount/100)*item.price:''}`+"</td><td>"+item.date+"</td></tr>";
					discount = discount+(item.discount/100)*item.price;
					total = total + item.price;

					items+="<tr><td><div class='cart-table-button'><center><button data-rowid='"+item.rowid+"' data-qty='"+item.qty+"' data-price='"+item.price+"' class='add-qty'><i class='fa fa-chevron-up'></i></button><br>"+item.qty+"<br><button data-rowid='"+item.rowid+"' data-qty='"+item.qty+"' data-price='"+item.price+"' class='subtract-qty'><i class='fa fa-chevron-down'></i></button><center></div></td><td> "+item.name+"</td><td> ৳ "+item.price+`<br>${item.discount?'Dis : ':''}<span class="text-danger">${item.discount?item.discount+' %':''}</span>`+"</td><td><button data-rowid='"+item.rowid+"' class='delete-single-cart-item delete-single-cart'>x</button></div> </td></tr>";
					
				});
				rows+="<tr><th colspan=3>Total</th><td>"+total+"</td></tr>"
				rows+="<tr><th colspan=3>Discount</th><td id='total_discount'>"+discount+"</td></tr>"
				rows+="<tr><th colspan=3>Delivery Charge</th><td>0.00</td></tr>"
				rows+="<tr><th colspan=3>Net Total</th><td>"+(total-discount)+"</td></tr>"
				rows+="<tr><th colspan=3>VAT(15%)</th><td>"+Math.ceil((total-discount)*0.15)+"</td></tr>"
				rows+="<tr><th colspan=3>Total Payable</th><td id='total_cost'>"+(Math.ceil((total-discount)*0.15)+(total-discount))+"</td></tr>"

				$(".cart-data").html(items);
				$("#trr").html(rows);
			});

		}



		$("#cart-box-btn").click(function () {
			$("#toggle").toggle("slide", function(){
				// check paragraph once toggle effect is completed
				if (Modernizr.mq('(min-width: 768px)')) {
					if($("#toggle").is(":visible")){
						$("#addRemoveClass").addClass("col-md-10 col-sm-10 col-xs-12");
						$("#addRemoveClass").removeClass("col-md-12 col-sm-12 col-xs-12");
						$(".addRemoveClass2").addClass("col-md-3 col-sm-4 col-6");
						$(".addRemoveClass2").removeClass("col-5 col-sm-4 col-6");
					} else{
						$("#addRemoveClass").addClass("col-md-12 col-sm-12 col-xs-12");
						$("#addRemoveClass").removeClass("col-md-10 col-sm-10 col-xs-12");
						$(".addRemoveClass2").addClass("col-5 col-sm-4 col-6");
						$(".addRemoveClass2").removeClass("col-md-3 col-sm-4 col-6");
					}
				}
			});
		});
		//freehand order


		function getCartDataForFreehand() {

			var items="";
			$.getJSON( "<?php echo base_url('client_controllers/cart/getCartData')?>",function(data){
				$.each(data,function(index,item)
				{
					items+="<tr id='item_list"+item.id+"'><td width='18%'>"+item.name+"<input type='hidden' name='product_name[]' class='form-control custom-table-form-control  product_id' value='"+item.name+"' readonly><input type='hidden' name='product_id[]' class='form-control custom-table-form-control  product_id' value='"+item.id+"' readonly><td width='6%'><input type='hidden' name='qty[]' value='"+item.qty+"' class='form-control' required><center><div class='freehand-cart-add-btn'><button data-rowid='"+item.rowid+"' data-qty='"+item.qty+"' data-price='"+item.price+"' class='subtract-qty'>-</button>"+item.qty+"<button data-rowid='"+item.rowid+"' data-qty='"+item.qty+"' data-price='"+item.price+"' class='add-qty'>+</button></center></div><input type='hidden' name='type[]' class='form-control custom-table-form-control  product_id' value='"+item.type+"' readonly></td><td>"+item.price+"</td><td><button type='button' class='btn btn-danger delete-single-cart-item' data-rowid='"+item.rowid+"'><i class='fa fa-ban'></i></button></td></tr>";
				});

				$("#freehand-items").html(items);
			});

		}
		$("#product_type").keyup(function(event){
			if(event.keyCode == 13){

				if($('#product_button').attr('disabled')){

				}else{

					$("#product_button").click();

				}
			}
		});

		$("#product_type2").keyup(function(event){
			if(event.keyCode == 13){

				if($('#product_button2').attr('disabled')){

				}else{

					$("#product_button2").click();

				}
			}
		});

		$('#product_button').click(function(){

			var product_type = $('#product_type').val();
			var product_map = $('.product_id').map(function(){ return this.value; }).get();

			var product_key=$('input[name="product"]').val();
			var product_name= $("#product_type").val();
			var product_id = $('#product_id-datalist').find('option').filter(function()
			{ return $.trim( $(this).text() ) === product_key; }).attr('id');

			if ($.inArray(product_name, product_map) > -1) {

				swal({
					title: "Item is already in this list",
					type: "warning",
					timer: 1500,
					showConfirmButton: false,
					customClass: 'swal-height'

				});


			}
			else{

				if((product_id=='') || (product_id==undefined)){

					var product_name= $("#product_type").val();
					$('#product_button').css('cursor', 'wait');
					$('#product_button').attr('disabled', true);
					$.ajax({
						type: 'POST',
						url: "<?php echo base_url('order/addOtherProduct')?>",
						data: {product_name: product_name},
						dataType: "json",
						success: function (data) {
							var product_id = data;
							var price = 0;
							var type = 2;
							$.ajax({
								type: 'POST',
								url: "<?php echo base_url('client_controllers/cart/addToCart')?>",
								data: {product_id: product_id, product_name: product_name,price: price,type:type},
								success: function (data) {
									// console.log(data);
									getTotalItem();
									getCartData();
									getTotalAmount();
									getCartDataForFreehand();
									getDiscountedAmount()
								}
							});
						}
					});
					$('#product_button').css('cursor', 'pointer');
					$('#product_button').removeAttr('disabled');
					$("#product_type").val('');
				}
				else{
					$('#product_button').css('cursor', 'wait');
					$('#product_button').attr('disabled', true);

					$.ajax({
						type: "POST",
						dataType: "json",
						url: "<?php echo base_url('lookup/getProductById')?>",
						data:{"id":product_id},
						cache: false,
						success: function (response) {
							var product_id = response['product_id'];
							var product_name = response['product_name'];
							var price = response['probable_price'];
							var type = 1;
							$.ajax({
								type: 'POST',
								//dataType: 'json',
								url: "<?php echo base_url('client_controllers/cart/addToCart')?>",
								data: {product_id: product_id, product_name: product_name,price: price,type:type},
								success: function (data) {
									getTotalItem();
									getCartData();
									getTotalAmount();
									getCartDataForFreehand();
									getDiscountedAmount();
								}
							});
						}
					});
					$('#product_button').css('cursor', 'pointer');
					$('#product_button').removeAttr('disabled');
					$("#product_type").val('');
				}
			}
		});

		$('#product_button2').click(function(){

			var product_type = $('#product_type2').val();
			var product_map = $('.product_id').map(function(){ return this.value; }).get();

			var product_key=$('#product_type2').val();
			var product_name= $("#product_type2").val();
			var product_id = $('#product_id-datalist2').find('option').filter(function()
			{ return $.trim( $(this).text() ) === product_key; }).attr('id');

			if ($.inArray(product_name, product_map) > -1) {

				swal({
					title: "Item is already in this list",
					type: "warning",
					timer: 1500,
					showConfirmButton: false,
					customClass: 'swal-height'

				});
			}
			else{
				if((product_id=='') || (product_id==undefined)){

					var product_name= $("#product_type2").val();
					$('#product_button2').css('cursor', 'wait');
					$('#product_button2').attr('disabled', true);
					$.ajax({
						type: 'POST',
						url: "<?php echo base_url('order/addOtherProduct')?>",
						data: {product_name: product_name},
						dataType: "json",
						success: function (data) {
							var product_id = data;
							var price = 0;
							var type = 2;
							$.ajax({
								type: 'POST',
								url: "<?php echo base_url('client_controllers/cart/addToCart')?>",
								data: {product_id: product_id, product_name: product_name,price: price,type:type},
								success: function (data) {
									getTotalItem();
									getCartData();
									getTotalAmount();
									getCartDataForFreehand();
									getDiscountedAmount();
								}
							});
						}
					});
					$('#product_button2').css('cursor', 'pointer');
					$('#product_button2').removeAttr('disabled');
					$("#product_type2").val('');
				}
				else {
					$('#product_button2').css('cursor', 'wait');
					$('#product_button2').attr('disabled', true);

					$.ajax({
						type: "POST",
						dataType: "json",
						url: "<?php echo base_url('lookup/getProductById')?>",
						data:{"id":product_id},
						cache: false,
						success: function (response) {
							var product_id = response['product_id'];
							var product_name = response['product_name_bangla'];
							var price = response['probable_price'];
							var type = 1;
							$.ajax({
								type: 'POST',
								//dataType: 'json',
								url: "<?php echo base_url('client_controllers/cart/addToCart')?>",
								data: {product_id: product_id, product_name: product_name,price: price,type:type},
								success: function (data) {
									getTotalItem();
									getCartData();
									getTotalAmount();
									getCartDataForFreehand();
									getDiscountedAmount();
								}
							});
						}
					});
					$('#product_button2').css('cursor', 'pointer');
					$('#product_button2').removeAttr('disabled');
					$("#product_type2").val('');
				}
			}
		});


		//notification

		// getSellerResponseNotification();
		// getOnTheWayNotification();
		// getSellerResponseTopNotification();
		// setInterval(function () {
		// 	getSellerResponseNotification();
		// 	getOnTheWayNotification();
		// 	getSellerResponseTopNotification();
		// },15000);

		function play(){
			var x = document.getElementById("myAudio");
			x.play();
		}

		function getSellerResponseNotification() {

			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: "<?php echo base_url('client_controllers/notification/getSellerResponseNotification')?>",
				data: '',

				success: function (data) {

					if(data['total']>0){
						$('#seller-response-notification').html(data['total']);
						$('#seller-response-notification2').html(data['total']);
						$('#seller-response-notification3').html(data['total']);
						$('#seller-response-notification4').val(data['total']);
					}
					if($("input#seller-response-notification4").trigger('change')){
						//alert("change");
					}

					if(data['total']==0){
						a=0;
						if(a<data['total']){
							play();
						}
					}
					else if(data['total']>1){
						if(a<data['total']){
							play();
						}
					}


				}
			});
		}
		function getSellerResponseTopNotification(){
			var items="";
			$.getJSON( "<?php echo base_url('client_controllers/notification/getSellerResponseTopNotification')?>", {
				format: "json"
			}).done(function( data ) {
				$.each(data,function(index,item)
				{
					var date1, date2;
					date1 = new Date();
					date2 = new Date(item.date);

					var res = Math.abs(date1 - date2) / 1000;

					// get total days between two dates
					var days = Math.floor(res / 86400);
					// get hours
					var hours = Math.floor(res / 3600) % 24;

					// gt minutes
					var minutes = Math.floor(res / 60) % 60;
					items+="<a href='<?php echo base_url('order/getSellerDetailsByID?seller_order_master_id=')?>"+item.seller_order_master_id+"&order_id="+item.order_master_id+"' class='notify-item'><div class='notify-thumb'><i class='ti-comments-smiley btn-info'></i></div><div class='notify-text'><p>You get seller response for order- "+item.order_master_id+" and price is- "+item.total+"</p><span>"+days+" days "+hours+" hours "+minutes+" minutes ago</span></div></a>";
				});

				$('.notify-list-in').html(items);
			});
		}

		function getOnTheWayNotification() {
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: "<?php echo base_url('client_controllers/notification/getOnTheWayNotification')?>",
				data: '',
				success: function (data) {
					if(data['total']>0){
						$('#on-the-way-notification').html(data['total']);
						$('#on-the-way-notification2').html(data['total']);
						$('#on-the-way-notification3').html(data['total']);
					}

				}
			});
		}

    });



</script>

</body>

</html>