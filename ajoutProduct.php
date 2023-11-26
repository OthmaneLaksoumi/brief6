<?php

$conn = new PDO('mysql:host=localhost;dbname=brief6', 'root', '');
$stmt1 = $conn->prepare("SELECT * FROM categories");
$stmt1->execute();
$catg = $stmt1->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($catg);
// echo "</pre>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $title = $_POST["title"];
    $codeBar = $_POST["codeBar"];
    $prixAchat = $_POST["prixAchat"];
    $prixFinal = $_POST["prixFinal"];
    $desc = $_POST["desc"];
    $qntMin = $_POST["qntMin"];
    $qntStock = $_POST["qntStock"];
    $img = $_POST["img"];
    $catg = $_POST["catg"];

    $stmt = $conn->prepare("INSERT INTO 
        products(etiquette, codeBarres, prixAchat, prixFinal, prixOffre, descpt, qntMin, qntStock, img, catg)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([$title, $codeBar, $prixAchat, $prixFinal, $prixFinal, $desc, $qntMin, $qntStock, $img, $catg]);


    // $stmt = $conn->prepare("INSERT INTO 
    //         products(etiquette, codeBare, prixAchat, prixFinal, offrePrix, description, qntMin, qntStock, img, catg)
    //         VALUES
    //         ('$title', '$codeBar', '$prixAchat', '$prixFinal', '$prixFinal', '$desc',  '$qntMin', '$qntStock', '$img', '$catg');
    //         ");
    // $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // if (count($result) == 1) {
    //     session_start();
    //     $_SESSION["state"] = $result[0]["state"];
    //     $_SESSION["role"] = $result[0]["role"];
    //     header("Location: validatMessage.php");
    //     exit;
    //     // echo '<pre>';
    //     // print_r($result);
    //     // echo '</pre>';
    // }


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
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
        <div class="collapse navbar-collapse d-flex" id="navbarTogglerDemo01">
            <a class="navbar-brand col-5" href="index.php">ElectroNacer</a>

            <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul> -->

        </div>
    </nav>


    <h1>Ajouter Produit</h1>

    <div class="my-5">
        <form action="" method="post" class="container">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="codeBar" class="form-label">Code à Bare</label>
                <input type="text" class="form-control" id="codeBar" name="codeBar" required>
            </div>
            <div class="mb-3">
                <label for="prixAchat" class="form-label">Prix d'achat</label>
                <input type="text" class="form-control" id="prixAchat" name="prixAchat" required>
            </div>
            <div class="mb-3">
                <label for="prixFinal" class="form-label">Prix Final</label>
                <input type="text" class="form-control" id="prixFinal" name="prixFinal" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="desc" required>
            </div>
            <div class="mb-3">
                <label for="qntMin" class="form-label">Quantity Minimale</label>
                <input type="text" class="form-control" id="qntMin" name="qntMin" required>
            </div>
            <div class="mb-3">
                <label for="qntStcok" class="form-label">Quantity Stock</label>
                <input type="text" class="form-control" id="qntStock" name="qntStock" required>
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Image Source</label>
                <input type="text" class="form-control" id="img" name="img" required>
            </div>
            <div class="mb-3">
                <label for="catg" class="form-label">Category</label>
                <select name="catg" id="" class="form-control">
                    <?php
                        foreach ($catg as $item) {
                            echo "<option>" . $item["name"] . "</option>";
                        }
                    ?>
                </select>
                <!-- <input type="text" class="form-control" id="catg" name="catg" required> -->
            </div>
            <input type="submit" class="btn btn-primary my-5" value="Ajouter">
        </form>


</body>

</html>