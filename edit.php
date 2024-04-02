<?php
    session_start();

    include("configure.php");
    if(!isset($_SESSION['valid'])){
        header("Location: Login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="Home.php">META WORKFORCE</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php" class="btn">Log Out</a>
                <!-- style="background:gray;" -->
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php 
            if(isset($_POST['submit'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $contact = $_POST['contact'];
                $address = $_POST['address'];
                $id = $_SESSION['id'];

                $edit_query = mysqli_query($conn, "UPDATE users SET Firstname = '$firstname',Lastname = '$lastname',Username = '$username', Email = '$email', Age = '$age', Contact = '$contact', Address = '$address' WHERE Id = '$id'") or die("Error Occured");
                // $result = mysqli_query($conn, $query) or die("Update Error");

                 if($edit_query){
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                    </div><br>";
                    echo"<a href='Home.php'><button class='btn'> Go Home</button>";
                } 

                }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($conn,"SELECT*FROM users WHERE Id='$id'");

                while($result = mysqli_fetch_assoc($query)){
                    
                    $res_Fname = $result['Firstname'];
                    $res_Lname = $result['Lastname'];
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Age = $result['Age'];
                    $res_Contact = $result['Contact'];
                    $res_Address = $result['Address'];
                
                }
                
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo $res_Fname ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $res_Lname ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age ?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="contact">Contact</label>
                    <input type="number" name="contact" id="contact" value="<?php echo $res_Contact?>" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $res_Address ?>" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            
            </form>
            
        </div>
        <?php }?>
    </div>
</body>
</html>