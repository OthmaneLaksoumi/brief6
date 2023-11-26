<?php

$conn = new PDO('mysql:host=localhost;dbname=brief6', 'root', '');
$stmt1 = $conn->prepare('SELECT * FROM categories');
$stmt1->execute();
$catg = $stmt1->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';

    $selected = $_POST["catg"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $img = $_POST["img"];

    $sql = "UPDATE categories
    SET name = '$name', descrt = '$desc', img = '$img' 
    WHERE name = '$selected'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>



    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
        <div class="collapse navbar-collapse d-flex" id="navbarTogglerDemo01">
            <a class="navbar-brand col-5" href="index.php">ElectroNacer</a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php" id="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="productsUser.php" id="home">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="dashboard.php" id="home">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
                </li>

            </ul>

        </div>
    </nav>



    <section class="dashboard">
        <?php
        include("sideBar.html");
        ?>
        <!-- </div> -->
        <!-- </div> -->



        <div class="col-md-10">
            <h1>Modifier une Categorie</h1>
            <form action="" method="post" class="container">
                <div class="mb-3">
                    <label for="catg" class="form-label">Choisir une Category</label>
                    <select name="catg" id="" class="form-control">
                        <?php
                        foreach ($catg as $item) {
                            echo "<option>" . $item["name"] . "</option>";
                        }
                        ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="catg" name="catg" required> -->
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Nouveau Nom de la catégorie</label>
                    <input type="text" class="form-control" id="title" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Nouveau Description de la catégorie</label>
                    <textarea type="text" class="form-control" id="title" name="desc" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Nouveau Image Source</label>
                    <input type="text" class="form-control" id="img" name="img" required>
                </div>


                <input type="submit" class="btn btn-primary my-5" value="Ajouter">
            </form>
        </div>
    </section>

</body>

</html>