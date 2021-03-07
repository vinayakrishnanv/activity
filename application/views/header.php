<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Activity List</title>

    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_css_path'); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_css_path'); ?>css/sweetalert/sweetalert.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element" style="padding-top:0px;margin-top:0px;">
                    <span class="m-r-sm text-muted welcome-message">Welcome to Activity</span>
                    </div>
                </li>
                <li class="active">
                    <a href="<?php echo base_url('Activitylist'); ?>"><i class="fa fa-th-large" ></i> <span class="nav-label">Activity List</span> </a>
                </li>
              
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    
                </li>
                


                <li>
                    <a href="<?php echo base_url('Login/logout'); ?>">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>