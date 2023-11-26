<?php

try {



    $conn = new PDO('mysql:host=localhost;dbname=brief6', 'root', '');
    $stmt = $conn->prepare("SELECT * FROM products WHERE isHide = 0");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    







} catch (Exception $e) {

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary container">
        <div class="collapse navbar-collapse position-relative " id="navbarTogglerDemo01">
        <a class="navbar-brand col-5" href="index.php">ElectroNacer</a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="productsUser.php">Products</a>
                </li>
                <?php
                if ($_COOKIE["role"] === "1") { ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php" id="home">Dashboard</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
                </li>

            </ul>

        </div>
    </nav>

    <?php
    // $name = $_POST['identifiant'];
    // echo "<h1>Welcome $name </h1>";
    
    ?>

    <div class="select">

        <select id="filter">
            <option value="0">All</option>
            <option value="1">Arduino</option>
            <option value="2">Afficheur</option>
            <option value="3">Robot</option>
            <option value="4">Diode</option>
            <option value="5">Batterie</option>
            <option value="6">produits en rupture de stock</option>
        </select>
    </div>


    <div class="product-menu">
        <?php
        foreach ($products as $item) {
            $title = $item["etiquette"];
            $priceAchat = "prix d'achat: " . $item["prixAchat"] . "DH";
            $priceFinal = "prix final: " . $item["prixFinal"] . "DH";
            $qnt_min = $item['qntMin'];
            $qnt_stock = $item['qntStock'];
            $catg = $item['catg'];
            $img = $item['img'];
            $card = "
                <div class='product-item $catg'>
                    <img src= $img alt='Product 1'>
                    <h5>$title</h5>
                    <p>$priceAchat</p>
                    <p>$priceFinal</p>
                    <p class='qntMin'>Quantity minimale: $qnt_min</p>
                    <p class='qntStc'>Quantity en Stock:  $qnt_stock</p>
                    <p>Categorie: $catg</p>                    
                </div>
            ";

            echo $card;
            

        }
        ?>
    </div>


    

    <script src="script.js"></script>
</body>

</html>