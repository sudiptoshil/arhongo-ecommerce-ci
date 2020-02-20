<?php $this->load->view('client/layouts/header.php'); ?>
        
    <div class="page_head">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h2>All Orders</h2>
                        </div>
                </div>
        </div>
    </div>
        
    <div class="content_page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                <div class="table-responsive">
			<table class="table table-bordered table-hover" id="dataTable">
				<thead>
				<tr>
					<th width="">#</th>
					<th width="">Order No</th>
					<th width="">Date</th>
					<th width="">Time</th>
					<th width="">Shipping Address</th>
					<th width="">Status</th>
					<th width="">Action</th>
				</tr>
				</thead>
				<tbody>
					<?php if($orders != null){
					foreach($orders as $key=>$order){ ?>
						<tr>
							<td><?= $key+1 ?></td>
							<td><?= $order['id'] ?></td>
							<td><?= date('d/m/Y',strtotime($order['created_at'])) ?></td>
							<td><?= date('h:i:s A',strtotime($order['created_at'])) ?></td>
							<td><?= $order['delivery_location'] ?></td>
							<td>
							    <?php if($order['status'] == 1){
							        echo "Pending";
							    }elseif($order['status'] == 2){
							         echo 'Accepted';
							    }elseif($order['status'] == 3){
							        echo "Canceled";
							    } ?>
							</td>
							<td>
								<a href="#" class="btn btn-danger btn-xs">Cancel</a>
								<button class="btn btn-success btn-xs" onclick="orderDetails(<?= $order['id'].','.$order['total_cost'] ?>)">Details</button>
							</td>
						</tr>
					<?php }} ?>
				</tbody>
			</table>
			<?php if (isset($links)) { ?>
                                <?= $links ?>
                            <?php } ?>
		</div>

		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<h5 style="font-size: 16px">Order Details</h5>
						<hr>
						<table class="table table-hover table-bordered align-center">
							<thead>
								<tr>
									<th>#</th>
									<th>Product</th>
									<th>Qty</th>
									<th>Price</th>
									<th>Discount</th>
									<th>Total</th>
								</tr>
							</thead>
							<!-- <tbody class="order-details">
							
							</tbody> -->
					
						
							<tbody id="order_details">
								<!-- <tr>
									<td id="total" width="100%" class="text-right"></td>
								</tr> -->
							</tbody>
						</table>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>

			</div>
		</div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('client/layouts/footer.php'); ?>
    <script>
// $(document).ready(function() {
//   $(".modal").on("hidden.bs.modal", function() {
//     $(".modal-body").html("Where did he go?!?!?!");
//   });
// });
	function orderDetails(order_id,total_cost){
		// $('#myModal').modal('show');
		
		var url = "<?= base_url('client_controllers/order_ctrl/order_details/') ?>" + order_id;
		if(order_id){
			$.ajax({
				type : 'post',
				url : url,
				dataType : 'json',
				success : function(response){
					console.log(response);
					var invoice_count = response.length;
					var html = '';
					var discount = 0;
					var total_discount = 0;
					var t_discount = 0;
					for(var i = 0; i < invoice_count; i++){
						html += `
							<tr>
								<td width="5%">${i+1}</td>
								<td width="10%">${response[i].pname}</td>
								<td width="10%">${response[i].product_quantity}</td>
								<td width="10%">${response[i].product_unite_price}</td>
								<td width="10%">${response[i].pdiscount?response[i].pdiscount+' %':''}</td>
								<td width="10%">${response[i].product_unite_price * response[i].product_quantity}</td>
								
							</tr>
							
						`;
						if(response[i].pdiscount !== null){
							 discount = (response[i].product_quantity * response[i].product_unite_price) * response[i].pdiscount/100;
							total_discount = (total_discount+discount);
						}
						if(total_discount !== 0){
							t_discount =  total_discount;
						}
						
						
					}
						html += `
						<tr>
							<th colspan='5'>Total</th>
							<th>${total_cost}</th>
						</tr>
						<tr>
							<th colspan='5'>Discount</th>
							<th>${t_discount?t_discount:total_discount}</th>
						</tr>
						<tr>
							<th colspan='5'>Net Payable</th>
							<th>${t_discount?total_cost-t_discount:total_cost}</th>
						</tr>
						`;
					$('#order_details').html(html);
					$('#myModal').modal('show');
					// $('#myModal').html("");
				}
			});
		}
	}


	$(document).ready(function () {
		$("#toggle").hide();
		$(".order-btn").hide();
		$(".cart-open-btn").hide();


		// var dataTable = $('#dataTable').DataTable( {

		// 	"processing": true,
		// 	"serverSide": true,
		// 	"deferRender": true,
		// 	"ajax":{
		// 		"url": '<?//php echo base_url('order/getPendingOrderForBuyer')?>',
		// 		"type": "POST",
		// 		data: function(d) {
		// 			//d.matter_no = $("#matter_no").val();
		// 		}

		// 	},

		// 	"columns": [
		// 		null,
		// 		null,
		// 		null,
		// 		null,
		// 		null,
		// 		{ "className": "center" },
		// 	],

		// 	"autoWidth": false,


		// 	"columnDefs": [ {
		// 		"targets": -1,
		// 		"data": null,
		// 		"defaultContent": "<td align='center'><a href='#myModal' role='button' id='view' class='btn btn-primary btn-xs small_btn' title='Details' data-toggle='modal'><i class='fa fa-tasks'></i> View</a></td> "
		// 	} ],

		// 	"aLengthMenu": [
		// 		[10, 25, 50, -1],
		// 		[10, 25, 50, "All"]
		// 	],
		// 	// set the initial value
		// 	"iDisplayLength": 10,
		// 	"bFilter" : true,
		// 	"bLengthChange": true,
		// 	"bInfo": true,
		// 	"responsive": true,
		// 	"bPaginate": true,
		// 	"aaSorting": [[ 0, "asc" ]],
		// 	"bDestroy": true



		// } );

		// $('#dataTable tbody').on( 'click', '#view', function () {
		// 	var data = dataTable.row( $(this).parents('tr') ).data();
		// 	var id=data[1];

		// 	var items="";
		// 	var total=0;
		// 	$.getJSON( "<?//php echo base_url('order/getOrderByID')?>", {
		// 		"order_id":id,
		// 		format: "json"
		// 	}).done(function( data ) {
		// 		$.each(data,function(index,item)
		// 		{
		// 			total += parseInt(item.probable_price);
		// 			items+="<tr><td>"+item.product_name+"</td><td>"+item.uom_name+"</td><td class='text-right'>"+item.quantity+"</td><td class='text-right'>"+item.probable_price+" &#177;</td></tr>";
		// 		});
		// 		var total_value=total+" &#177;";
		// 		$(".order-details").html(items);
		// 		$("#total").html(total_value);
		// 	});
		// });
	});
</script>
