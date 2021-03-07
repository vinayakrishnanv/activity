<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Activity</title>

    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_css_path'); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/style.css" rel="stylesheet">

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name" style="margin-bottom: 10px;">
                    <!-- <img alt="image" class="" src="<?php echo $this->config->item('admin_css_path'); ?>al-img/logo.png" width="150px"/> -->
                </h1>

            </div>
            <div style="padding-bottom: 25px;">&nbsp;</div>
            <h3>Please Login</h3>
            <form class="m-t" role="form" action="<?php echo base_url('Login/loginprocess') ; ?>" method="post">
                <div class="form-group">
                    <input type="text" name="txtUsername"class="form-control" placeholder="Username" id="txtUsername" required="true">
                </div>
                <div class="form-group">
                    <input type="password" name="txtpassword" class="form-control" placeholder="Password" id="txtpassword" required="true">
                </div>
                <button type="submit" name="txtsubmit" class="btn btn-info block full-width m-b" id="loginBtn">Login</button>
            </form>
            <?php if($this->session->flashdata('msg')){ 
                $html = "<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong></strong> ".$this->session->flashdata('msg')."</div>";
                  echo $html;
            } ?>
            <div>
                Dont have an account.? <a href="<?php echo base_url('SignUp') ?>">Register here </a>
            </div>
    </div>
    </div>

 <!-- Mainly scripts -->
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/inspinia.js"></script>
    <script src="<?php echo $this->config->item('admin_css_path'); ?>js/plugins/pace/pace.min.js"></script>


<script>

    document.getElementById("txtUsername").focus();

    $('.alert').delay(4500).fadeOut(500);

</script>

