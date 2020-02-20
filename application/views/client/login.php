<?php $this->load->view('client/layouts/header.php'); ?>
		<div class="content_page">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Create a New Account</h2>
						<p>Create an account with us and you'll be able to:</p>
							<ul>
								<li>Check out faster</li>
								<li>Save multiple shipping addresses</li>
								<li>Access your order history</li>
								<li>Track new orders</li>	
								<li>Save items to your wish list</li>
							</ul>
						 <a href="create_account.php"><button id="singlebutton" name="singlebutton" class="btn btn-success cl-btn">Create new account</button></a>
					</div>
					<div class="col-md-6">
						<h2>Sign In</h2>
						<form class="form-horizontal" action="<?php echo base_url('client_controllers/main_ctrl/signin')?>" method="post">
							<fieldset>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="user_name"><p>Username</p></label>  
							  <div class="col-md-10">
							  <input id="user_name" name="user_name" type="text" placeholder=" Username" class="form-control input-md" required="">
							    
							  </div>
							</div>

							<!-- Password input-->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="password"><p>Password</p></label>
							  <div class="col-md-10">
							    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
							    
							  </div>
							</div>

							<!-- Button -->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="singlebutton"></label>
							  <div class="col-md-4">
							    <button id="singlebutton" name="singlebutton" class="btn btn-success cl-btn">Sign in</button>
							  </div>
							</div>

							</fieldset>
						</form>
					</div>
				
				</div>
			</div>
		</div>
        <?php $this->load->view('client/layouts/footer.php'); ?>