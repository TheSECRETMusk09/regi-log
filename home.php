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
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="Home.php">META WORKFORCE</a></p>
        </div>

        <div class="right-links">
        <?php
            
        $id =$_SESSION['id'];
        $query = mysqli_query($conn,"SELECT*FROM users WHERE Id='$id'");

        while($result = mysqli_fetch_assoc($query)){
            $res_Fname = $result['Firstname'];
            $res_Lname = $result['Lastname'];
            $res_Uname = $result['Username'];
            $res_Email = $result['Email'];
            $res_Age = $result['Age'];
            $res_id = $result['Id'];
            $res_Contact = $result['Contact'];
            $res_Address = $result['Address'];


        }
        echo "<a href='edit.php?id=$res_id'>Change Profile</a>";
        ?>  

            <a href="logout.php" class="btn">Log Out</a>
        </div>
    </div>
    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello! Good day <b><?php echo $res_Uname ?></b>, Welcome to our company and we are glad to see you.</p>
                </div>
            
                <div class="box">
                    <p>Your Email is <b><?php echo $res_Email ?></b></p>
                </div>
            </div>
            
            <div class="bottom">
                
                <div class="box">
                    <p>Name: <b><?php echo $res_Fname ?> <?php echo $res_Lname ?></b></p>
                </div>

            
            
            
            
            <div class="bottom">   
                <div class="box">
                    
                    <p>Age: <b><?php echo $res_Age ?></b> Years Old.</p>
                </div>
            </div>   
            <div class="bottom">      
                <div class="box">
                    <p>Contact number: <b><?php echo $res_Contact ?></b></p>
                </div>
            </div>
            <div class="bottom">   
                <div class="box">
                    <p>Address: <b><?php echo $res_Address ?></b> </p>
                </div> 
            </div>    
            </div>  
        </div>

    </main>
</body>
</html>