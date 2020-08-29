<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/sidebar/style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- Our Custom CSS -->
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