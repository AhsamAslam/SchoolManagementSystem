<script>
var studentsJSArray =  <?php echo json_encode($students); ?>;
</script>
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
                    <select class="browser-default custom-select school_select2" name="fee_student" required onchange='selectedStudentFee(this)'>
                        <option selected disabled value>Select Student</option>
                        <?php if (!empty($students)) {
                            foreach ($students as $row) { ?>                             
                                <option value="<?php echo $row["student_id"]; ?>"><?php echo $row["student_identification"] . " - " . $row["student_name"]; ?></option>
                            <?php } ?>
                        <?php } ?>

                    </select>
                    <?php echo form_error('fee_student_id', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Class:</label>
                    <select class="browser-default custom-select" name="fee_student_class" required>
                        <option selected disabled value>Select Class</option>
                        <?php if (!empty($classes)) {
                            $i = 0;
                            foreach ($classes as $row) {
                                $i++;  ?>
                                <option value="<?php echo $row["class_id"]; ?>"><?php echo $row["class_name"]; ?></option>
                            <?php } ?>
                        <?php } ?>

                    </select>
                    <?php echo form_error('fee_student_class', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Section:</label>
                    <select class="browser-default custom-select" name="fee_student_class_section" required>
                        <option selected disabled value>Select Section</option>
                        <?php if (!empty($sections)) {
                            $i = 0;
                            foreach ($sections as $row) {
                                $i++; ?>
                                <option value="<?php echo $row["section_id"]; ?>"><?php echo $row["section_name"]; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <?php echo form_error('fee_student_class', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Fee Amount:</label>
                    <input type="number" class="browser-default custom-select" name="fee_amount" id="add_fee_amount" required></input>
                    <?php echo form_error('fee_month', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="feeCheck" required>
                    <label class="custom-control-label" for="customCheck">Fees Collected</label>
                </div>
                <div class="form-group">
                    <label>Submit Date:</label>
                    <input type="date" class="browser-default custom-select" name="fee_submit_date" value="<?php echo date('Y-m-d'); ?>" required></input>
                    <?php echo form_error('fee_month', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <!-- <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="feeCheck" required>
                    <label class="custom-control-label" for="customCheck">Fees Collected</label>
                </div> -->
                <!-- <div class="form-group">
                    <label>Description:</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter section description" value="<?php echo !empty($feeSheet['fees_description']) ? $feeSheet['fees_description'] : ''; ?>" required>
                    <?php echo form_error('fees_description', '<p class="help-block text-danger">', '</p>'); ?>
                </div> -->

                <!-- </div> -->

                <a href="<?php echo base_url('manage_fee_sheets'); ?>" class="btn btn-secondary">Back</a>
                <!-- <input type="hidden" name="isSubmitted" value="1"> -->
                <input type="hidden" name="id" value="<?php echo !empty($feeSheet['fees_id']) ? $feeSheet['fees_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>/assets/sidebar/js/manage_fee_sheets.js"></script>