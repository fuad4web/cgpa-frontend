$(document).ready(function() {

    // addingg more input box using the Add button
    /*
            var input = '<tr><td><input class="form-control" type="text" name="code" required=""></td><td><input class="form-control score" type="text" name="score" required=""></td><td><input class="form-control grade" type="text" name="grade" required="" readonly></td><td><select name="unit" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point" required="" readonly></td><td><input type="text" class="unitPoint form-control" name="unitpoint" required="" readonly></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';
            */

            var input = '<tr><td class="courseNo"></td><td><input class="form-control" type="text" name="code[]" required=""></td><td><input class="form-control score" type="text" name="score[]" required=""></td><td><input class="form-control grade" type="text" name="grade[]" required="" readonly></td><td><select name="unit[]" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point[]" required="" readonly></td><td><input type="text" class="unitPoint form-control" name="unitpoint[]" required="" readonly></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';

            var max = 12;
            var x =1;
 
             // add more input fields
             $("#add").click(function() {
                 if(x <= max) {
                    $('#table_field').append(input);
                    x++;
                 }
             });
 
             //remove input fields
             $("#table_field").on('click', '#remove', function(e) {
                 e.preventDefault();
                 $(this).closest('tr').remove();
                 x--;
             });

      // changing from register form to login page
      $(`.message a`).click(function(){
        $(`form`).animate({height: "toggle", opacity:"toggle"}, "slow");
    });

      // clear all button
      $("#table_field").on("click", "#clear", function() {
        //$('.insert-form')[0].reset();
        alert('Why are you not working naa!!!');
      });

      // reset cgpa form
      $("#cgpaTable").on('click', '#CGPAreset', function() {
        $('.cgpaForm').reset();
      });


      // calculating of unit and point
      $("#table_field").on("click, change", "#unit", function() {
        // not necessary
        "use strict";
        var row = $(this).closest("tr");
        var unit = parseFloat(row.find(".unit option:selected").val());
        var point = parseFloat(row.find(".point").val());
        var total = unit * point;
        row.find(".unitPoint").val(isNaN(total) ? "" : total);
      });


      // inputing course point automatically after inputing course score
      $("#table_field").on("change, paste, keyup", ".score", function() {
        // not necessary
        "use strict";
        var row = $(this).closest("tr");
        var score = parseFloat(row.find(".score").val());
      //  var pointScore = score;
        if((score >= 75) && (score <= 100)) {
          row.find(".point").val(isNaN(score) ? "" : 4.00);
        } else if((score >= 70) && (score <= 74)) {
          row.find(".point").val(isNaN(score) ? "" : 3.50);
        } else if((score >= 65) && (score <= 69)) {
          row.find(".point").val(isNaN(score) ? "" : 3.25);
        } else if((score >= 60) && (score <= 64)) {
          row.find(".point").val(isNaN(score) ? "" : 3.00);
        } else if((score >= 55) && (score <= 59)) {
          row.find(".point").val(isNaN(score) ? "" : 2.75);
        } else if((score >= 50) && (score <= 54)) {
          row.find(".point").val(isNaN(score) ? "" : 2.50);
        } else if((score >= 45) && (score <= 49)) {
          row.find(".point").val(isNaN(score) ? "" : 2.25);
        } else if((score >= 40) && (score <= 44)) {
          row.find(".point").val(isNaN(score) ? "" : 2.00);
        } else {
          row.find(".point").val(isNaN(score) ? "" : 0.00);
        };
      });


      // inputing grade automatically after inputing course score
      $("#table_field").on("change, paste, keyup", ".score", function() {
        // not necessary
        "use strict";
        var row = $(this).closest("tr");
        var score = parseFloat(row.find(".score").val());
      //  var pointScore = score;
        if((score >= 75) && (score <= 100)) {
          row.find(".grade").val("A");
        } else if((score >= 70) && (score <= 74)) {
          row.find(".grade").val("AB");
        } else if((score >= 65) && (score <= 69)) {
          row.find(".grade").val("B");
        } else if((score >= 60) && (score <= 64)) {
          row.find(".grade").val("BC");
        } else if((score >= 55) && (score <= 59)) {
          row.find(".grade").val("C");
        } else if((score >= 50) && (score <= 54)) {
          row.find(".grade").val("CD");
        } else if((score >= 45) && (score <= 49)) {
          row.find(".grade").val("D");
        } else if((score >= 40) && (score <= 44)) {
          row.find(".grade").val("E");
        } else {
          row.find(".grade").val("F");
        };
      });


        // calculating of total unit
      $("#calcCUGP").click(function(e) {
        e.preventDefault();
        // not necessary
        "use strict";
        var row = $(this).closest("tr");
        var sum = 0;
        $('select.unit').each(function(){
          var unit = parseFloat($(this).children("option:selected").val());
          //$(this).children("option:selected").val();
          sum += unit;
        });


        //calculating of a single semester cgpa
        var sumPoint = 0;
        $('.unitPoint').each(function(){
          var unitPoint = parseFloat($(this).val());
          sumPoint += unitPoint;
        });
        $answer = sumPoint/sum;
        //var juig = $answer.substring(0, 3)
        $(".gpascore").val($answer.toFixed(2));
        if($(".gpascore").val($answer)) {
          $("#savegpa").removeAttr("disabled");
        }
        //$(".gpascore").val(Math.round(sumPoint/sum, 2)).toFixed(2);
  });

});



/*

copied from google(stack overflow) on calculating total unit
$(document).on("change", "qty1", function() {
  var sum = 0;
  $("input[class *= 'qty1']").each(function(){
      sum += +$(this).val();
  });
  $(".total").val(sum);
});


/*

$('.gpascore').change(function(){
    if($(this).val().length !=0){
        $('#savegpa').attr('disabled', false);
    }
    else
    {
        $('#savegpa').attr('disabled', true);        
    }
});


 // the click event is in the html code
 function calcUnitpoint() {
   const unit = document.querySelector('.unit').value;
   const point = document.querySelector('.point').value;
   document.querySelector(`.unitPoint`).value = unit*point;
 }
 */
