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
          <li class="breadcrumb-item active">Orders</li>
        </ol>
        <!-- /Breadcrumbs-->
     


        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header bg-white">
            <!--<a href="<?=base_url()?>category_ctrl/add/" 
               class="btn btn-sm btn-outline-success">Add new
            </a>-->
          </div>
          <div class="card-body">
            <div class="text-center">
                <h2>All Orders</h2>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" style="border-style: dashed" id="dataTable" width="100%" cellspacing="0">
                <thead class="">
                  <tr>
                    <th style="">SL.</th>
                    <th style="">Name</th>
                    <th style="">Phone</th>
                    <th style="">Transaction Id</th>
                    <th style="">Cost</th>
                    <th style="">Delivery Address</th>
                    <th style="">Order Date</th>
                    <th style="">Status</th>
                    <th style="">Details</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 0; foreach($list as $l) { $i++?>
                  <tr>
                    <td><?= $i;?></td>
                    <td><?= $this->common->getSpecificField('customers','customer_id',$l['customer_id'],'full_name');?></td>
                    <td><?= $this->common->getSpecificField('customers','customer_id',$l['customer_id'],'contact_no');?></td> 
                    <td><?= $l['transaction_id']; ?></td>
                    <td><?= $l['total_cost']; ?></td>
                    <td><?= $l['delivery_location']; ?></td>
                    <td><?= $l['created_at'];?></td>
                    <td><?php if($l['status'] == 1){echo "Pending";}elseif($l['status'] == 2){echo "Accepted";}elseif($l['status'] == 3){echo "Cancelled";};?></td>
                    <td>
                        <a href="#" onclick="showOrderDetails('<?=$l['id'];?>')" class="btn btn-sm btn-primary border-0" style="border-radius: 12px;">
                            Details
                        </a>
                    </td>
                    <!--<td class="text-nowrap">
                        <?php if($l['status'] == 1){?>
                        <a href="<?=base_url()?>order/order_change_status/<?=$l['id'];?>/2" 
                            class="btn btn-sm btn-primary border-0" style="border-radius: 12px;">
                            Accept
                        </a>
                        <a href="<?=base_url()?>order/order_change_status/<?=$l['id'];?>/3" 
                            class="btn btn-sm btn-warning border-0" style="border-radius: 12px;">
                            Cancel
                        </a>
                        <?php }else {
                            if($l['status'] == 2){echo "Accepted";}elseif($l['status'] == 3){echo "Cancelled";}
                        ?>
                        <?php
                        }
                        ?>
                    </td>-->
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

   function showOrderDetails(order_id){
       //alert(order_id);
/*
        $('#showProductDetailModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })*/
        //Clearing Previous Data
       /* $('#product-detail').html('');
        console.log(order_id);*/
        $('#showProductDetailModal').modal('show');
        $('#order-id').val(order_id);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?=base_url();?>' + 'order/order_details',
            data: {order_id:order_id},
            success: function(data){
                var orders_data='';
                var i=1;
                //alert(data.invoice);
              /*  if(data == 1){*/
              
              
                    $.each(data.invoice,function(var_attr, var_data){
                
                        orders_data = orders_data + "<tr class='text-center'>"
                            + "<td id='order_id"+ var_data.id+"'>"+ i++ +"</td>"
                            + "<td id='product_name"+ var_data.id +"'>"+ var_data.product_name +"</td>"
                            + "<td id='product_id"+ var_data.id +"'>"+ var_data.product_id +"</td>"
                            + "<td id='product_quantity"+ var_data.id +"'>"+ var_data.product_quantity +"</td>"
                            + "<td id='product_unit_price"+ var_data.id +"'>"+ var_data.product_unit_price +"</td>"
                            + "<td><input type='hidden' id='agent_sub_company_ware_id_"+ var_data.id +"' value='"+ var_data.product_id +"'>"
                            + "<input type='hidden' id='agent_sub_company_agent_id_"+ var_data.id +"' value='"+ var_data.product_id +"'>"
                            + "<button onclick='orderAccept("+var_data.order_id+")' id='orderAccept_"+var_data.order_id+"' class='btn btn-primary btn_custom'>Accept</button>"
                            + " <button onclick='orderCancel("+var_data.order_id+")' class='btn btn-danger btn_custom'>Cancel</button></td>"
                            + "</tr>";
                    });
                
                    if(i == 0)
                        orders_data = "";
                
                    document.getElementById("all_orders_table").innerHTML = orders_data;
                    //$('.order-details-body').html('<span class="text-success animated fadeOut delay-2s">Ok.</span>');
                    
                   // $('#order-details-body').trigger('reset');
                /*}else{
                    $('.order-details-body').html('<span class="text-danger animated fadeOut delay-2s">Not Ok.</span>');
                }*/
            },error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 0) {
                    alert('Not connect.\n Verify Network.');
                } else if (jqXHR.status == 404) {
                    alert('Requested page not found. [404] - Click \'OK\'');
                } else if (jqXHR.status == 500) {
                    alert('Internal Server Error. [500] - Click \'OK\'');
                } else if (errorThrown === 'parsererror') {
                    alert('Requested JSON parse failed - Click \'OK\'');
                } else if (errorThrown === 'timeout') {
                    alert('Time out error - Click \'OK\' and try to re-submit your responses');
                } else if (errorThrown === 'abort') {
                    alert('Ajax request aborted ');
                } else {
                    alert('Uncaught Error.\n' + jqXHR.responseText + ' - Click \'OK\' and try to re-submit your responses');
                }
            }
        });
    
       //}
   }
  

  </script>
  
  <div class="modal fade" id="showProductDetailModal" tabindex="-1" role="dialog" aria-labelledby="showProductDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showProductDetailModalLabel">Order Details</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body order-details-body">
            <form method="post">
                <input type="hidden" name="order-id" value="" id="order-id">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Product Name</th>
                            <th>product_id</th>
                            <th>product_quantity</th>
                            <th>product_unit_price</th> 
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody id="all_orders_table">
                        
                    </tbody>
                </table>
            </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  


