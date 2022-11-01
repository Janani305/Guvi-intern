<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="form">
            
            <form action="" enctype="multipart/form-data">
                <h2>Signup Form</h2>
                <div class="error-text">Error</div>
                <div class="grid-details">
                    <div class="input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required pattern="[a-zA-z'-'\s]*">
                    </div>
                    <div class="input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required pattern="[a-zA-z'-'\s]*">
                    </div>
                </div>
                <div class="input">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="input">
                    <label>Phone</label>
                    <input type="phone" name="phone" placeholder="Phone Number" required pattern="[0-9]{10}">
                </div>
                <div class="grid-details">
                    <div class="input">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input">
                        <label>Confirm Password</label>
                        <input type="password" name="cpass" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="profile-img">
                    <div class="file-upload">
                        <input type="file" id="image-preview" name="image" class="file-inpt" required oninvalid="this.setCustomValidity('Select an Image')" oninput="this.setCustomValidity('')">
                        <i class="fas fa-user-edit"></i>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" Value="Register" class="button">
                </div>
            </form>
            <div class="link">Already signed up?<a href="login.php">Login Now</a></div>
        </div>
        <script src="js/register.js"></script>
    </body>
</html>