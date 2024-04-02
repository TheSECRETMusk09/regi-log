<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login </title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        <?php
          
          include("configure.php");
          if(isset($_POST['submit'])){
            
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $result = mysqli_query($conn," SELECT * FROM users WHERE Email = '$email' AND Password = '$password'") or die("Select Error");
            $row = mysqli_fetch_array($result);
            
            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['firstname'] = $row['Firstname'];
                $_SESSION['lastname'] = $row['Lastname'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['age'] = $row['Age'];
                $_SESSION['Contact'] = $row['Contact'];
                $_SESSION['address'] = $row['Address'];
                $_SESSION['id'] = $row['Id'];

                header("Location: Home.php");
                exit; // Add exit after header redirect to stop further execution
            } else {
                echo "<div class='message'>
                    <p>Wrong Username or Password!</p>
                    </div><br>";
                echo "<a href='Login.php'><button class='btn'> Go Back</button>";
            }    

          }
        ?>
            <header>Login </header>
            <form action="" method="post">
                <div class="field input">
                    
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="on" required>
                </div>
                <div class="field input">
                     <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>                   
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
                <div class="links"></div>
                Don't have an account? <a href="register.php">Sign Up Now</a>
                
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
