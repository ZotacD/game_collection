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
    <class name="parent">
        <h1>Mon profil</h1>

        <form action="" method="post">
            <div name="name">
                <label>Nom :</label>
                <input type="text" name="name_user" value="">
            </div>
            <div name="fname">
                <label>Prénom :</label>
                <input type="text" name="fname_user" value="Thomas">
            </div>
            <div name="mail">
                <label>Email :</label>
                <input type="text" name="mail_user" value="thomas.quero@outlook.com">
            </div>            
            <div name="password">
                <label>Nom :</label>
                <input type="text" name="password_user" value="123456789">
            </div>
            <div name="confirmPassword">
                <label>Nom :</label>
                <input type="text" name="confirm_password_user" value="123456789">
            </div>

            <input type="submit" name="action" value="updateUser">
            <input type="submit" name="action" value="deleteUser">
            <input type="submit" name="action" value="disconnect">
        </form>


    </class>
    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>