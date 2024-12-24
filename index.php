
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
include("database.php");

$table = " CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(15) NOT NULL)
";
mysqli_query($connect, $table);

$values = "INSERT INTO users (username, password) 
VALUES 
('hala', '12345678'),
('HTU', '87654321'),
('bassam', '11223344')";
mysqli_query($connect, $values);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$user = $_POST["user"];
$password =$_POST["password"];


$check = "SELECT * FROM users
 WHERE username='$user' and password='$password'";
$result = mysqli_query($connect, $check);
$counter = mysqli_num_rows($result);

if ($counter > 0) {
    echo "hello {$user}";
} else {
    
    $check1 = "SELECT * FROM users 
    WHERE username='$user'";
    $result1 = mysqli_query($connect, $check1);
    if (mysqli_num_rows($result1) > 0) {
        echo "The password is incorrect.";
    } else {
        echo "User does not exist.";
    }
}}



mysqli_close($connect);
?>
