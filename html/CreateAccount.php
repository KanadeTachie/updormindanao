<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Forms.css">
    
    <title>Create Account</title>
</head>
<body>
    <div main-container>
        <img src="../images/Forms/UPMin_EBL.jpg" alt="">
        <div class="logo-container">
            <a href="">
                <img src="../images/Forms/logo-no-background.png" alt="">
            </a>
        </div>
        <div class="container-sm" id="create-container">
            <h1 class="display-2 fw-bold">
                CREATE AN<br>ACCOUNT
            </h1>
        </div>
        <div class="form-container">
            <div class="title-container">
                <h1>Create an Account</h1>
            </div>
            <form class="container-fluid" method="post" action="" name="signupform">
                <div class="row">
                    <div class="col">
                        <label for="">First name</label>
                      <input type="text" class="form-control" placeholder="First name" name="fname" required>
                    </div>
                    <div class="col">
                        <label for="">Last name</label>
                      <input type="text" class="form-control" placeholder="Last name" name="lname" required>
                    </div>
                </div>
                <div class="form-group py-3">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="useremail"placeholder="Enter email" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="inputPassword5">Password</label>
                    <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="userpassword" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                      Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    </small>
                </div>
                <div class="form-check py-3">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                  <label class="form-check-label" for="exampleCheck1">Agree to send data</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="signupform">Create Account</button>
            </form>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dormindanao";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{echo "Connected!";}

if(isset($_POST['signupform'])){
    $userfirstname = $_POST['fname'];
    $userlastname = $_POST['lname'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];

    $sql = "SELECT userEmail FROM accounts WHERE userEmail = '$useremail'";
    $result = mysqli_query($conn,$sql);
    if ($result && mysqli_num_rows($result) > 0){
        echo "Account already exists!";
    }
    else {
        $sql = "INSERT INTO accounts (userFirstName, userLastName, userEmail, userPassword) 
        VALUES ('$userfirstname', '$userlastname', '$useremail', '$userpassword')";
        if(mysqli_query($conn,$sql)) {
            echo "Account Created!";
        }
        else {
            echo "Error! Account not created!";
        };
    }
    }
mysqli_close($conn);
?>
</html>