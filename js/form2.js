$(document).ready(function() {

              // adding more box through number selected in the calculating of cgpa
            //$(".cgpaBody").on("click", "#cgpa-years", function() {
              $(".cgpa-years").on("change", function() {
                var cgpa = $(this).val();
                $('.addTable').empty();
                var taHead = '<table class="table table-bordered CGPATable" id="cgpaTable"><tr><th>Levels</th><th>First Semester</th><th>Second Semester</th></tr>';
                if(cgpa > 0) {
                  for(i = 1; i <= cgpa; i++) {
                    taHead += '<tr><td class="levelNo">'+i+'00</td><td><input type="text" class="point pint form-control" name="point" required=""></td><td><input type="text" class="point pints form-control" name="point" required=""></td></tr>';
                }
                    taHead += '</table>';
                    $('.addTable').append(taHead);
                }
              });

              // calculating of unit and point
              // $("#cgpaTable").on("click", ".calcCGPA", function() {
                $("#calcCGPA").click(function(e) {
                  e.preventDefault();
                // not necessary
                "use strict";
                // var row = $(this).closest("td");
                // var pint = parseFloat(row.find(".pint").val());
                // var pints = parseFloat(row.find(".pints").val());
                // var total = pint * pints;
                alert('Fuad');
                // row.find(".cgparesult").val(isNaN(total) ? "" : total);
              });

              let clickTable = {
                color: "blue",
                background: "green",
                border: "5px solid blue"
              }
              $(".cgpa").on("click", function() {
                // $('table').css(clickTable);
                // $('.org-table').draggable();
              });
});
