<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/library.css">
    <link rel="stylesheet" href="assets/css/utils.css">
    <title>Game collection</title>
</head>

<body>
    <?php require_once "app/view/component/header.php"; ?>
    <div id="add_game">
        <div id="header">
            <h1>Ajouter un jeu a sa bibliothèque</h1>
            <form method="get" id="search_zone">
                <input type="text" placeholder="Rechercher un jeu" name="search_game" id="search_game">
                <input type="submit" value="RECHERCHER" id="btn">
            </form>

        </div>
        <div id="other_games">
            <h1>Mes jeux</h1>
            <div id="containeur_games">
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
                            <form method="post">
                                <input type="hidden" name="id_game" value="<?php echo $game["id_game"]; ?>">
                                <button type="submit" name="action" class="btn_add" value="add">AJOUTER A LA
                                    BIBLIOTHÈQUE</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>