<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/add_game.css">
    <title>Document</title>
</head>

<body>
    <?php require_once "app/view/component/header.php"; ?>
    <div class="main">
        <form class="addGameSection" method="post">
            <h1>
                Ajouter un jeu à sa bibliothèque
            </h1>

            <label>Le jeu que vous souhaitez ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter à votre bibliothèque</label>

            <div class="inputColumnSection">
                <label>Nom du jeu:</label>
                <input type="text" name="name_game">
            </div>

            <div class="inputColumnSection">
                <label>Éditeur du jeu :</label>
                <input type="text" name="editor_game">
            </div>

            <div class="inputColumnSection">
                <label>Sortie du jeu :</label>
                <input type="date" name="release_date">
            </div>

            <div class="inputRowSection">
                <label>Plateformes :</label>
            </div>

            <div class="inputRowSection">
                <input type="checkbox" name="playstation">
                <label>PlayStation</label>
            </div>

            <div class="inputRowSection">
                <input type="checkbox" name="xbox">
                <label>Xbox</label>
            </div>

            <div class="inputRowSection">
                <input type="checkbox" name="nintendo">
                <label>Nintendo</label>
            </div>

            <div class="inputRowSection">
                <input type="checkbox" name="pc">
                <label>PC</label>
            </div>

            <div class="inputColumnSection">
                <label>Description du jeu:</label>
                <textarea name="description_game"></textarea>
            </div>

            <div class="inputColumnSection">
                <label>URL de la cover :</label>
                <input type="url" name="url_cover">
            </div>

            <div class="inputColumnSection">
                <label>URL du site :</label>
                <input type="url" name="url_website">
            </div>

            <button type="submit" name="action" value="add">Ajouter</button>
        </form>
    </div>
    <?php require_once "app/view/component/footer.php"; ?>
</body>
</html>