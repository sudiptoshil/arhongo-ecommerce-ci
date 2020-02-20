<!--header-->
<?php $this->load->view("/layouts/header"); ?>
<!--/header-->

<body class="bg-dark" id="">

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form method="POST" action="<?php echo base_url('reglog/forgot_submit') ?>">
          <div class="form-group">
            <div class="form-label-group">
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url() ?>reglog/vendor_up">Register an Account</a>
          <a class="d-block small" href="<?php echo base_url() ?>reglog/vendor_in">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php $this->load->view("/layouts/logoutmodal"); ?>
  <!--/ Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <?php $this->load->view("/layouts/endgame"); ?>

