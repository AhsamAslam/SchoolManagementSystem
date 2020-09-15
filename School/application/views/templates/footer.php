<footer class="section footer noover" style="padding: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="widget clearfix">
                    <h3 class="widget-title">Subscribe Our Newsletter</h3>
                    <div class="newsletter-widget">
                        <p>You can opt out of our newsletters at any time.<br> See our <a href="#">privacy policy</a>.</p>
                        <form class="form-inline" role="search">
                            <div class="form-1">
                                <input type="text" class="form-control" placeholder="Enter email here..">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i></button>
                            </div>
                        </form>
                        <img src="<?php echo base_url(); ?>assets/images/payments.png" alt="" class="img-responsive">
                    </div><!-- end newsletter -->
                </div><!-- end widget -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-4">
                <div class="widget clearfix">
                    <h3 class="widget-title">WORKING HOURS:</h3>
                    <p>Monday-Thursday: 07:00 – 15:30</p>
                    <p>Friday: 07:00 – 12:30</p>
                    <p>Saturday & Sunday: Closed</p>
                    <!-- <a href="#" class="readmore">Became a Teacher</a> -->
                </div><!-- end widget -->
            </div><!-- end col -->



            <div class="col-lg-4 col-md-4">
                <div class="widget clearfix">
                    <h3 class="widget-title">GET IN TOUCH</h3>
                    <div class="list-widget">
                        <ul>
                            <li>Phone: +92 42 000000</li>
                            <li>Fax: +92 0000000000</li>
                            <li>Email: school@school.edu.pk</li>
                            <li>Address:</li>
                            <li>15 Canal Bank Rd, Upper Mall Scheme,Lahore, Pakistan</li>

                        </ul>
                    </div><!-- end list-widget -->
                </div><!-- end widget -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->


<div class="copyrights" style="padding: 15px;">
    <div class="container">
        <div class="clearfix">
            <div class="pull-left">
                <div class="cop-logo">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""></a>
                </div>
            </div>

            <div class="pull-right">
                <div class="footer-links">
                    <ul class="list-inline">
                        <li>©2020 LAS. All rights reserved. Designed and Developed By UnionLogics</li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- end container -->
</div><!-- end copy -->
</div>
<!-- jQuery Files -->

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/animate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<!-- VIDEO BG PLUGINS -->
<script src="<?php echo base_url(); ?>assets/js/videobg.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dt-filter-select').dataTable({

            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select  class="browser-default custom-select form-control-sm"><option value="" selected>Search</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });

        var table = $('#dt-filter-select-result').DataTable({
            paging: false, info: false
        });
    });
</script>


</body>

</html>