<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resourses/logo.png">
    <title>Student Update | campus.lk</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>

<body class="bg-light">

    <div class="container-fluid">
        <div class="row btnn">


          
          <?php
          include "connection.php";
          if(isset($_GET["id"])){
              $user_id =  $_GET["id"];


           $student_rs= Database::search("SELECT*FROM `student` WHERE `uniq_id`='".$user_id."'");
          $student_data = $student_rs->fetch_assoc();
          ?>
            

                <div class="col-12 ">
                    <div class="row">

                        <div class="col-12 bg-body mt-0 mb-4 ">
                            <div class="row ">

                            

                                <div class="offset-2 col-8  bg-secondary  bg-opacity-25 rounded-2">
                                    <div class="p-3 py-5">



                                        <div class="row">

                                            <div class="col-6 mb-3">
                                                <label class="form-label  fw-bold">First Name</label>
                                                <input type="text" id="fname" class="form-control  fw-bold border-0" value="<?php echo $student_data["fname"]; ?>" />
                                            </div>

                                            <div class="col-6 ">
                                                <label class="form-label  fw-bold">Last Name</label>
                                                <input type="text" id="lname" class="form-control  fw-bold border-0" value="<?php echo  $student_data["lname"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label  fw-bold pt-2">Mobile Number</label>
                                                <input type="text" id="mobile" class="form-control  fw-bold border-0" value="<?php echo  $student_data["mobile"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label  fw-bold pt-2">Nic Number</label>
                                                <div class="input-group">
                                                    <input type="text" id="nic" value="<?php echo  $student_data["nic"]; ?>" class="form-control  fw-bold border-0" aria-describedby="pwb">
                                                   
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label  fw-bold pt-2">Address Line 1</label>
                                                <input type="text" id="line1" class="form-control  fw-bold border-0" value="<?php echo  $student_data["line1"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label  fw-bold pt-2">Address Line 2</label>
                                                <input type="text" id="line2" class="form-control  fw-bold border-0" value="<?php echo  $student_data["line2"]; ?>" />
                                            </div>

                                            <div class="col-12">
                                                <label class="form-label  fw-bold pt-2">Registered Date</label>
                                                <input type="text" class="form-control  fw-bold border-0" readonly value="<?php echo  $student_data["date"]; ?>" />
                                            </div>

                                        

                                            <div class="col-6">
                                                <label class="form-label fw-bold pt-2">Course</label>
                                                <select class="form-select fw-bold border-0" id="course"  disabled>
                                                    <option value="0">Select Course</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `course`");
                                                    $num = $rs->num_rows;
                                                    for ($x = 0; $x < $num; $x++) {
                                                        $data = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $data["course_id"]; ?>" <?php
                                                                                                        if (!empty($student_data["course_course_id"])) {
                                                                                                            if ($data["course_id"] == $student_data["course_course_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            }
                                                                                                                    ?>><?php echo $data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>



                                           <?php
                                           $gender=Database::search("SELECT * FROM `gender` WHERE `id`='".$student_data["gender_id"]."'");
                                            $gender_data =  $gender->fetch_assoc();
                                           ?>

                                            <div class="col-6">
                                                <label class="form-label fw-bold pt-2">Gender</label>
                                                <input type="text" class="form-control fw-bold border-0" disabled value="<?php echo $gender_data["name"]; ?>" />
                                            </div>

                                            <div class="col-12 d-grid mt-2 pt-4">
                                                <button class="btn btn-warning fw-bold p-1 " onclick="updateStudent(<?php echo $student_data['nic']?>);">Update Student
                                                    Profile</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>

                <?php
                }
                ?>

           




            <footer class="d-flex justify-content-center align-items-center mt-3 mb-3 fixed-bottom">
                <p class="fw-bold">Copyright &copy; 2024 Campus.lk All Rights Reserved.</p>
            </footer>


        </div>
    </div>









    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>