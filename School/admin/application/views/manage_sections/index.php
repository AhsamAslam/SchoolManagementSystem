<?php $this->load->view('templates/header');?>
<div class="container">
    <h2>Sections Management</h2>

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
                <a href="<?php echo base_url('Manage_Sections/add'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Add a Section</a>
            </div>
        </div>

        <!-- Data list table -->
        <table id="table_id" class="table table-striped table-bordered" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 50px;">#</th>
                    <th style="min-width: 200px;">Name</th>
                    <th style="min-width: 150px;">Description</th>
                    <th style="min-width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sections)) {
                    $i = 0;
                    foreach ($sections as $row) {
                        $i++;
                        $sectionName = $row['section_name'];
                        $sectionDescription = $row['section_description'];
                       
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $sectionName; ?></td>
                            <td><?php echo $sectionDescription; ?></td>
                            <td style="display:flex;">
                                <a href="<?php echo base_url('manage_sections/edit/' . $row['section_id']); ?>" class="btn btn-warning" style="margin:2px">Edit</a><br>
                                <a href="<?php echo base_url('manage_sections/delete/' . $row['section_id']); ?>" class="btn btn-danger" style="margin:2px" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a><br>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No Section(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('templates/footer');?>