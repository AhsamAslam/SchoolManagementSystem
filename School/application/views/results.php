<style>
 #wrapper > header {
    position: relative;
    background: black;
    padding-top: 20px;
    padding-bottom: 20px;
  }
  #wrapper > header > div.topbar.clearfix{
    display: none;
  }
  #wrapper > div.container2{
    padding: 100px 50px 100px 50px;
  }
</style>
<div class="container2">
  <table id="dt-filter-select" class="table" cellspacing="0" width="100%">
    <thead>
      <tr>
        <td># </td>
        <td>Student </td>
        <td> Class </td>
        <td> Section </td>
        <td> Total Marks </td>
        <td> Obtained Marks </td>
        <td> Percentage </td>
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
        <td><?php echo $i ?> </td>
        <td ><?php echo $resultStudent ?> </td>
        <td> <?php echo $resultClass ?></td>
        <td> <?php echo $resultSection ?> </td>
        <td > <?php echo $resultTotalMarks ?> </td>
        <td> <?php echo $resultObtainedMarks ?> </td>
        <td> <?php echo $resultPercentage ?> </td>
      </tr>
      <?php } ?>
      <?php } ?>


    </tbody>
    <!-- <tfoot>
      <tr>
        <td colspan="4" class="footer">Total</td>
        <td> 15.0 </td>
        <td colspan="2">55.95 </td>
      </tr> -->
      <!-- <tr>
        <td colspan="4" class="footer">GPA</td>
        <td colspan="3">3.73 / 4.0 </td>
      </tr> -->
  </table>
</div>