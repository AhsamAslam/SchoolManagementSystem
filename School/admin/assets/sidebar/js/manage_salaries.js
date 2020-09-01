 function selectedTeacherSalary(obj) {
     console.log(obj)
     let id = $(obj).val();
     let teacher = teachersJSArray.filter(function(t) {
         return t.teacher_id == id;
     });
     $("#add_salary_amount").val(teacher[0].teacher_salary);
 }