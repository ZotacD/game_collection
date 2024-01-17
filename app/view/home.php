<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/utils.css">
    <title>game collection</title>
</head>

<body>
    <?php require_once "app/view/component/header.php"; ?>

    <section id="header">
        <img src="" alt="">
        <h1>
            <?php echo "Salut ..."; ?>PRÊT À AJOUTER DES JEUX À TA COLLECTION ?
        </h1>
    </section>

    <div class="main">
        <h2>Mes jeux</h2>
        <section id="page">
            <?php
            foreach ($games as $game) {
                ?>
                <div class="games" style="background-image: url('<?php echo $game["url_cover"]; ?>');">
                    <div class="info">
                        <div class="desc">
                            <h3>
                                <?php echo $game["name_game"]; ?>
                            </h3>
                            <p>
                                <?php echo $game["release_date"]; ?>
                            </p>
                        </div>
                        <p class="plateforme">
                            <?php echo $game["platform_game"]; ?>
                        </p>
                    </div>
                </div>
                <?php
            }
            ?>

        </section>
    </div>


    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>