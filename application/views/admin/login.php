<!--header-->
<?php $this->load->view("/layouts/header"); ?>
<!--/header-->

<body class="bg-dark" id="">



<div class="container">

<?php if($this->session->flashdata('flash_error')){ ?>
    <div class="text-center pt-5">
       
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Attention!</strong> <?php echo $this->session->flashdata('flash_error') ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
    </div>
<?php } ?>

  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Admin Login</div>
    <div class="card-body">
      <form method="POST" action="<?php echo base_url('Reglog/admin_login') ?>">
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email address" required="required" autofocus="autofocus" name="email">
            <label for="inputEmail">Email address</label>
            <small class="text-danger"><?php echo form_error('email'); ?></small>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
            <label for="inputPassword">Password</label>
            <small class="text-danger"><?php echo form_error('password'); ?></small>
          </div>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me" name="password-remember">
              Remember Password
            </label>
          </div>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Login"/>
      </form>
      <div class="text-center">
        <a class="d-block small" href="<?php echo base_url() ?>reglog/forgot">Forgot Password?</a>
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

