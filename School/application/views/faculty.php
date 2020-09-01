<?php $this->load->view('templates/header'); ?>
<style>
    #wrapper>section.parallax.event-section {
        /* background: 50% -20px gray; */
        background-image: url('<?php echo base_url(); ?>/assets/images/Faculty2.jpg');
        background-repeat: no-repeat;
        background-size: contain;
    }
    #wrapper > section.section.gb.nopadtop > div > div > div:nth-child(1) > div > img{
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>


<section class="parallax event-section" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message event-title text-center">
                    <!-- <h3 style="color:#0ab1e8;">Meet Our Faculty</h3> -->
                    <!-- <p>21 - 26 Aug, 2018, San Francisco, CA - Limited number of guests</p> -->
                    <!-- <a href="#" class="btn btn-primary">GET TICKETS</a> -->
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end section -->


<section class="section">
    <div class="container">
        <div class="section-title text-center">
            <h3>Meet Our Teachers</h3>
            <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
        </div><!-- end title -->
        <div class="row text-center">

        <?php if (!empty($teachers)) {
                    $i = 0;
                    foreach ($teachers as $row) {
                        $i++;
                        $teacherName = $row['teacher_name'];
                        $teacherContact = $row['teacher_contact'];
                        $teacherEmail = $row['teacher_email'];
                        $teacherAddress = $row['teacher_address'];
                        $teacherImage = !empty($row['teacher_image'])?'<img src="'.base_url().'admin/uploads/teachers/'.$row['teacher_image'].'" alt="" style="height:300px;" class="img-responsive" />':''; 
                       
                ?>

            <div class="col-md-4 col-sm-6" style="padding-top: 50px;">
                <div class="teammembers">
                    <!-- <div class="entry"> -->
                    <div class="">
                        <?php echo $teacherImage ?>
                        <div class="magnifier">
                            <div class="visible-buttons1 teambuttons">
                                <p>We’re committed to work and play our client meeting room transforms into a table tennis</p>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-skype"></i></a>
                                </div><!-- end social -->
                            </div>
                        </div>
                    </div><!-- end box -->
                    <div class="teamdesc">
                        <h4><?php echo $teacherName ?></h4>
                        <a href="mailto:<?php echo $teacherEmail ?>"><?php echo $teacherEmail ?></a>
                        <p>Address:  <?php echo $teacherAddress ?></p>
                    </div><!-- end teamdesc -->
                </div><!-- end teammembers -->
            </div><!-- end col -->
            
            <?php } ?>
            <?php } ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<?php $this->load->view('templates/footer'); ?>