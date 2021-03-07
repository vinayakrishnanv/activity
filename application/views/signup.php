<style type="text/css">
    .errspan {
        float: right;
        margin-right: 6px;
        margin-top: -20px;
        position: relative;
        z-index: 2;
        color: blue;
    }
    .status-available{color:#2FC332;}
    .status-not-available{color:#D60202;}
</style>

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
            <h3>Register Here!</h3>
            <form class="m-t" role="form" name="SignForm" action="<?php echo base_url('SignUp/SignUpProcess') ; ?>" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Name" id="txtName" required="true">
                </div>
                <div class="form-group">
                    <input type="email" name="txtEmail" class="form-control" placeholder="Email" id="txtEmail" required="true">
                </div>
                <div class="form-group">
                    <input type="text" name="txtUserName" class="form-control" placeholder="Username" id="txtUserName" required="true"  onBlur="checkAvailability()">
                    <span id="user-availability-status"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="txtPassword" class="form-control" placeholder="Password" id="txtPassword" required="true">
                    <span class="fa fa-eye errspan"></span>
                </div>
                <div class="form-group">
                    <select id="activity_type" name="activity_type" class="form-control" >
                        <option value="">Select activity type</option>
                        <option value="education">education</option>
                        <option value="recreational">recreational</option>
                        <option value="social">social</option>
                        <option value="diy">diy</option>
                        <option value="charity">charity</option>
                        <option value="cooking">cooking</option>
                        <option value="relaxation">relaxation</option>
                        <option value="music">music</option>
                        <option value="busywork">busywork</option>
                    </select>
                </div>
                <button type="submit" name="txtsubmit" class="btn btn-info block full-width m-b" id="RegBtn">Register</button>
            </form>
            <?php if($this->session->flashdata('msg')){ 
                $html = "<div class='alert alert-dismissable alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong></strong> ".$this->session->flashdata('msg')."</div>";
                  echo $html;
            } ?>

            <div>
                Already have an account.? <a href="<?php echo base_url('Login') ?>">Login here </a>
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

    document.getElementById("txtName").focus();

    function validateForm() {
        var type = document.forms["SignForm"]["activity_type"].value;
        if (type == "") {
            alert("Activity type should be selected");
            return false;
        }
    }

    $('.errspan').hover(function () {
        $('#txtPassword').attr('type', 'text');
    }, function () {
        $('#txtPassword').attr('type', 'password');
    });

    function checkAvailability(){
        var txtUserName = $("#txtUserName").val();
        $.ajax({
              url:'<?php echo base_url('SignUp/checkAvailability');?>',
              type:'POST',
              data:{
                txtUserName: txtUserName 
              },
              success:function(data){
                $("#user-availability-status").html(data);
              },
              error:function(data){
              }
            
        });
    }

</script>

