<?php $this->load->view('client/layouts/header.php'); ?>
        
    <div class="page_head">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h2><?= $this->session->userdata('full_name') ?></h2>
                        </div>
                </div>
        </div>
    </div>
        
    <div class="content_page">
        <div class="container">
            <div class="row">
                
					<div class="col-lg-6">
					<h1>User Profile</h1>
					<?php $photo = $this->db->where('customer_id',$this->session->userdata('customer_id'))->get('customers')->row_array(); ?>
					<a onclick="imageUpdate(<?= $this->session->userdata('customer_id') ?>)"><img src="<?= $photo['photo'] ? base_url('./client_assets/images/profile/'.$photo['photo']) : base_url('./client_assets/images/profile/default.png') ?>" width='50%' alt=""></a>		
						<!-- <form action="" class="mt-2">
							<input type="file" name="user_profile" ><br>
							<button type="submit" class="btn btn-success mt-2">Update</button>
						</form> -->
					</div>
					<div class="col-lg-6">
						<h1>Other Information</h1>
						

						<table class="table table-bordered">
							<tr>
								<th>Name : </th>
								<td><?= $customer['full_name'] ?></td>
							</tr>
							<tr>
								<th>Username : </th>
								<td><?= $customer['user_name'] ?></td>
							</tr>
							<tr>
								<th>Email : </th>
								<td><?= $customer['email'] ?></td>
							</tr>
							<tr>
								<th>Contact No : </th>
								<td><?= $customer['contact_no'] ?></td>
							</tr>
							<tr>
								<th>National ID : </th>
								<td><?= $customer['national_id'] ?></td>
							</tr>
							<tr>
								<th>Present Address : </th>
								<td><?= $customer['present_address'] ?></td>
							</tr>
							<tr>
								<th>Permanent Address : </th>
								<td><?= $customer['permanent_address'] ?></td>
							</tr>
							
						</table>
						<button class="btn btn-success" onclick="updateProfile(<?= $this->session->userdata('customer_id') ?>)">Update</button>
					</div>
            </div>
        </div>
    </div>

<!-- modal for customer info update start here -->
    <div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="other_info">
				
			</div>
			
		</div>

	</div>
</div>
<!-- modal for customer info update end here -->


<!-- modal for customer profile image update start here -->
<div id="profileImageModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="other_info">
				<div class="cart">
					<img id="blah"  src="<?= base_url('client_assets/images/profile/'.$photo['photo']) ?>"  alt="">
					<form action="<?= base_url('client_controllers/profile_ctrl/customer_photo/'.$this->session->userdata('customer_id')) ?>" method="post" enctype="multipart/form-data">

					<div class="form-group">
                            <label for="photo">Attachment</label>
                            <input type="file" name="photo" id="attachment" onchange="readURL(this);">
                        </div>
						<!-- <input type="file" name="photo" onchange="readURL(this);"> -->
						<!-- <imgsrc="#" alt="your image" /> -->
						<button type="submit" class="btn btn-success">Change Image</button>
					</form>
				</div>
			</div>
			
		</div>

	</div>
</div>
<!-- modal for customer profile image update end here -->

    <?php $this->load->view('client/layouts/footer.php'); ?>
<script>
$(document).ready(function () {
		$("#toggle").hide();
		$(".order-btn").hide();
		$(".cart-open-btn").hide();
});
	function updateProfile(customer_id){
		// $('#myModal').modal('show');
		var url = "<?= base_url('client_controllers/profile_ctrl/get_customer/') ?>"+customer_id;
		if(customer_id){
			$.ajax({
				type : 'post',
				url : url,
				dataType : 'json',
				success : function(response){
					var html = `
					<h1 class="mb-3">Update Profile</h1>
					<form  method="post" action="<?= base_url('client_controllers/profile_ctrl/update_customer_info/') ?>${customer_id}">
						<div class="form-group">
							<label>Full Name</label>
							<input type="text" value="${response.full_name}" class="form-control" name="full_name" autocomplete="off" placeholder="Type your full name">
						</div>
						<div class="form-group">
							<label>User Name</label>
							<input type="text" value="${response.user_name}" class="form-control" name="user_name" autocomplete="off" placeholder="Type a user name" required>
							<?= form_error('user_name') ?>
						</div>
						<div class="form-group">
							<label>Email (If any)</label>
							<input type="email" value="${response.email}" class="form-control" name="email" autocomplete="off" placeholder="Type a email (if any)">
						</div>
						<div class="form-group">
							<label>Contact No</label>
							<input type="text" value="${response.contact_no}" class="form-control" name="contact_no" autocomplete="off" placeholder="Type your mobile no" required>
							<?= form_error('contact_no') ?>
						</div>
						<div class="form-group">
							<label>National ID</label>
							<input type="text" value="${response.national_id}" class="form-control" name="national_id" autocomplete="off" placeholder="Type your national identity no">
						</div>
						<div class="form-group">
							<label>Present Address</label>
							<textarea class="form-control" rows="3" name="present_address" autocomplete="off"  placeholder="Type your present address">${response.present_address}</textarea>
						</div>
						<div class="form-group">
							<label>Permanent Address</label>
							<textarea class="form-control" rows="3" name="permanent_address" autocomplete="off" placeholder="Type your permanent address">${response.permanent_address}</textarea>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Type a password with at least 6 characters">
							<?= form_error('password') ?>
						</div>
						<div class="form-group">
							<label>Confirm Password</label>
							<input type="password" class="form-control" onkeyup="confirm_password(this.value)" name="c_password" autocomplete="off" placeholder="Confirm password">
							<?= form_error('c_password') ?>
						</div>
						
						<div class="submit-btn-area">
							<button class="btn btn-warning" type="submit">Update <i class="ti-arrow-right"></i></button>
						</div>
					</form>
					`;
					$('#other_info').html(html);
					$('#myModal').modal('show');
					
				}
			});
		}
	}

	function confirm_password(value){
		var password = $('#password').val();
		// alert(password);
		if(value == password){
			$("#password").css("border", "1px solid green");
		}else{
			$("#password").css("border", "1px solid red");
		}
	}

	function imageUpdate(customer_id){
		$('#profileImageModal').modal('show');
	}


	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
