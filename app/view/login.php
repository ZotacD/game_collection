<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Documjent</title>
</head>

<body>
    <div class="main">
        <form class="card" method="post">
            <div class="title">Se connecter à Game Collection</div>
            <div class="userInputSection">
                <div class="text">Email :</div>
                <input name="mail_user" />
            </div>
            <div class="userInputSection">
                <div class="text">Mot de passe :</div>
                <input type="password" name="password_user" />
            </div>
            <button type="submit">SE CONNECTER</button>
            <a href="auth/register">
                <div class="text">S'inscrire</div>
            </a>
        </form>
    </div>

    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>