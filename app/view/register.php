<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <title>Documjent</title>
</head>

<body>
    <div class="main">
        <form class="card">
            <div class="title">Se connecter à Game Collection</div>
            <div class="userInputSection">
                <div class="text">Prénom :</div>
                <input name="fname_user" />
            </div>
            <div class="userInputSection">
                <div class="text">Nom de famille :</div>
                <input name="name_user" />
            </div>
            <div class="userInputSection">
                <div class="text">Email :</div>
                <input name="mail_user" />
            </div>
            <div class="userInputSection">
                <div class="text">Mot de passe :</div>
                <input name="password_user" />
            </div>
            <div class="userInputSection">
                <div class="text">Confirmation du mot de passe :</div>
                <input name="c_password_user" />
            </div>
            <button type="submit">S'INSCRIRE</button>
            <a href="auth/login">
                <div class="text">Se connecter</div>
            </a>
        </form>
    </div>

    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>