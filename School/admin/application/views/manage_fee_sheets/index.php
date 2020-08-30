<?php $this->load->view('templates/header');?>
<div class="container">
    <h2>Fees Management</h2>

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
                <a href="<?php echo base_url('Manage_Fee_Sheets/showStudents'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Show Student</a>
                <a href="<?php echo base_url('Manage_Fee_Sheets/add'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Add Student</a>
            </div>
        </div>

        <!-- Data list table -->
        <table id="table_id" class="table table-striped table-bordered" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 50px;">#</th>
                    <th style="min-width: 200px;">Student</th>
                    <th style="min-width: 150px;">Class</th>
                    <th style="min-width: 150px;">Section</th>
                    <th style="min-width: 150px;">Fee</th>
                    <th style="min-width: 150px;">Date</th>
                    <th style="min-width: 150px;">Status</th>
                    <th style="min-width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($fee_sheets)) {
                    $i = 0;
                    // echo "<pre>"; print_r($fee_sheets); exit();
                    foreach ($fee_sheets as $row) {
                        $i++;

                        $feeSheetStudent = $row['student_name'];
                        $feeStudentClass = $row['class_name'];
                        $feeStudentSection = $row['section_name'];


                        $feeSheetSubmittedAmount = $row['fees_submitted_amount'];
                        $feeSheetSubmittedDate = $row['fees_submitted_date'];
                        $feeIsSubmitted = $row['fees_is_submitted'];

                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $feeSheetStudent; ?></td>
                            <td><?php echo $feeStudentClass; ?></td>
                            <td><?php echo $feeStudentSection; ?></td>
                            <td><?php echo $feeSheetSubmittedAmount; ?></td>
                            <td><?php echo $feeSheetSubmittedDate; ?></td>
                            <td><span class="badge <?php echo ($feeIsSubmitted == 1) ? 'badge-success' : 'badge-danger'; ?>"><?php echo ($feeIsSubmitted == 1) ? 'Submitted' : 'Not-Submitted'; ?></span></a></td>
                            <td style="display:flex;">
                                <a href="<?php echo base_url('manage_fee_sheets/edit/' . $row['fees_id']); ?>" class="btn btn-warning" style="margin:2px">Edit</a><br>
                                <a href="<?php echo base_url('manage_fee_sheets/delete/' . $row['fees_id']); ?>" class="btn btn-danger" style="margin:2px" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a><br>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No Fee(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('templates/footer');?>