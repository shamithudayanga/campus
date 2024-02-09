<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus|| Login Page</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="margin-top: 3%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 ">
                <div class="row">
                    <div class=" col-12 ">
                        <div class="row">
                            <div class="border border-1 p-5 mt-3 mb-3 shadow-lg rounded rounded-3" style="border: none;">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <img src="src/school.jpg" alt="" class="mainImg rounded rounded-2">
                                        </div>

                                    </div>


                                    <div class="col-lg-6 col-12 d-flex justify-content-center align-items-center">
                                        <div class="row">
                                            <div class="mt-3 mb-3">
                                                <h1 class="fw-bold">Admin Login</h1>
                                            </div>

                                            <span class="fw-bold fs-6 mt-2 mb-2">User Name</span>
                                            <input type="email" class="rounded rounded-2 border-1 p-1 text-decoration-none border-dark" id="email">

                                            <span class="fw-bold fs-6 mt-2 mb-2">Password</span>
                                            <input type="password" class="rounded rounded-2 border-1 p-1 text-decoration-none border-dark p-1" id="password">



                                            <button class="mt-3 mb-3 bg-success rounded rounded-4 p-3 border-0" onclick="adminLogin();">Login</button>

                                        </div>
                                    </div>




                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="d-flex justify-content-center align-items-center mt-3 mb-3">
                <p class="fw-bold">Copyright &copy; 2024 Campus.lk All Rights Reserved.</p>
            </footer>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>