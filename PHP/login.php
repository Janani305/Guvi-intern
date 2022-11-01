<?php
session_start();
include_once 'db.php';
$email = $_POST['email'];
$password = mds($_POST['pass']);

if(!empty($email) && !empty($password)){
    $sql =mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}' AND password = '{password}' ");
    if(mysqli_num_rows($sql)>0){
        $row = mysqli_fetch_assoc($sql);
        if($row){
            $_SESSION['unique_id']= $row['unique_id'];
            $_SESSION['email']= $row['email'];
            $_SESSION['otp']= $row['otp'];
            echo 'success';
        }
    }
    else{
        echo "Email and Password are incorrect!";
    }
}
else{
    echo "All Input Fields Are Required";
}
?>