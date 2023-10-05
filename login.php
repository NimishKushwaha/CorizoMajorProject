<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header("Location: index.html"); 
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'your_username' && $password === 'your_password') {
       
        $_SESSION['user_id'] = 1; 
        header("Location: index.html"); 
        exit();
    } else {
        $error_message = "Invalid username or password"; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - EchoSphere</title>
</head>
<body>
    <div class="container">
        <h2 class="logo">EchoSphere</h2>
        <div class="sign-in-form">
            <h3>Sign In</h3>
            <?php if (isset($error_message)) { ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php } ?>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign In</button>
            </form>
            <p>Don't have an account? <a href="signup.html">Sign up</a></p>
        </div>
    </div>
</body>
</html>
