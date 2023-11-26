<?php

try {

    $conn = new PDO('mysql:host=localhost;dbname=brief6', 'root', '');


    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email' AND pass = '$password'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


        if (count($result) == 1) {
            
            setcookie("state", $result[0]["state"], time() + 60 * 60 * 24 * 10);
            setcookie("role", $result[0]["role"], time() + 60 * 60 * 24 * 10);
            if ($result[0]["state"] === 1) {
                setcookie("username", $result[0]["username"], time() + 60 * 60 * 24 * 10);
            }
            header("Location: validatMessage.php");
            exit;
            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';
        }
    }
} catch (Exception $e) {

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
        <div class="collapse navbar-collapse d-flex" id="navbarTogglerDemo01">
            <a class="navbar-brand col-5" href="index.php">ElectroNacer</a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php" id="home">Home</a>
                </li>
                <?php
                if (isset($_COOKIE["state"], $_COOKIE["role"])) {
                    if ($_COOKIE["state"] === "1" && $_COOKIE["role"] === "0") {

                        ?>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="productsUser.php" id="home">Products</a>
                        </li>

                    <?php } ?>

                    <?php
                    if (isset($_COOKIE["state"], $_COOKIE["role"])) {
                        if ($_COOKIE["state"] === "1" && $_COOKIE["role"] === "1") {
                            ?>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="productsUser.php" id="home">Products</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="dashboard.php" id="home">Dashboard</a>
                            </li>

                            <?php
                        }
                        ?>
                        <!-- <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Reports
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav> -->

                    <?php }
                } ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
                </li>

            </ul>

        </div>
    </nav>

    <!-- <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">
                                Settings
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </div> -->

    <?php if (!isset($_COOKIE["username"])) { ?>
        <h1>Login</h1>

        <div class="parent-form">
            <form action="" method="post" class="container">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="userOrEmail" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="password" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Login">
            </form>
            <?php
            if (isset($result) && count($result) == 0) {
                echo "<p class='invalid'>Invalid Email Or Password</p>";
            }

            ?>


            <div class="sign">
                <p>Vous n'avez pas de compte ? &nbsp;&nbsp;</p>
                <a href="sign_up.php">Sign up</a>
            </div>
        </div>

        <?php
    } else {

        echo "<h1>Welcome " . $_COOKIE["username"] . "</h1>";


        ?>
        <!-- <script>
        let home =document.getElementById("home");
        home.setAttribute("href", "google.com");
        console.log(home);
    </script> -->



        <?php

    }

    ?>










</body>

</html>