 </div>
 </div>

 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
 <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>
     $(document).ready(function() {
         $('#table_id').DataTable();
         $(".school_select2").select2({
             theme: "classic"
         });
     });
 </script>
 <script>
     $(":input").inputmask();
 </script>
 <!-- <script>
     var start = 2015;
     var end = new Date().getFullYear();
     var options = "";
     for (var year = start; year <= end; year++) {
         if (year == end) {
             options += "<option selected>" + year + "</option>";

         } else {
             options += "<option>" + year + "</option>";
         }
     }
     document.getElementById("year").innerHTML = options;
 </script> -->
 </body>

 </html>