 function selectedStudentFee(obj) {
     //  console.log(obj)
     let id = $(obj).val();
     let student = studentsJSArray.filter(function(s) {
         return s.student_id == id;
     });
     $("#add_fee_amount").val(student[0].student_tuition_fee);
 }