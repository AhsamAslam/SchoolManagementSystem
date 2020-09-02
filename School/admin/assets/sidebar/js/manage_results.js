$(function() {
    // var set_number = function() {
    //     var table_len = $('#data_table tbody tr').length + 1;
    //     $('#no').val(table_len);
    // }

    // set_number();

    $('#addCourse').click(function() {
        var courseId = $('#courseName option:selected').val();
        var courseName = $('#courseName option:selected').text();
        var obtainedMarks = $('#obtainedMarks').val();
        var totalMarks = $('#totalMarks').val();

        $('#data_table tbody:last-child').append(
            '<tr>' +
            '<input id="prodId" name="prodId" type="hidden" value=' + courseId + '>' +
            '<td>' + courseName + '</td>' +
            '<td>' + obtainedMarks + '</td>' +
            '<td>' + totalMarks + '</td>' +
            '<td class="text-center"><button type="button" class="btn btn-danger btn-sm btn-delete-address" onclick = "DeleteRow(this)"><i class="fa fa-trash-o"></i></button></td>' +
            '</tr>'
        );

        $('#courseId').val('');
        $('#courseName').val('');
        $('#obtainedMarks').val('');
        $('#totalMarks').val('');

    });

    $('#submit').click(function() {

        var table_data = [];
        $('#tableBody > tr').each(function(row, tr) {
            var sub = {
                'id': $(tr).find('input[name=prodId]').val(),
                'courseName': $(tr).find('td:eq(1)').text(),
                'obtainedMarks': $(tr).find('td:eq(2)').text(),
                'totalMarks': $(tr).find('td:eq(3)').text()
            };
            table_data.push(sub);
        });

        var tableStr = JSON.stringify(table_data);
        $('#jsArray').val(tableStr);
        // $.ajax({
        //     url: 'index',
        //     type: 'post',
        //     data: { user: tableStr },
        //     success: function(response) {
        //         location.href = "http://localhost/SchoolManagementSystem/School/admin/Manage_Results"
        //     }
        // });
    });

});

function DeleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("data_table").deleteRow(i);
}

function selectedStudentResult(obj) {
    // console.log(obj)
    let id = $(obj).val();
    let student = studentsJSArray.filter(function(s) {
        return s.student_id == id;
    });
    $("#studentClass").val(student[0].class_id);
    $("#studentSection").val(student[0].section_id);
    // console.log(student[0].student_id)
    // console.log(student[0].section_id)
    // console.log(student[0].class_id)
    // section_id
    // class_id
}