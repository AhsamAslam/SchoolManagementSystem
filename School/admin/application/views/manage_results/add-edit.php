<?php $this->load->view('templates/header');?>
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
                    <select class="browser-default custom-select" name="result_student" required>
                        <option selected disabled value>Select Student</option>
                        <?php if (!empty($students)) {
                            $i = 0;
                            foreach ($students as $row) {
                                $i++;
                                if ($result['result_student_id'] == $row["student_id"]) {  ?>
                                    <option value="<?php echo $row["student_id"]; ?>" selected><?php echo $row["student_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["student_id"]; ?>"><?php echo $row["student_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <?php echo form_error('result_student_id', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Class:</label>
                    <select class="browser-default custom-select" name="result_student_class" required>
                        <option selected disabled value>Select Class</option>
                        <?php if (!empty($classes)) {
                            $i = 0;
                            foreach ($classes as $row) {
                                $i++;
                                if ($result['result_student_class_id'] == $row["class_id"]) {  ?>
                                    <option value="<?php echo $row["class_id"]; ?>" selected><?php echo $row["class_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["class_id"]; ?>"><?php echo $row["class_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <?php echo form_error('result_student_class', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Section:</label>
                    <select class="browser-default custom-select" name="result_student_class_section" required>
                        <option selected disabled value>Select Section</option>
                        <?php if (!empty($sections)) {
                            $i = 0;
                            foreach ($sections as $row) {
                                $i++;
                                if ($result['result_student_class_section_id'] == $row["section_id"]) {  ?>
                                    <option value="<?php echo $row["section_id"]; ?>" selected><?php echo $row["section_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["section_id"]; ?>"><?php echo $row["section_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <?php echo form_error('result_student_class_section', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Total Marks:</label>
                    <input type="number" name="total_marks" step="0.01" class="form-control" placeholder="Enter total marks" value="<?php echo !empty($result['result_total_marks']) ? $result['result_total_marks'] : ''; ?>" required>
                    <?php echo form_error('total_marks', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Obtained Marks:</label>
                    <input type="number" name="obtained_marks" step="0.01" class="form-control" placeholder="Enter obtained marks" value="<?php echo !empty($result['result_obtained_marks']) ? $result['result_obtained_marks'] : ''; ?>" required>
                    <?php echo form_error('obtained_marks', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <!-- </div> -->

                <a href="<?php echo base_url('manage_results'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($course['result_id']) ? $course['result_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer');?>
