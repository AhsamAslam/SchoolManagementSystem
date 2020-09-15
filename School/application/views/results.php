<?php $this->load->view('templates/header'); ?>
<style>
  #wrapper>div.container2 {
    height: 100vh;
    padding: 100px 50px 100px 50px;
  }
</style>
<div class="container2">
  <div class="jumbotron ">
    <div class="container">
      <?php if (!empty($results)) {
        $i = 0;
        foreach ($results as $row) {
          $i++;
          $resultStudent = $row['student_name'];
          $resultClass = $row['class_name'];
          $resultSection = $row['section_name'];
          $resultStudentId = $row['student_identification'];
      ?>
          <h1 class="display-4"><?php echo $resultStudent; ?></h1>
          <p class="lead"> Student id : <?php echo $resultStudentId; ?></p>
          <p class="lead"> Class : <?php echo $resultClass; ?></p>
          <p class="lead"> Section : <?php echo $resultSection; ?></p>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
  <table id="dt-filter-select-result" class="table" cellspacing="0" width="100%">
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
          if (!empty($resultTotalMarks) && !empty($resultObtainedMarks)) {
            $Percentage = $row['result_obtained_marks'] / $row['result_total_marks'] * 100;
          } else {
            $Percentage = "";
          }
          $resultPercentage = number_format((float)$Percentage, 2, '.', '');

      ?>
          <tr>
            <td><?php echo $i ?> </td>
            <td><?php echo $resultStudent ?> </td>
            <td> <?php echo $resultClass ?></td>
            <td> <?php echo $resultSection ?> </td>
            <td> <?php echo $resultTotalMarks ?> </td>
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
<?php $this->load->view('templates/footer'); ?>