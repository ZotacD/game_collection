<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/user.php";

        setup_update_inputs();

        require_once "app/view/profile.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}


function setup_update_inputs(){
    $user = getUser($_SESSION["id_user"]);

    $action = $_POST["action"];

    switch($action) {
        case "uptadeUser":
            $name_user=$_POST["name_user"];
            $fname_user=$_POST["fname_user"];
            $mail_user=$_POST["mail_user"];
            $password_user=$_POST["password_user"];
            $confirm_password_user=$_POST["confirmpassword"];

            if($password_user===$confirm_password_user){
                updateUser($_SESSION["id_user"], $fname_user, $name_user, $mail_user, $password_user);
            }
            break;

        case "removeUser":
            removeUser($_SESSION["id_user"]);
            break;
        case "disconnect":
            $_SESSION["id_user"]=-1;
            header("Location: " . $_ENV["BASE_DIR"]);
            exit();
    }
}

?>