<div class="container">
    <h1><?php echo $title; ?></h1>
    <hr>

    <!-- Display status message -->
    <?php if (!empty($error_msg)) { ?>
        <div class="col-xs-12">
            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-6">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Student:</label>
                    <select class="browser-default custom-select" name="fee_student" required>
                        <option selected disabled value>Select Student</option>
                        <?php if (!empty($students)) {
                            $i = 0;
                            foreach ($students as $row) {
                                $i++;
                                if ($feeSheet['fees_student_id'] == $row["student_id"]) {  ?>
                                    <option value="<?php echo $row["student_id"]; ?>" selected><?php echo $row["student_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["student_id"]; ?>"><?php echo $row["student_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                    </select>
                    <?php echo form_error('fee_student_id', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Month:</label>
                    <select class="browser-default custom-select" name="fee_month" required>
                        <option selected disabled value>Select Month</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                    <?php echo form_error('fee_month', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Year:</label>
                    <select id="year" class="browser-default custom-select" name="fee_year" required>></select>
                    <?php echo form_error('fee_month', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Submit Date:</label>
                    <input type="date" class="browser-default custom-select" name="fee_submit_date" required></input>
                    <?php echo form_error('fee_month', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" name="fee_amount" class="form-control" placeholder="Enter amount" value="<?php echo !empty($feeSheet['fees_name']) ? $feeSheet['fees_name'] : ''; ?>" required>
                    <?php echo form_error('fee_amount', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <!-- <div class="form-group">
                    <label>Description:</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter section description" value="<?php echo !empty($feeSheet['fees_description']) ? $feeSheet['fees_description'] : ''; ?>" required>
                    <?php echo form_error('fees_description', '<p class="help-block text-danger">', '</p>'); ?>
                </div> -->

                <!-- </div> -->

                <a href="<?php echo base_url('manage_fee_sheets'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="isSubmitted" value="1">
                <input type="hidden" name="id" value="<?php echo !empty($feeSheet['fees_id']) ? $feeSheet['fees_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>