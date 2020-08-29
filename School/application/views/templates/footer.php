</div>
<!-- jQuery Files -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/carousel.js"></script>
<script src="assets/js/animate.js"></script>
<script src="assets/js/custom.js"></script>
<!-- VIDEO BG PLUGINS -->
<script src="assets/js/videobg.js"></script>
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
    });
</script>


</body>

</html>