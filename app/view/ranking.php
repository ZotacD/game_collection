<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $_ENV["BASE_DIR"] ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/utils.css">
    <link rel="stylesheet" href="assets/css/ranking.css">
    <title>Document</title>
</head>

<body>
    <?php require_once "app/view/component/header.php"; ?>
    <div class="main">
        <table>
            <caption>Classement des temps passés</caption>
            <thead>
                <tr>
                    <th>Joueur</th>
                    <th>Temps passés</th>
                    <th>Jeu favori</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ranks as $rank) { ?>
                    <tr>
                        <td>
                            <?php echo $rank["fname_user"] . " " . $rank["name_user"] ?>
                        </td>
                        <td>
                            <?php echo $rank["hours_played"] ?> h
                        </td>
                        <td>
                            <?php echo $rank["name_game"] ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require_once "app/view/component/footer.php"; ?>
</body>

</html>