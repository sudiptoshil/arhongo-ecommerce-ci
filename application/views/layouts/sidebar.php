<ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <?php if($this->session->userdata('vendor')) { ?>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <a class="dropdown-item" href="<?php echo base_url(); ?>product_ctrl/product_add_form">Add a Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url(); ?>product_ctrl/vendor_products">All Products</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Brand_ctrl/get'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Brands</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="ordersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="ordersDropdown">
            <a class="dropdown-item" href="order/pending_order_of_vendor">Pendign Orders</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="order/all_order_of_vendor">All Orders</a>
          </div>
        </li>
      
      <?php } ?> 

      <?php if($this->session->userdata('admin')) { ?>
      

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="productsDropdown">
            <a class="dropdown-item" href="<?php echo base_url(); ?>product_ctrl/product_add_form">Add a Product</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url(); ?>product_ctrl/products">All Products</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('type_ctrl/get');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Types</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Category_ctrl/get');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Category</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('Subcategory_ctrl/get');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Subcategory</span>
          </a>
          
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('order/');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Orders</span>
          </a>
        </li>   
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('home/slider/');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Sliders</span>
          </a>
        </li>                        

        

      
      <?php } ?> 

    </ul>




    