<div class="container">
    <h1><?php echo $title; ?></h1>
    <hr>
    
    <!-- Display status message -->
    <?php if(!empty($error_msg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
    </div>
    <?php } ?>
    
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label>Teacher Identification:</label>
                <input type="text" name="teacherId" class="form-control" placeholder="Enter teacher Id" value="<?php echo !empty($teacher['teacher_identification']) ? $teacher['teacher_identification'] : ''; ?>" >
                <?php echo form_error('check_teacherIdentification', '<p class="help-block text-danger">', '</p>'); ?>
            </div>
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter teacher name" value="<?php echo !empty($teacher['teacher_name'])?$teacher['teacher_name']:''; ?>" required >
                    <?php echo form_error('name','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Contact:</label>
                    <input type="text" name="contact" class="form-control" placeholder="Enter teacher contact" data-inputmask="'mask': '0399-9999999'" value="<?php echo !empty($teacher['teacher_contact'])?$teacher['teacher_contact']:''; ?>" required>
                    <?php echo form_error('teacher_contact','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter teacher email" value="<?php echo !empty($teacher['teacher_email'])?$teacher['teacher_email']:''; ?>" required>
                    <?php echo form_error('teacher_email','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter teacher address" value="<?php echo !empty($teacher['teacher_address'])?$teacher['teacher_address']:''; ?>" required>
                    <?php echo form_error('teacher_address','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Salary:</label>
                    <input type="number" name="salary" class="form-control" placeholder="Enter teacher salary" value="<?php echo !empty($teacher['teacher_salary'])?$teacher['teacher_salary']:''; ?>" required>
                    <?php echo form_error('teacher_salary','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Teacher CNIC:</label>
                    <input type="text" name="teacher_cnic" class="form-control" data-inputmask="'mask': '99999-9999999-9'"  placeholder="Enter Teacher CNIC" value="<?php echo !empty($teacher['teacher_cnic'])?$teacher['teacher_cnic']:''; ?>" required>
                    <?php echo form_error('teacher_cnic','<p class="help-block text-danger">','</p>'); ?>
                </div>
                <div class="form-group">
                    <label>Images:</label>
                    <input type="file" name="image" value="<?php echo !empty($teacher['teacher_image'])?$teacher['teacher_image']:''; ?>" class="form-control" accept="image/*" multiple>
                    <?php echo form_error('image','<p class="help-block text-danger">','</p>'); ?>
                    <?php if(!empty($teacher['teacher_image'])){ ?>
                        <div class="img-box">
                            <img src="<?php echo base_url('uploads/teachers/'.$teacher['teacher_image']); ?>" width="150" height="150">
                        </div>
                    <?php } ?>
                </div>
                <!-- </div> -->
                
                <a href="<?php echo base_url('manage_teachers'); ?>" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id"  value="<?php echo !empty($teacher['teacher_id'])?$teacher['teacher_id']:''; ?>">
                <input type="submit" name="Submit" class="btn btn-success" value="SUBMIT">
            </form>
        </div>
    </div>
</div>