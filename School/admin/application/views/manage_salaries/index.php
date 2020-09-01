<?php $this->load->view('templates/header');?>
<div class="container">
    <h2>Salary Management</h2>

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
                <a href="<?php echo base_url('Manage_Salaries/showTeachers'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Show Teacher</a>
                <a href="<?php echo base_url('Manage_Salaries/add'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Add Teacher</a>
            </div>
        </div>

        <!-- Data list table -->
        <table id="table_id" class="table table-striped table-bordered" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 50px;">#</th>
                    <th style="min-width: 200px;">Teacher</th>
                    <th style="min-width: 150px;">Salary</th>
                    <th style="min-width: 150px;">Date</th>
                    <th style="min-width: 150px;">Status</th>
                    <th style="min-width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($salaries)) {
                    $i = 0;
                    // echo "<pre>"; print_r($salaries); exit();
                    foreach ($salaries as $row) {
                        $i++;
                        $salaryTeacher = $row['teacher_name'];
                        $salaryPaidAmount = $row['salary_teacher_amount'];
                        $salaryPaidDate = $row['salary_paid_date'];
                        $salaryIsPaid = $row['salary_is_paid'];
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $salaryTeacher; ?></td>
                            <td><?php echo $salaryPaidAmount; ?></td>
                            <td><?php echo $salaryPaidDate; ?></td>
                            <td><span class="badge <?php echo ($salaryIsPaid == 1) ? 'badge-success' : 'badge-danger'; ?>"><?php echo ($salaryIsPaid == 1) ? 'Paid' : 'Un-Paid'; ?></span></a></td>
                            <td style="display:flex;">
                                <a href="<?php echo base_url('manage_salaries/edit/' . $row['salary_id']); ?>" class="btn btn-warning" style="margin:2px">Edit</a><br>
                                <a href="<?php echo base_url('manage_salaries/delete/' . $row['salary_id']); ?>" class="btn btn-danger" style="margin:2px" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a><br>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No Salary(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('templates/footer');?>