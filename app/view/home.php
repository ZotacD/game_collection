<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <title>Document</title>
</head>
<body>
    <?php require_once "assets/component/header.php";?>
    <section id="header">
        <img src="" alt="">
        <h1><?php echo "Salut ...";?>PRÊT à AJOUTER DES JEUX à TA COLLECTION ?</h1>
    </section>
    <h2>Mes jeux</h2>
    <section id="page">
        <div class="games">
            <div class="info">
                <div class="desc"><h3>Read dead Redemption</h3><p>100 h</p></div>
                <p class="plateforme">PlayStation</p>
            </div>
        </div>
        <div class="games">
            <div class="info">
                <div class="desc"><h3>Read dead Redemption</h3><p>100 h</p></div>
                <p class="plateforme">PlayStation</p>
            </div>
        </div>
        <div class="games">
            <div class="info">
                <div class="desc"><h3>Read dead Redemption</h3><p>100 h</p></div>
                <p class="plateforme">PlayStation</p>
            </div>
        </div>
        <div class="games">
            <div class="info">
                <div class="desc"><h3>Read dead Redemption</h3><p>100 h</p></div>
                <p class="plateforme">PlayStation</p>
            </div>
        </div>
    </section>
    
    
    <?php require_once "assets/component/footer.php";?>
</body>
</html>