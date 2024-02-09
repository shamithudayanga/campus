<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student || Campus.lk</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row">


            <div class="col-12 mt-3 mb-3 d-flex justify-content-center align-items-center p-1">
                <div class="row">
                    <h1 class="fw-bold text-primary bg-dark p-3 rounded rounded-3">View Student</h1>
                </div>

            </div>

            <div class="campus">

                <img src="src/campus.jpeg" alt="" style="width: 100%;">

            </div>



            <div class="mt-5 mb-3">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FIRST NAME</th>
                            <th scope="col">LAST NAME</th>
                            <th scope="col">NIC</th>
                            <th scope="col">REGISTER DATE & TIME</th>

                        </tr>
                    </thead>

                    <?php
                    include "connection.php";

                    if (isset($_GET["id"])) {
                        $ID = $_GET["id"];

                        $view_rs = Database::search("SELECT * FROM `student` WHERE `uniq_id`= '" . $ID . "'");
                        $data = $view_rs->fetch_assoc();




                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $data["uniq_id"] ?></th>
                                <td><?php echo $data["fname"] ?></td>
                                <td><?php echo $data["lname"] ?></td>
                                <td><?php echo $data["nic"] ?></td>
                                <td><?php echo $data["date"] ?></td>
                                



                            </tr>

                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>


            <div class="mt-5 mb-3">
                <table class="table table-dark">
                    <thead>
                        <tr>

                            <th scope="col">ADDRESS</th>
                            <th scope="col">MOBILE</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">COURSE</th>
                        </tr>
                    </thead>

                    <?php


                    if (isset($_GET["id"])) {
                        $ID = $_GET["id"];

                        $view_rs = Database::search("SELECT * FROM `student` WHERE `uniq_id`= '" . $ID . "'");
                        $data = $view_rs->fetch_assoc();


                        $rs = Database::search("SELECT * FROM `gender` WHERE `id`= '" . $data["gender_id"] . "'");
                        $gender_data = $rs->fetch_assoc();

                        $course_rs = Database::search("SELECT * FROM `course` WHERE `course_id`= '" . $data["course_course_id"] . "'");
                        $course_data = $course_rs->fetch_assoc();

                    ?>
                        <tbody>
                            <tr>

                                <td><?php echo $data["line1"] . "" . $data["line2"] ?></td>
                                <td><?php echo $data["mobile"] ?></td>
                                <td><?php echo $gender_data["name"] ?></td>
                                <td><?php echo $course_data["name"] ?></td>


                            </tr>

                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <footer class="d-flex justify-content-center align-items-center mt-3 mb-3 fixed-bottom">
                <p class="fw-bold">Copyright &copy; 2024 Campus.lk All Rights Reserved.</p>
            </footer>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>