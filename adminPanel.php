<?php include "connection.php"

?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashbord || Campus.lk</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    if (isset($_SESSION["Admin"])) {
        $admin = $_SESSION["Admin"]["email"];


    ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12   p-2 shadow-lg  ">
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="row">



                                <div class="row">
                                    <span class="text-center">Welcome To Admin? <b><?php echo $_SESSION["Admin"]["fname"] . " " . $_SESSION["Admin"]["lname"]; ?></b></span>

                                </div>

                                <a href="#" class="text-center text-decoration-none btn btn-danger text-white" onclick="logOut();">LogOut</a>

                            </div>
                        </div>

                    </div>
                </div>



                <div class="col-12  bg-dark p-2 mb-3  ">
                    <div class="row">
                        <div class="text-center">
                            <div class="row">
                                <h3 class="mt-2 mb-2"><a class="text-decoration-none text-white text-uppercase fw-bolder fs-4 " href="adminPanel.php">Campus.lk</a></h3>
                            </div>
                        </div>
                        <ul class="d-flex-column justify-content-center   mt-3 text-center  gap-5">
                            <li><a class="text-decoration-none btn btn-outline-danger mb-3" href="#" onclick="student();">Add Student</a></li>
                            <li><a class="text-decoration-none btn btn-outline-warning mb-3" href="studentManagement.php">Student Manage</a></li>
                            

                        </ul>
                    </div>
                </div>


                <div class="col-12  ">
                    <div class="row">
                        <div class="d-lg-flex justify-content-center gap-5">

                            <?php

                            $today = date("Y-m-d");


                            $a = "0";

                            $student_rs =  Database::search("SELECT * FROM `student`");

                            $student_num =   $student_rs->num_rows;



                            for ($x = 0; $x < $student_num; $x++) {

                                $data = $student_rs->fetch_assoc();



                                $d = $data["date"];
                                $splitDate = explode(" ", $d); //separate date from time
                                $pdate = $splitDate[0]; //sold date

                                if ($pdate == $today) {

                                    $a = $a + $student_num;
                                }

                                $splitMonth = explode("-", $pdate); //separate date as year, month, date



                            }
                            ?>
                            <div class="col-12 col-lg-2 p-2 btn btn btn-outline-info mt-5 mb-5 rounded rounded-1 shadow-lg">
                                <div>
                                    <p class="text-center">Total Register Student</p>
                                    <p class="text-center"><?php echo $student_num ?></p>
                                </div>
                            </div>

                            <div class="col-12 col-lg-2 p-2 btn btn-outline-success mt-5 mb-5 rounded rounded-1 shadow-lg">
                                <div>
                                    <p class=" text-center">Campus Selected Student</p>
                                    <p class=" text-center">16</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-2 p-2 btn btn-outline-warning mt-5 mb-5 rounded rounded-1 shadow-lg">
                                <div>
                                    <p class=" text-center">Today Register Student</p>
                                    <p class=" text-center"><?php echo $a ?></p>
                                </div>
                            </div>
                        </div>



                    </div>


                </div>

                <!-- model student -->
                <div class="modal modelimg" tabindex="-1" id="studentModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Studet Register</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 mt-2 ">
                                    <div class="row ">
                                        <div class="col-12 ">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">First Name</label>
                                                <input type="text" class="rounded rounded-1  " style="font-size: 18px;height: 40px;" id="fname">
                                            </div>

                                        </div>

                                        <div class="col-12 ">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">Last Name</label>
                                                <input type="text" class="rounded rounded-1  " style="font-size: 18px;height: 40px;" id="lname">
                                            </div>

                                        </div>

                                        <div class="col-12 ">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">Nic Number</label>
                                                <input type="text" class="rounded rounded-1  " style="font-size: 18px;height: 40px;" id="nic">
                                            </div>

                                        </div>

                                        <div class="col-12 ">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">Address Line1</label>
                                                <input type="text" class="rounded rounded-1  " style="font-size: 18px;height: 40px;" id="line1">
                                            </div>

                                        </div>

                                        <div class="col-12 ">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">Address Line2</label>
                                                <input type="text" class="rounded rounded-1  " style="font-size: 18px;height: 40px;" id="line2">
                                            </div>

                                        </div>

                                        <div class="col-12 ">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">Mobile Number</label>
                                                <input type="text" class="rounded rounded-1  " style="font-size: 18px;height: 40px;" id="mobile">
                                            </div>

                                        </div>

                                        <div class="col-12  mt-1 mb-2">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2">Gender</label>


                                                <select name="" id="gender" class="form-check rounded rounded-1 " style="font-size: 18px;height: 40px;" >
                                                    <?php
                                                    $gender_rs = Database::search("SELECT * FROM `gender`");
                                                    $gender_num =  $gender_rs->num_rows;

                                                    for ($i = 0; $i < $gender_num; $i++) {
                                                        $data = $gender_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"] ?></option>
                                                    <?php
                                                    

                                                    }

                                                    ?>


                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-12  mt-1 mb-2">
                                            <div class="row">
                                                <label for="" class="fw-bold fs-6 mb-2"> Course</label>
                                                <select name="" id="course" class="form-check rounded rounded-1 " style="font-size: 18px;height: 40px;">
                                                    <?php
                                                    $course_rs = Database::search("SELECT * FROM `course`");
                                                    $num =  $course_rs->num_rows;

                                                    for ($i = 0; $i < $num; $i++) {
                                                        $data = $course_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $data["course_id"]; ?>"><?php echo $data["name"] ?></option>
                                                    <?php

                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="Signup();">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- model end -->

                <footer class="d-flex justify-content-center align-items-center mt-3 mb-3">
                    <p class="fw-bold">Copyright &copy; 2024 Campus.lk All Rights Reserved.</p>
                </footer>



            </div>
        </div>

    <?php

    } else {
        echo ("Invalid Admin");
    }
    ?>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>