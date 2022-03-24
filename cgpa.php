<?php
      include 'core/init.php';
      $gp_id = $_SESSION['gp_id'];
      $user = $getFromG->userData($gp_id);

      if($getFromG->loggedIn() === false) {
        header("Location: ".BASE_URL."");
        // echo '<script>window.location.href = "index.php";</script>';
      }

      $getAll = $getFromG->getAllStuNames();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=BASE_URL?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate CGPA</title>
    <!-- jquery cdn -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <!-- <script src="file:///C:/xampp/htdocs/shopcart/CGPA/gpform/js/jquery-3.6.0.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
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

        });
    </script>
    
</head>
<body>
    <div class="container">
    <a href="validate/logout.php"><button name="logout" style="left:1; cursor:pointer; padding:3px; color:black; margin:5px">Logout</button></a>
      <!-- <form action="action.php" class="insert-form" method="POST" id="insert_form"> -->
        <hr>
        <h1 class="text-center">I <?=@ $user->fullname ?> is Calculating GPA/CGPA from <?=@$user->inst_name;?> Higher Institution, studying <?=@ucwords($user->dept_name);?></h1>
        <hr>

        <div class="row gpaHeader text-center">
            <div class="col-md-3">
              <span class="course-text font-weight-bolder">Number of Courses:</span>&nbsp;&nbsp;&nbsp;<select id="gpa-course" class="gpa-course">
                <option value=""></option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="col-md-5">
                <marquee behavior="#" loop="infinite" scrolldelay="200"><span class="greeting"></span></marquee>
            </div>
            <div class="col-md-3 courseUNIt">
              <span class="ponit-text font-weight-bolder">Points:</span>&nbsp;&nbsp;&nbsp;<select id="courseUnit" class="courseUnit">
                <option value=""></option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>
            </div>
        </div>

        <hr>
        <form action="validate/action.php" class="insert-form" method="POST" id="insert_form">
          <div class="org-table">
            <table class="table table-bordered table-striped col-md-12 col-xs-3 col-sm-6" id="table_field">
              <tr>
                <th>S/N</th>
                <th>Course Code</th>
                <th>Course Score</th>
                <th>Grade</th>
                <th>Course Unit</th>
                <th>GradePoint</th>
                <th>CourseUnit GradePoint</th>
                <th>Add or Remove</th>
              </tr>
              <tr>
                <td class="courseNo">1</td>
                <td><input class="form-control" type="text" name="code[]" required=""></td>
                <td><input class="form-control score" type="text" name="score[]" required=""></td>
                <td><input class="form-control grade" type="text" name="grade[]" required="" readonly></td>
                <td>
                  <select name="unit[]" id="unit" class="form-control unit">
                    <option value=""></option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td><input type="text" class="point form-control" name="poin[]" required="" readonly></td>
                <td><input type="text" class="unitPoint form-control" name="unitpoint[]" required="" readonly></td>
                <td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td>
              </tr>
            </table>
          </div>
          

          <!-- buttons -->
          <div class="text-center row mb-5">
            <div class="col-md-4">
              <button class="btn btn-primary" type="calculate" name="calcCUGP" id="calcCUGP">Calculate GPA</button>
              <input class="gpascore" type="text" name="gpascore" readonly>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success" type="submit" name="submit" id="savegpa" disabled>Submit</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-danger" type="clear" name="clear" id="clear">RESET</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-danger" type="clear" name="clear" id="clear">LOGOUT</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-info cgpa" type="button" data-toggle="modal" data-target="#myModal" name="calcCUGP" id="calcCUGP">Calculate CGPA</button>
            </div>
          </div>
        </form>
            
            <!-- begin modal -->
            <!-- <form class="cgpaForm"> -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Calculate your CGPA</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body cgpaBody">

                  <div class="row cgpaHeader">
                        <div class="col-md-6">
                          <span class="years-text font-weight-bolder mr-2">Number of Years:</span><select id="cgpa-years" class="cgpa-years">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          </select>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3 cgpaUnit">
                          <span class="ponit-text font-weight-bolder mr-2">Points:</span><select id="unIT" class="unIT">
                            <option value=""></option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                        </div>
                  </div>

                  <hr>
                  <form class="cgpaForm">
                    <div class="addTable">
                      <table class="table table-bordered CGPATable" id="cgpaTable">
                        <tr>
                          <th>Levels</th>
                          <th>First Semester</th>
                          <th>Second Semester</th>
                        </tr>
                        <tr class="levelNo">
                          <td class="levelNo">100</td>
                          <td><input type="text" class="point pint form-control" name="point" required=""></td>
                          <td><input type="text" class="point pints form-control" name="point" required=""></td>
                        </tr>
                      </table>
                    </div>
                    </form>
                  
                </div>
                 <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary" class="savecgpa">Save Data</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success calcCGPA">Calculate CGPA</button>
                    <button class="btn btn-danger" type="clear" name="" id="CGPAreset">RESET</button>
                    <div>
                      <input class="form-control mx-auto cgparesult" type="text" readonly>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <!-- </form> -->
              <!-- end modal -->
            </div>
          <!-- button end -->

        </div>
      </form>


        
      <!-- Contextual classes table starts -->
      <div class="card">
          <div class="card-header">
              <h5>Contextual Classes</h5>
              <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                      <li><i class="fa fa fa-wrench open-card-option"></i></li>
                      <li><i class="fa fa-window-maximize full-card"></i></li>
                      <li><i class="fa fa-minus minimize-card"></i></li>
                      <li><i class="fa fa-refresh reload-card"></i></li>
                      <li><i class="fa fa-trash close-card"></i></li>
                  </ul>
              </div>
          </div>
          <div class="card-block table-border-style">
              <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>S/N</th>
                              <th>Course Code</th>
                              <th>Course Score</th>
                              <th>Grade</th>
                              <th>Course Unit</th>
                              <th>Grade Point</th>
                              <th>CourseUnit GradePoint</th>
                              <th>Add/Remove</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr class="table-active">
                              <th scope="row">1</th>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control btn btn-danger" value="ADD" type="button" required=""></td>
                          </tr>
                          <tr class="">
                              <th scope="row">1</th>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control btn btn-danger" value="ADD" type="button" required=""></td>
                          </tr>
                          <tr class="">
                              <th scope="row">1</th>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control btn btn-danger" value="ADD" type="button" required=""></td>
                          </tr>
                          <tr class="">
                              <th scope="row">1</th>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control btn btn-danger" value="ADD" type="button" required=""></td>
                          </tr>
                          <tr class="">
                              <th scope="row">1</th>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control" type="text" name="code[]" required=""></td>
                              <td><input class="form-control btn btn-danger" value="ADD" type="button" required=""></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <!-- Contextual classes table ends -->
      



    </div>

<?php
    include 'foot.php';
?>
