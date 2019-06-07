<?php
    if(isset( $_POST["username"]) && isset( $_POST["password"]) && $_POST["username"] != '' && $_POST["password"] != ''){

        // attempt to login
        try{
            $login_successful = $clientSession->Login($_POST["username"], $_POST["password"]);
    
        } catch(Exception $e) {
            $login_successful = FALSE;
        }

        // now check if it was successfull
        if(isset($user)){
            $login_successful = TRUE;
        }

        if(isset($login_successful)){
            if($login_successful == TRUE){
                
                echo 'Login successfull<br>';

                echo $clientSession->getUser()->getUsername() . '<br>';

                echo $clientSession->isLoggedIn() ? 'YES' : 'NO';
            } else {
                echo 'Username or password incorrect.';
            }
        } else {
            echo 'Login failed.';
        }
    } else {
        include_once 'views/login.view.php';
    }
?>