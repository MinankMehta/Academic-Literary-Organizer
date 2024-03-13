<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cardo&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <div class="logo_text">
                <div style="font-family: 'argue_demo'; font-size: 32px; color:white;">Academic Literary Organizer</div>
            </div>
        </div>
    </header>
    <section class="home">
        <div class="form_container">
            <div class="form login_form">
                <form method="POST" name="Logform" onsubmit="signup.php">
                    <h2>Sign Up</h2>
                    <div class="input_box">
                        <input type="email" name="email" placeholder="Enter your email" required />
                        <i class="uil uil-envelope-alt email"></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Enter your password" required />
                        <i class="uil uil-lock password"></i>
                    </div>
                    <div class="button_container">
                        <button class="signupbtn" type="submit">Submit</button>
                        <button class="loginbtn" onclick="location.href='login.php';">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
