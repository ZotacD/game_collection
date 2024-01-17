<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/game.css">
    <title>Document</title>
</head>

<body>
    <?php require_once "app/view/component/header.php"; ?>

    <div class="main">
        <form class="gameSection" method="post">
            <h1>
                <?php echo $game["name_game"] ?>
            </h1>

            <label>
                <?php echo $game["description_game"] ?>
            </label>

            <label>
                Temps passé :
                <?php echo $game["hours_played"] ?>
            </label>

            <h1>
                Ajouter du temps passé sur le jeu
            </h1>

            <div class="inputSection">
                <label>Temps passé sur le jeu :</label>
                <input type="number" name="hours_played">
            </div>

            <button type="submit" name="action" value="update">ajouter</button>
            <button type="submit" name="action" value="delete">Supprimer le jeu de ma blibliothèque</button>
        </form>

        <div class="imageSection">
            <img src="<?php echo $game["url_cover"] ?>">
        </div>
    </div>

    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>