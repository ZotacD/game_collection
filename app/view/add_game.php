<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/add_game.css">
    <title>Game collection</title>
</head>
<body>
    <?php require_once "app/view/component/header.php"; ?>
    <div id="add_game">
        <div id="header">
            <h1>Ajouter un jeu a sa bibliothèque</h1>
            <form method="post" id="search_zone">
                <input type="text" placeholder="Rechercher un jeu" id="seach_game">
                <input type="submit" value="RECHERCHER" id="btn">
            </form>
        </div>
            <div id="other_games">
                <h1>Mes jeux</h1>
                <div id="containeur_games">
                    <div class="games">
                        <div class="info">
                            <div class="desc">
                                <h3>Read dead Redemption</h3>
                            <p class="plateforme">PlayStation</p>
                            </div>
                            <form method="post">
                                <input type="hidden" value="1">
                                <input type="submit" class="btn_add" value="AJOUTER A LA BIBLIOTHèQUE">
                            </form>
                        </div>
                    </div>
                    <div class="games">
                        <div class="info">
                            <div class="desc">
                                <h3>Read dead Redemption</h3>
                            <p class="plateforme">PlayStation</p>
                            </div>
                            <form method="post">
                                <input type="hidden" value="1">
                                <input type="submit" class="btn_add" value="AJOUTER A LA BIBLIOTHèQUE">
                            </form>
                        </div>
                    </div>
                    <div class="games">
                        <div class="info">
                            <div class="desc">
                                <h3>Read dead Redemption</h3>
                            <p class="plateforme">PlayStation</p>
                            </div>
                            <form method="post">
                                <input type="hidden" value="1">
                                <input type="submit" class="btn_add" value="AJOUTER A LA BIBLIOTHèQUE">
                            </form>
                        </div>
                    </div>
                    <div class="games">
                        <div class="info">
                            <div class="desc">
                                <h3>Read dead Redemption</h3>
                            <p class="plateforme">PlayStation</p>
                            </div>
                            <form method="post">
                                <input type="hidden" value="1">
                                <input type="submit" class="btn_add" value="AJOUTER A LA BIBLIOTHèQUE">
                            </form>
                        </div>
                    </div>
                    <div class="games">
                        <div class="info">
                            <div class="desc">
                                <h3>Read dead Redemption</h3>
                            <p class="plateforme">PlayStation</p>
                            </div>
                            <form method="post">
                                <input type="hidden" value="1">
                                <input type="submit" class="btn_add" value="AJOUTER A LA BIBLIOTHèQUE">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>