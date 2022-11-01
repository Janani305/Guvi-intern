<?php
session_start();
include_once 'db.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = mds($_POST['pass']);
$cpassword = mds($_POST['cpass']);
$Role = 'user';
$verification_status = '0';

if(!empty($name) && !empty($lname) && !empty($email) && !empty($password) && !empty($cpassword)){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $sql =mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql)>0){
            echo "$email ~ Already Exists";
        }
        else{
            if($password == $cpassword){
                if(isset($_FILES['images'])){
                    $img_name = $_FILES['image']['name'];
                    $img_typ = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode('.',$img_name);
                    $img_extension = end($img_explode);
                    $extensions = ['png','jpeg','jpg'];

                    if(in_array($img_extension,$extenstions) === true){
                        $time = time();
                        $newimagename = $time  . $img_name;
                        if(move_uploaded_file($tmp_name,"../Images/" . $newimagename)){
                            random_id = rand(time(),10000000);
                            $otp = mt_rand(1111,9999);

                            $sq12 = mysqli_query($conn,"INSERT INTO users (unique_id, fname, lname, email ,phone, password, image, otp, verification_status, Role)
                            VALUES ({$random_id}),'{$fname}','{$lname}','{$email}','{$phone}','{$password}','{$newimagename}','{$otp}','{$verification_status}','{$Role}')");
                            if($sql2){
                                $sql3 = mysqli_query($conn , "Select * FROM users WHERE email ='{$email}'");
                                if(mysqli_num_rows($sql3)>0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id']= $row['unique_id'];
                                $_SESSION['email']= $row['email'];
                                $_SESSION['otp']= $row['otp'];

                                if($otp){
                                    $receiver = $email;
                                    $subject = "From: $fname $lname <$email>";
                                    $body ="Name"." $fname $lname \n Email "." $email \n "." $otp";
                                    sender = "From: omnipexonline@gmail.com";
                                }
                                if(mail($recevuer,$subject,$body,$render)){
                                    echo "success";
                                }
                                else{
                                    echo "Email Problem!" . mysqli_error()
                                }
                            }
                            else{
                                echo "Something went wrong";
                            }
                        }
                    }
                }
                }
                else{
                    echo "Please Select an Profile Image";
                }
                
            }
            else{
                echo "Confirm Password Don't Match";
            }
        }
    }
    else{
        echo "$email ~ This is not a valid Email";
    }
 
}
else{
    echo "$email ~ All Input Fields are required";
}
?>