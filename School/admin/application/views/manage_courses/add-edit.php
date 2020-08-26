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
                    <input type="text" name="name" class="form-control" placeholder="Enter course name" value="<?php echo !empty($course['course_name']) ? $course['course_name'] : ''; ?>" required>
                    <?php echo form_error('name', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Level:</label>
                    <input type="number" name="level" class="form-control" placeholder="Enter course level" value="<?php echo !empty($course['course_level']) ? $course['course_level'] : ''; ?>" required>
                    <?php echo form_error('course_level', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Publisher Name:</label>
                    <input type="text" name="publisher" class="form-control" placeholder="Enter publisher name" value="<?php echo !empty($course['course_publisher_name']) ? $course['course_publisher_name'] : ''; ?>" required>
                    <?php echo form_error('course_publisher_name', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Medium:</label>
                    <select class="browser-default custom-select" name="medium">
                        <?php if(!empty($course['course_medium'])){ ?>
                            <option selected disabled><?php echo $course['course_medium'];?></option>
                        <?php } else{ ?>
                        <option selected disabled value>Select medium</option>
                        <?php } ?>
                        <option>English</option>
                        <option>Urdu</option>
                    </select>

                    <!-- <input type="text" name="medium" class="form-control" placeholder="Enter medium" value="<?php echo !empty($course['course_medium']) ? $course['course_medium'] : ''; ?>" required> -->
                    <?php echo form_error('course_medium', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <!-- </div> -->

                <a href="<?php echo base_url('manage_courses'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($course['course_id']) ? $course['course_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>