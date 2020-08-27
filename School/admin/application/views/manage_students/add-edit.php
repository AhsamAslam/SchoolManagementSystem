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
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter student name" value="<?php echo !empty($student['student_name']) ? $student['student_name'] : ''; ?>" required>
                    <?php echo form_error('name', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Contact:</label>
                    <input type="text" name="contact" class="form-control" placeholder="Enter student contact" data-inputmask="'mask': '0399-9999999'" value="<?php echo !empty($student['student_contact']) ? $student['student_contact'] : ''; ?>" required>
                    <?php echo form_error('student_contact', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter student email" value="<?php echo !empty($student['student_email']) ? $student['student_email'] : ''; ?>" required>
                    <?php echo form_error('student_email', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter student address" value="<?php echo !empty($student['student_address']) ? $student['student_address'] : ''; ?>" required>
                    <?php echo form_error('student_address', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Father Name:</label>
                    <input type="text" name="father_name" class="form-control" placeholder="Enter father name" value="<?php echo !empty($student['student_father_name']) ? $student['student_father_name'] : ''; ?>" required>
                    <?php echo form_error('student_father_name', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Father CNIC:</label>
                    <input type="text" name="father_cnic" class="form-control" data-inputmask="'mask': '99999-9999999-9'" placeholder="Enter Father CNIC" value="<?php echo !empty($student['student_father_cnic']) ? $student['student_father_cnic'] : ''; ?>" required>
                    <?php echo form_error('student_father_cnic', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Images:</label>
                    <input type="file" name="image" value="<?php echo !empty($student['student_image']) ? $student['student_image'] : ''; ?>" class="form-control" accept="image/*" multiple>
                    <?php echo form_error('image', '<p class="help-block text-danger">', '</p>'); ?>
                    <?php if (!empty($student['student_image'])) { ?>
                        <div class="img-box">
                            <img src="<?php echo base_url('uploads/students/' . $student['student_image']); ?>" width="150" height="150">
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label>Class:</label>
                    <select class="browser-default custom-select" name="student_class" required>
                        <option selected disabled value>Select Class</option>
                        <?php if (!empty($classes)) {
                            $i = 0;
                            foreach ($classes as $row) {
                                $i++;
                                if ($student['student_class_id'] == $row["class_id"]) {  ?>
                                    <option value="<?php echo $row["class_id"]; ?>" selected><?php echo $row["class_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["class_id"]; ?>"><?php echo $row["class_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                    </select>
                    <?php echo form_error('student_class', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Section:</label>
                    <select class="browser-default custom-select" name="student_section" required>
                        <option selected disabled value>Select Section</option>
                        <?php if (!empty($sections)) {
                            $i = 0;
                            foreach ($sections as $row) {
                                $i++;
                                if ($student['student_section_id'] == $row["section_id"]) {  ?>
                                    <option value="<?php echo $row["section_id"]; ?>" selected><?php echo $row["section_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["section_id"]; ?>"><?php echo $row["section_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>

                    </select>
                    <?php echo form_error('student_section_id', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Admission Fee:</label>
                    <input type="number" name="admission_fee" class="form-control" placeholder="Enter admission fees" value="<?php echo !empty($student['student_admission_fee']) ? $student['student_admission_fee'] : ''; ?>" required>
                    <?php echo form_error('student_admission_fee', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Tuition Fee:</label>
                    <input type="number" name="tuition_fee" class="form-control" placeholder="Enter tuition fees" value="<?php echo !empty($student['student_tuition_fee']) ? $student['student_tuition_fee'] : ''; ?>" required>
                    <?php echo form_error('student_tuition_fee', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <!-- </div> -->

                <a href="<?php echo base_url('manage_students'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($student['student_id']) ? $student['student_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>