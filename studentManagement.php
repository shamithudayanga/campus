<?php include "connection.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Manage || Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body class="mainImgs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-3 mb-2 d-flex justify-content-center align-items-center">
                <div class="row">
                    <h1 class="fw-bolder text-warning ">Student Manage </h1>

                </div>

            </div>
            <hr />

            <div class="col-12 mt-2 mb-2 ">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <label for="" class="fw-bold text-center m-1">Search</label>
                        <input class="w-50 p-2 rounded rounded-2 border border-0" type="text" placeholder="search Student...">
                        <button class="btn btn-primary rounded rounded-2 w-25 p-2 ">Search</button>
                    </div>

                </div>
            </div>


            <div class="col-12 mt-4 mb-2 d-flex justify-content-center align-items-center">
                <div class="row">
                    <!-- table -->
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                              
                                <th scope="col">Student Number</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <?php

                        $query =  "SELECT * FROM `student`";


                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }




                        $student_rss = Database::search($query);
                        $num = $student_rss->num_rows;

                        $results_per_page = 4;
                        $number_of_pages = ceil($num / $results_per_page);

                        $page_results = ($pageno - 1) * $results_per_page;
                        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                        $selected_num = $selected_rs->num_rows;

                        for ($x = 0; $x < $selected_num; $x++) {
                            $selected_data = $selected_rs->fetch_assoc();

                        ?>


                            <tbody class="table-group-divider">
                                <?php
                                $course = Database::search("SELECT * FROM `course` WHERE `course_id`='" . $selected_data["course_course_id"] . "'");
                                $course_data = $course->fetch_assoc();
                                ?>
                                <tr>
                                
                                    <td class="fw-bold"><?php echo $selected_data["uniq_id"] ?></td>
                                    <td class="fw-bold"><?php echo $selected_data["fname"] . " " . $selected_data["lname"] ?></td>
                                    <td class="fw-bold"><?php echo $course_data["name"] ?></td>
                                    <td class="d-flex-row flex-sm-column justify-content-between  align-items-center">
                                        <a href="<?php echo "viewStudent.php?id=".$selected_data["uniq_id"]?>" class="btn btn-success rounded rounded-1 m-2" >View</a>
                                        <a href="<?php echo "studentUpdate.php?id=". $selected_data["uniq_id"] ?>" class="btn btn-warning rounded rounded-1 m-2" >Edit</a>
                                        <button class="btn btn-danger rounded rounded-1 m-2 " onclick="Delete(<?php echo $selected_data['nic'];?>);">Delete</button>
                                    </td>


                                </tr>




                            </tbody>

                        <?php

                        }

                        ?>

                    </table>
                    <!-- end table -->
                </div>
            </div>


            


            <div class="clearfix mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno - 1);
                                                        } ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo; Previous</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {

                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php

                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno + 1);
                                                        } ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo; </span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <footer class="d-flex justify-content-center align-items-center mt-3 mb-3 fixed-bottom">
                <p class="fw-bold">Copyright &copy; 2024 Campus.lk All Rights Reserved.</p>
            </footer>
        </div>


    </div>


    <script src="script.js">


    </script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>


</body>

</html>