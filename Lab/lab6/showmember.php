<html>
    <body>

    <?php

    $loginbutton = $_GET["login"];
    $registerbutton = $_GET["register"];

    if($loginbutton){

        echo "Welcome $_GET[username_login]<br/>";
        echo "Your email password is: $_GET[password_login]<br/>";
        echo "Remember me: $_GET[rememberme]<br/>";

    } elseif ($registerbutton) {

        echo "First Name: $_GET[firstname]<br/>";
        echo "Last Name: $_GET[lastname]<br/>";
        echo "Username: $_GET[username_r]<br/>";
        echo "Email: $_GET[email_r]<br/>";
        echo "Password: $_GET[password_r]<br/>";
        echo "Subscribe to newsletter: $_GET[subscribe]<br/>";

    }

    ?>

    </body>
</html>