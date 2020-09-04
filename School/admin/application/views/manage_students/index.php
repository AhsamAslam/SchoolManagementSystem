<?php $this->load->view('templates/header');?>
<div class="container">
    <h2>Students Management</h2>

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
                <a href="<?php echo base_url('Manage_Students/add'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Add a Student</a>
            </div>
        </div>

        <!-- Data list table -->
        <table id="table_id" class="table table-striped table-bordered" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th style="min-width: 150px;">ID</th>
                    <th style="min-width: 150px;">Name</th>
                    <th style="min-width: 100px;">Contact</th>
                    <th style="min-width: 150px;">Email</th>
                    <th style="min-width: 100px;">Address</th>
                    <th style="min-width: 150px;">Father Name</th>
                    <th style="min-width: 125px;">Father CNIC</th>
                    <th style="min-width: 100px;">Image</th>
                    <th style="min-width: 75px;">Class</th>
                    <th style="min-width: 75px;">Section</th>
                    <th style="min-width: 75px;">Admission Fee</th>
                    <th style="min-width: 75px;">Tuition Fee</th>
                    <th style="min-width: 150px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($students)) {
                    $i = 0;
                    foreach ($students as $row) {
                        $i++;
                        $studentId = $row['student_identification'];
                        $studentName = $row['student_name'];
                        $studentContact = $row['student_contact'];
                        $studentEmail = $row['student_email'];
                        $studentAddress = $row['student_address'];
                        $studentFatherName = $row['student_father_name'];
                        $studentCnic = $row['student_father_cnic'];
                        $studentImage = !empty($row['student_image'])?'<img src="'.base_url().'uploads/students/'.$row['student_image'].'" alt="" width="100" height="75" />':''; 
                        $studentClass = $row['class_name'];
                        $studentSectionName = $row['section_name'];
                        $studentAdmissionFee = $row['student_admission_fee'];
                        $studentTuitionFee = $row['student_tuition_fee'];
                       
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $studentId; ?></td>
                            <td><?php echo $studentName; ?></td>
                            <td><?php echo $studentContact; ?></td>
                            <td><?php echo $studentEmail ?></td>
                            <td><?php echo $studentAddress ?></td>
                            <td><?php echo $studentFatherName ?></td>
                            <td><?php echo $studentCnic ?></td>
                            <td><?php echo $studentImage ?></td>
                            <td><?php echo $studentClass ?></td>
                            <td><?php echo $studentSectionName ?></td>
                            <td><?php echo $studentAdmissionFee ?></td>
                            <td><?php echo $studentTuitionFee ?></td>
                            <td style="display:flex;">
                                <a href="<?php echo base_url('manage_students/edit/' . $row['student_id']); ?>" class="btn btn-warning" style="margin:2px">Edit</a><br>
                                <a href="<?php echo base_url('manage_students/delete/' . $row['student_id']); ?>" class="btn btn-danger" style="margin:2px" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a><br>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No Student(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('templates/footer');?>