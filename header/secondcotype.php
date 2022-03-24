<?php
    // include 'core/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate CGPA</title>
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> 
    <!-- Bootsrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="file:///C:/xampp/htdocs/shopcart/CGPA/gpform/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="file:///C:/xampp/htdocs/shopcart/CGPA/gpform/js/jquery-3.6.0.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <script type="text/javascript">
        $(document).ready(function() {

            // changing of Greetings through time
            var thehours = new Date().getHours();
            var themessage;
            var morning = ('<h3>Good morning, It\'s Breakfast Time</h3>');
            var afternoon = ('<h3>Good afternoon, It\'s Lunch Time</h3>');
            var evening = ('<h3>Good evening, It\'s Dinner Time</h3>');
            var judgementDay =('</h3>Judgement Day</h3>');

            if (thehours >= 0 && thehours < 12) {
                themessage = morning; 

            } else if (thehours >= 12 && thehours < 17) {
                themessage = afternoon;

            } else if (thehours >= 17 && thehours < 24) {
                themessage = evening;
            } else {
                themessage = judgementDay;
            }

            $('.greeting').append(themessage);

 
            var input = '<tr><td><input class="form-control" type="text" name="code" required=""></td><td><input class="form-control score" type="text" name="score" required=""></td><td><input class="form-control grade" type="text" name="grade" required="" disabled></td><td><select name="unit" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point" required="" disabled></td><td><input type="text" class="unitPoint form-control" name="unitpoint" required="" disabled></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';


            var x = 1;
            // add more input fields
            $("#add").click(function() {
                $('#table_field').append(input);
            });

            //remove input fields
            $("#table_field").on('click', '#remove', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });
            
            /*
                // calculating of cgpa
                $(".calcCGPA").click(function() {
                // not necessary
                "use strict";
                var cgpa = $(".cgpa-years option:selected").val();
                var unIT = $(".unIT option:selected").val();
                var cgpaunIT = cgpa * unIT;
                $(".cgparesult").val(cgpaunIT);
                });
            */

        });


    </script>
</head>
<body>
