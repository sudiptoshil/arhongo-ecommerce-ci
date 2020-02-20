<!-- Success Flash -->
<?php if ($this->session->flashdata('success')){ ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('success') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    <?php } ?>        
<!-- Success Flash -->


<!-- Err Flash -->
<?php if ($this->session->flashdata('err')){ ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('err') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
    <?php } ?>        
<!-- Err Flash -->