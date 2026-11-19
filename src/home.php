<?php
session_start();
if (!isset($_SESSION['user_id'])) {
header('refresh:0;url=signin.html');
} else {
header('refresh:0;url=home.php');
}
include('../settings/database.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<center>
<?php echo $_SESSION['user_firstname']. " ". $_SESSION['user_lastname']; ?>
<h3>Welcome to Main Store</h3>
<a href="logout.php">Logout</a>
</center>
Menu: <br>
<a href="list_users.php">List users</a>
</body>
</html>