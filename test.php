<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Simple Bootstrap Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        div {
            background-color: #eee;
            width: 25%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa voluptatem maxime placeat, consectetur
            doloremque veritatis dolores <span class="hide" style="display: none;">ea esse id repudiandae repellendus?
                Nostrum velit soluta impedit quae
                reprehenderit aliquid vitae vel?</span> <span class="changeName text-danger" onclick="show()"
                style="cursor: pointer;">Show more</span></p>
    </div>

    <form action="" enctype="multipart/form-data" method="post">
        <input type="file" name="jj">
        <input type="submit">
    </form>

    <?php
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';



    ?>


    <script>
        function show() {
            let para = document.querySelector(".hide");
            if (para.style.display !== 'none') {
                para.style.display = 'none';
                document.querySelector(".changeName").textContent = 'Show More';

            } else {
                para.style.display = 'inline';
                document.querySelector(".changeName").textContent = 'Show less';
            }
        }
    </script>
</body>

</html>