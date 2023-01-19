<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <form action="scripts.php" id="form" method="POST">
            <h2 class="text-center purple-color border-bottom">Login to your account</h2>
            
            <div class="form-control">
                <label>Email</label>
                <input type="email" name="email" placeholder="Please enter your email">
            </div>
            <div class="form-control">
                <label>Password</label>
                <input type="password" name="pwd" placeholder="Please enter your password">
            </div>
            <input type="submit" value="Sign In" name="signin" id="submit-btn">
            <p class="text-center info-text">You don't have an account? <a href="signup.php" class="anchor-style">Sign up here</a></p>
        </form>
    </div>
</body>
</html>