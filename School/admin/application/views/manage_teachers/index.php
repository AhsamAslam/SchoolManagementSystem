<?php $this->load->view('templates/header');?>
<div class="container">
    <h2>Teachers Management</h2>

    <!-- Display status message -->
    <?php if (!empty($success_msg)) { ?>
        <div class="col-xs-12">
            <div class="alert alert-success"><?php echo $success_msg; ?></div>
        </div>
    <?php } elseif (!empty($error_msg)) { ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-12 head">
            <!-- <h5><?php echo $title; ?></h5> -->
            <!-- Add link -->
            <div class="float-center mb-5">
                <a href="<?php echo base_url('Manage_Teachers/add'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Add a Teacher</a>
            </div>
        </div>

        <!-- Data list table -->
        <table id="table_id" class="table table-striped table-bordered" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 30px;">#</th>
                    <th style="min-width: 50px;">ID</th>
                    <th style="min-width: 200px;">Teacher Name</th>
                    <th style="min-width: 150px;">CNIC</th>
                    <th style="min-width: 150px;">Email</th>
                    <th style="min-width: 150px;">Contact</th>
                    <th style="min-width: 100px;">Salary</th>
                    <th style="min-width: 100px;">Address</th>
                    <th style="min-width: 100px;">Image</th>
                    <th style="min-width: 180px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($teachers)) {
                    $i = 0;
                    foreach ($teachers as $row) {
                        $i++;
                        $teacherId = $row['teacher_identification'];
                        $teacherName = $row['teacher_name'];
                        $teacherContact = $row['teacher_contact'];
                        $teacherEmail = $row['teacher_email'];
                        $teacherSalary = $row['teacher_salary'];
                        $teacherAddress = $row['teacher_address'];
                        $teacherCnic = $row['teacher_cnic'];
                        $teacherImage = !empty($row['teacher_image'])?'<img src="'.base_url().'uploads/teachers/'.$row['teacher_image'].'" alt="" width="100" height="75" />':''; 
                       
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $teacherId; ?></td>
                            <td><?php echo $teacherName; ?></td>
                            <td><?php echo $teacherCnic ?></td>
                            <td><?php echo $teacherEmail ?></td>
                            <td><?php echo $teacherContact; ?></td>
                            <td><?php echo $teacherSalary ?></td>
                            <td><?php echo $teacherAddress ?></td>
                            <td><?php echo $teacherImage ?></td>
                            <td style="display:flex;">
                                <a href="<?php echo base_url('manage_teachers/edit/' . $row['teacher_id']); ?>" class="btn btn-warning" style="margin:2px">Edit</a><br>
                                <a href="<?php echo base_url('manage_teachers/delete/' . $row['teacher_id']); ?>" class="btn btn-danger" style="margin:2px" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a><br>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No Teacher(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('templates/footer');?>