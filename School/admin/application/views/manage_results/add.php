<?php $this->load->view('templates/header'); ?>
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
        <div class="col-md-12">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Student:</label>
                            <select class="browser-default custom-select school_select2" name="result_student" required>
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
                    </div>
                    <div class="col-md-4">
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
                    </div>
                    <div class="col-md-4">
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
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Course:</label>
                                    <select class="browser-default custom-select school_select2" id="courseName" name="result_student_class_section" >
                                        <option selected disabled value>Select Course</option>
                                        <?php if (!empty($courses)) {
                                            $i = 0;
                                            foreach ($courses as $row) {
                                                $i++; ?>
                                                    <option value="<?php echo $row["course_id"]; ?>"><?php echo $row["course_name"]; ?></option>
                                                
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?php echo form_error('result_student_class_section', '<p class="help-block text-danger">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Obtained Marks:</label>
                                    <input type="number" name="total_marks" id="obtainedMarks" class="form-control" placeholder="Enter obtained marks" value="<?php echo !empty($result['result_total_marks']) ? $result['result_total_marks'] : ''; ?>" >
                                    <?php echo form_error('result_student_class_section', '<p class="help-block text-danger">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Total Marks:</label>
                                    <input type="number" name="total_marks" class="form-control" id="totalMarks" placeholder="Enter total marks" value="<?php echo !empty($result['result_total_marks']) ? $result['result_total_marks'] : ''; ?>" >
                                    <?php echo form_error('result_student_class_section', '<p class="help-block text-danger">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Add course:</label><br>
                                    <input type="button" class="btn btn-primary" id="addCourse" class="btn btn-success" value="Add">
                                    <input type="button" class="btn btn-primary" id="save" class="btn btn-success" value="Save">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col-md-12">
                        <div class="panel-heading"> Courses Data </div>
                        <div class="panel-body">
                            <table class="table table-hover table-striped table-bordered" id="data_table">
                                <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Obtained Marks</th>
                                        <th>Total Marks</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Date:</label>
                            <input type="date" class="browser-default custom-select" name="result_date" value="<?php echo date('Y-m-d'); ?>" required></input>
                            <?php echo form_error('result_date', '<p class="help-block text-danger">', '</p>'); ?>
                        </div>
                    </div>
                </div>
                <!-- </div> -->

                <a href="<?php echo base_url('manage_results'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($course['result_id']) ? $course['result_id'] : ''; ?>">
                <input type="hidden" id="jsArray" name="jsArray[]" value="">
                <input type="submit" id="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script src="<?php echo base_url(); ?>/assets/sidebar/js/manage_results.js"></script>