<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>Document</title>
</head>

<body>
    <?php require_once "app/view/component/header.php"; ?>

    <div class="main">
        <form class="accountSection" method="post">
            <h1>Mon profil</h1>

            <div class="inputSection">
                <label>Nom :</label>
                <input type="text" name="name_user" value="<?php echo $user['name_user'] ?>">
            </div>
            <div class="inputSection">
                <label>Prénom :</label>
                <input type="text" name="fname_user" value="<?php echo $user['fname_user'] ?>">
            </div>
            <div class="inputSection">
                <label>Email :</label>
                <input type="text" name="mail_user" value="<?php echo $user['mail_user'] ?>">
            </div>
            <div class="inputSection">
                <label>Mot de passe :</label>
                <input type="password" name="password_user">
            </div>
            <div class="inputSection">
                <label>Confirmation du mot de passe :</label>
                <input type="password" name="c_password_user">
            </div>

            <button type="submit" name="action" value="update">Modifier</button>
            <button type="submit" name="action" value="delete">Supprimer mon compte</button>
            <button type="submit" name="action" value="disconnect">Se déconnecter</button>
        </form>
    </div>

    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>