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
                    <label>Teacher:</label>
                    <select class="browser-default custom-select" name="salary_teacher" required disabled>
                        <option selected disabled value>Select Teacher</option>
                        <?php if (!empty($teachers)) {
                            $i = 0;
                            foreach ($teachers as $row) {
                                $i++;
                                if ($salary['salary_teacher_id'] == $row["teacher_id"]) {  ?>
                                    <option value="<?php echo $row["teacher_id"]; ?>" selected><?php echo $row["teacher_name"]; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row["teacher_id"]; ?>"><?php echo $row["teacher_name"]; ?></option>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    <?php echo form_error('salary_teacher', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Date:</label>
                    <input type="date" class="browser-default custom-select" name="salary_paid_date" value="<?php echo date('Y-m-d'); ?>" required></input>
                    <?php echo form_error('salary_paid_date', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="salaryCheck" required>
                    <label class="custom-control-label" for="customCheck">Salary Paid</label>
                </div>

                <a href="<?php echo base_url('manage_salaries'); ?>" class="btn btn-secondary">Back</a>
                <!-- <input type="hidden" name="isSubmitted" value="1"> -->
                <input type="hidden" name="id" value="<?php echo !empty($salary['salary_id']) ? $salary['salary_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>