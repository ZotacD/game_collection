<?php

// Récupérer l'URL depuis le paramètre "url"
$requestUrl = isset($_GET['endpoint']) ? $_GET['endpoint'] : '/';

switch ($requestUrl) {
    case '/':
        require_once "app/model/user.php";
        $user = getUser($_SESSION["id_user"]);
        if(isset($_POST['updateUser'])){

            $name_user=$_POST["name_user"];
            $fname_user=$_POST["fname_user"];
            $mail_user=$_POST["mail_user"];
            $password_user=$_POST["password_user"];
            $confirm_password_user=$_POST["confirmpassword"];

            if($password_user===$confirm_password_user){
                updateUser($id_user, $fname_user, $name_user, $mail_user, $password_user);
            }

        }elseif(isset($_POST["deleteUser"])){
            removeUser($_SESSION["id_user"]);
        }elseif(){

        }

        $action = $_POST["action"];

        switch($action) {
            case "deleteUser":

                break;
            case ""
        }
        

        


        require_once "app/view/profile.php";
        break;
    default:
        header("Location: " . $_ENV["BASE_DIR"] . "404");
        exit();
}