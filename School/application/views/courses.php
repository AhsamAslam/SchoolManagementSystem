<?php $this->load->view('templates/header'); ?>
<section class="section gb" style="margin-top:100px;">
    <div class="container">
        <div class="section-title text-center">
            <h3>Courses</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->
        <div class="row">
            <?php if (!empty($courses)) {
                foreach ($courses as $row) {
                    $courseName = $row['course_name'];
                    $courseLevel = $row['course_level'];
                    $coursePublisherName = $row['course_publisher_name'];
                    $courseMedium = $row['course_medium']; ?>

                    <div class="col-md-3" style="padding-top: 25px;">
                        <div class="caro-item">
                            <div class="course-box">
                            <div class="course-details" style="height: 25vh;">
                                    <h4>
                                        <small>Level <?php echo $courseLevel ?></small>
                                        <a title=""><?php echo $courseName ?></a>
                                    </h4>
                                    <p>Publisher: <?php echo $coursePublisherName ?></p>
                                    <p>Medium: <?php echo $courseMedium ?></p>
                                </div><!-- end details -->
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
        <!-- <div class="course-details" style="height: 25vh;"> -->


        <hr class="invis">

        <!-- <div class="section-button text-center">
            <a href="#" class="btn btn-primary">View All Courses</a>
        </div> -->
    </div><!-- end container -->
</section>
<?php $this->load->view('templates/footer'); ?>