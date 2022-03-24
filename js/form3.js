// selecting number of courses to calculate
    $(".gpa-course").on("change", function() {
        var gpaCourse = $(this).val();
        $('.table').empty();
        var coHead = '<table class="table table-bordered table-striped col-md-12 col-xs-3 col-sm-6" id="table_field"><tr><th>S/N</th><th>Course Code</th><th>Course Score</th><th>Grade</th><th>Course Unit</th><th>GradePoint</th><th>CourseUnit GradePoint</th><th>Add or Remove</th></tr><tr><td class="courseNo">1</td><td><input class="form-control" type="text" name="code" required=""></td><td><input class="form-control score" type="text" name="score" required=""></td><td><input class="form-control grade" type="text" name="grade" required="" readonly></td><td><select name="unit" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point" required="" readonly></td><td><input type="text" class="unitPoint form-control" name="unitpoint" required="" readonly></td><td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td></tr>';
        if(gpaCourse > 0) {
          for(i = 2; i <= gpaCourse; i++) {
            coHead += '<tr><td class="courseNo">'+i+'</td><td><input class="form-control" type="text" name="code" required=""></td><td><input class="form-control score" type="text" name="score" required=""></td><td><input class="form-control grade" type="text" name="grade" required="" readonly></td><td><select name="unit" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point" required="" readonly></td><td><input type="text" class="unitPoint form-control" name="unitpoint" required="" readonly></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';
        }
  
              // add more input fields
              $("#add").click(function() {
                $('#table_field').append('<tr><td class="courseNo">'+i+'</td><td><input class="form-control" type="text" name="code" required=""></td><td><input class="form-control score" type="text" name="score" required=""></td><td><input class="form-control grade" type="text" name="grade" required="" readonly></td><td><select name="unit" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point" required="" readonly></td><td><input type="text" class="unitPoint form-control" name="unitpoint" required="" readonly></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>');
                // i++;
            });
  
            //remove input fields
            $("#table_field").on('click', '#remove', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });
  
            coHead += '</table>';
            $('.org-table').append(coHead);
        }
      });
      