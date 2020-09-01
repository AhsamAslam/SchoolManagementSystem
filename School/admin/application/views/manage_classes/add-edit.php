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
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter class name" value="<?php echo !empty($class['class_name']) ? $class['class_name'] : ''; ?>" required>
                    <?php echo form_error('name', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" name="description" class="form-control" placeholder="Enter class description" value="<?php echo !empty($class['class_description']) ? $class['class_description'] : ''; ?>" required>
                    <?php echo form_error('class_level', '<p class="help-block text-danger">', '</p>'); ?>
                </div>
                <!-- </div> -->

                <a href="<?php echo base_url('manage_classes'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($class['class_id']) ? $class['class_id'] : ''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer');?>