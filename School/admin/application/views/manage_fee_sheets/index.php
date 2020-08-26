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
                    <th style="min-width: 150px;">Date</th>
                    <th style="min-width: 150px;">Status</th>
                    <th style="min-width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($fee_sheets)) {
                    $i = 0;
                    foreach ($fee_sheets as $row) {
                        $i++;
                        $feeSheetStudent = $row['fees_student_id'];
                        // $feeSheetMonth = $row['fees_month'];
                        // $feeSheetYear = $row['fees_year'];
                        $feeSheetSumittedDate = $row['fees_submitted_date'];
                       
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $feeSheetStudent; ?></td>
                            <!-- <td><?php echo $feeSheetMonth; ?></td> -->
                            <!-- <td><?php echo $feeSheetYear; ?></td> -->
                            <td><?php echo $feeSheetSumittedDate; ?></td>
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