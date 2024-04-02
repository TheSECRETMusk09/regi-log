<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">

        <?php
        include ("configure.php");
        if(isset($_POST['submit'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $password = $_POST['password'];

            //verify the unque emailz
            $verify_query = mysqli_query($conn,"SELECT Email FROM users WHERE Email ='$email'");    

            if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                    <p>This email is already used, try another email!</p>
                    </div><br>";
            echo"<a href='javascript:self.history.back()'><button class='btn'> Go Back</button>";
            }    
            else {
            mysqli_query($conn, "INSERT INTO users(Firstname, Lastname, Username, Email, Age, Contact, Address, Password) VALUES( '$firstname','$lastname','$username','$email','$age','$contact','$address','$password')") or die("Error Occured");
                
            echo "<div class='message'>
                    <p>Registration Successfully!</p>
                    </div><br>";
            echo"<a href='Login.php'><button class='btn'>Login Now</button>";
            }

        }else{

        ?>

            <header>Sign up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" autocomplete="on" required>
                </div>
                <div class="field input">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" autocomplete="on" required>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="on" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="on" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="contact">Contact</label>
                    <input type="tel" name="contact" id="contact" autocomplete="on" required>
                </div>
                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="on" required>
                </div>
                <div class="field input"> 
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" autocomplete="off" required>                   
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>

                <div class="links"></div>
                    Already a member? <a href="Login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>