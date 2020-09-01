<?php $this->load->view('templates/header');?>
<div class="container">
    <h2>Results Management</h2>

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
                <a href="<?php echo base_url('Manage_Results/add'); ?>" class="btn btn-success" style="margin-bottom: 2px;"><i class="plus"></i> Add a Result</a>
            </div>
        </div>

        <!-- Data list table -->
        <table id="table_id" class="table table-striped table-bordered" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th style="min-width: 50px;">#</th>
                    <th style="min-width: 200px;">Student Name</th>
                    <th style="min-width: 150px;">Class</th>
                    <th style="min-width: 150px;">Section</th>
                    <th style="min-width: 100px;">Total Marks</th>
                    <th style="min-width: 150px;">Obtained Marks</th>
                    <th style="min-width: 100px;">Percentage</th>
                    <th style="min-width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($results)) {
                    $i = 0;
                    foreach ($results as $row) {
                        $i++;
                        $resultStudent = $row['student_name'];
                        $resultClass = $row['class_name'];
                        $resultSection = $row['section_name'];
                        $resultTotalMarks = $row['result_total_marks'];
                        $resultObtainedMarks = $row['result_obtained_marks'];
                        $Percentage = $row['result_obtained_marks']/$row['result_total_marks']*100;
                        $resultPercentage = number_format((float)$Percentage, 2, '.', '');
                       
                ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $resultStudent; ?></td>
                            <td><?php echo $resultClass; ?></td>
                            <td><?php echo $resultSection ?></td>
                            <td><?php echo $resultTotalMarks ?></td>
                            <td><?php echo $resultObtainedMarks ?></td>
                            <td><?php echo $resultPercentage ?></td>
                            <td style="display:flex;">
                                <a href="<?php echo base_url('manage_results/edit/' . $row['result_id']); ?>" class="btn btn-warning" style="margin:2px">Edit</a><br>
                                <a href="<?php echo base_url('manage_results/delete/' . $row['result_id']); ?>" class="btn btn-danger" style="margin:2px" onclick="return confirm('Are you sure to delete data?')?true:false;">Delete</a><br>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">No Result(s) found...</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->load->view('templates/footer');?>