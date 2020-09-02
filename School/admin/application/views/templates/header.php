<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/sidebar/style.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/font-awesome.min.css">
    <title>School Management System</title>
</head>

<body>
    <!-- The sidebar -->
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>School Management System</h3>
            </div>

            <ul class="list-unstyled components">
                <!-- <p>Dummy Heading</p> -->
                
                <li>
                    <a href="<?php echo base_url('Manage_Teachers'); ?>">Teachers</a>
                   
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Students'); ?>">Students</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Courses'); ?>">Courses</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Classes'); ?>">Classes</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Sections'); ?>">Sections</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Fee_Sheets'); ?>">Fee Sheets</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Salaries'); ?>">Salaries</a>
                </li>
                <li>
                    <a href="<?php echo base_url('Manage_Results'); ?>">Results</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">