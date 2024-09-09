<?php
require_once 'authentication/admin-class.php';
$admin = new ADMIN();
if(!$admin->isUserLoggedIn()){
$admin->redirect('../../');


}

$stmnt = $admin->runQuery("SELECT * FROM user WHERE id = :id");
$stmnt->execute(array(":id"=> $_SESSION["adminSession"]));
$user_data = $stmnt->fetch(PDO::FETCH_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
</head>
<body>
    <h1>WELCOME <?php echo $user_data["email"]?></h1>
    <button> <a href="authentication/admin-class.php?admin_signout">SIGNOUT</a>
</body>
</html>