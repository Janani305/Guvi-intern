<?php

session_start();
include 'php/db.php';
$unique_id = $_SESSION['unique_id'];
if(empty($unique_id)){
    header("Location: login.php");
}
$qry = mysqli_query($conn,"SELECT * FROM users WHERE unique_id ='{$unique_id}'");
if(mysqli_num_rows($qry) > 0){
    $row = mysqli_fetch_assoc($qry);
    if($row){
        $_SESSION['verification_status']=$row['verification_status'];
        if($row['verification_status'] == 'verified'){
            header("Location: verify.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Welcome Page</title>
    </head>
    <body>
        <header id="header">

            <a href="" class="logo"><h1>LOGO</h1></a>
            <nav>
                <ul class="navigation">
                    <li> <a href=""><button class="logout_btn">Logout</button></a></li>
                </ul>
            </nav>
        </header>
        <section>
            <h2>Welcome:<span>abc@gmail.com</span></h2>
        </section>
    </body>
</html>