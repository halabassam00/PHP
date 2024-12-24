<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method=POST>
<label>Username :</label><br>
<input type="text" name="user"><br>

<label>Password :</label><br>
<input type="password" name="password"><br>
<input type="submit" name="login" value="log in">
</form>
</body>
</html>

<?php


if (isset($_POST["login"])){
    
    if (isset($_POST["user"])&& !empty($_POST["user"])){
        $username=filter_input(INPUT_POST,"user",FILTER_SANITIZE_SPECIAL_CHARS);
        

        if(isset($_POST["password"])&& !empty($_POST["password"])){
        
            echo"Hello {$username}";
        }
        else {
            echo"Write your password , please.";
        }
    }
    else {
        echo"Write your username, please.";
    }
}

?>
