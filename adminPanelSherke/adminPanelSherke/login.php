<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
session_start();
require("class/DAL.class.php");
$dal = new DAL();
$error = '';
$done = 'True';
$passError = '';
$userError = '';
$showSignupForm = False;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['address'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $passwordRestriction = $_POST['password'];
        $sql_customer = "SELECT UserName from customers WHERE UserName = ?";
        $params = array($username);
        $result = $dal->data($sql_customer, $params);
        if ($result && count($result) > 0) {
            $userError = 'Username already exists.';
            $done = 'False';
            $showSignupForm = True;
        }
        if (strlen($passwordRestriction) < 8 || !preg_match("/[A-Za-z]/", $passwordRestriction) || !preg_match("/[0-9]/", $passwordRestriction)) {
            $passError = 'Password must be at least 8 mixed elements ';
            $done = 'False';
            $showSignupForm = True;
        }
        if ($done == 'True') {
            $sql = "INSERT INTO customers (UserName, Password,Email,Address) 
            VALUES ('$username', '$password','$email','$address')";
            $dal->execute($sql);
            $showSignupForm = False;
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Signup Successful!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href='login.php';
                });
            });
        </script>";
        }
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Retrieve the hashed password from the database based on the username
        $sql_employee = "SELECT user_type, password FROM employee WHERE username = ?";
        $sql_customer = "SELECT user_type, Password FROM customers WHERE UserName = ?";
        $params = array($username);

        // Check employee table first
        $result = $dal->data($sql_employee, $params);
        if ($result && count($result) > 0) {
            $storedPasswordHash = $result[0]['password'];
            $user_type = $result[0]['user_type'];

            // Verify the user-provided password against the stored hash
            if (password_verify($password, $storedPasswordHash)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $user_type;
                $_SESSION['login'] = true;

                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href='index.php';
                    });
                });
            </script>";
                exit; // Exit to prevent further execution
            }
        }

        // If not found in employee table, check customers table
        $result1 = $dal->data($sql_customer, $params);
        if ($result1 && count($result1) > 0) {
            $storedPasswordHash = $result1[0]['Password'];
            $user_type = $result1[0]['user_type'];

            // Verify the user-provided password against the stored hash
            if (password_verify($password, $storedPasswordHash)) {
                $_SESSION['username'] = $username;
                $_SESSION['user_type'] = $user_type;
                $_SESSION['login'] = true;

                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href='http://localhost/aviato-bootstrap-main/theme/';
                    });
                });
            </script>";
                exit; // Exit to prevent further execution
            }
        }

        // If neither employee nor customer found, set error message
        $error = 'Invalid UserName or Password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        ::selection {
            background: #333333;
            color: #fff;
        }

        .wrapper {
            overflow: hidden;
            max-width: 390px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(255, 255, 255, 0.1);
        }

        .wrapper .title-text {
            display: flex;
            width: 200%;
        }

        .wrapper .title {
            width: 50%;
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .wrapper .slide-controls {
            position: relative;
            display: flex;
            height: 50px;
            width: 100%;
            overflow: hidden;
            margin: 30px 0 10px 0;
            justify-content: space-between;
            border: 1px solid lightgrey;
            border-radius: 15px;
        }

        .slide-controls .slide {
            height: 100%;
            width: 100%;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-align: center;
            line-height: 48px;
            cursor: pointer;
            z-index: 1;
            transition: all 0.6s ease;
        }

        .slide-controls label.signup {
            color: #000;
        }

        .slide-controls .slider-tab {
            position: absolute;
            height: 100%;
            width: 50%;
            left: 0;
            z-index: 0;
            border-radius: 15px;
            background: linear-gradient(to right, #808080, #666666, #4d4d4d, #333333);
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        input[type="radio"] {
            display: none;
        }

        #signup:checked~.slider-tab {
            left: 50%;
        }

        #signup:checked~label.signup {
            color: #fff;
            cursor: default;
            user-select: none;
        }

        #signup:checked~label.login {
            color: #000;
        }

        #login:checked~label.signup {
            color: #000;
        }

        #login:checked~label.login {
            cursor: default;
            user-select: none;
        }

        .wrapper .form-container {
            width: 100%;
            overflow: hidden;
        }

        .form-container .form-inner {
            display: flex;
            width: 200%;
        }

        .form-container .form-inner form {
            width: 50%;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .form-inner form .field {
            height: 50px;
            width: 100%;
            margin-top: 20px;
        }

        .form-inner form .field input {
            height: 100%;
            width: 100%;
            outline: none;
            padding-left: 15px;
            border-radius: 15px;
            border: 1px solid lightgrey;
            border-bottom-width: 2px;
            font-size: 17px;
            transition: all 0.3s ease;
        }

        .form-inner form .field input:focus {
            border-color: #a9a9a9;
            box-shadow: 0px 4px 6px gray;

            /* box-shadow: inset 0 0 3px #fb6aae; */
        }

        .form-inner form .field input::placeholder {
            color: #999;
            transition: all 0.3s ease;
        }

        form .field input:focus::placeholder {
            color: #333333;
        }

        .form-inner form .pass-link {
            margin-top: 5px;
        }

        .form-inner form .signup-link {
            text-align: center;
            margin-top: 30px;
        }

        .form-inner form .pass-link a,
        .form-inner form .signup-link a {
            color: #666666;
            text-decoration: none;
        }

        .form-inner form .pass-link a:hover,
        .form-inner form .signup-link a:hover {
            text-decoration: underline;
        }

        form .btn {
            height: 50px;
            width: 100%;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
        }

        form .btn .btn-layer {
            height: 100%;
            width: 300%;
            position: absolute;
            left: -100%;
            background: linear-gradient(to right, #555555, #666666, #777777, #888888);
            border-radius: 15px;
            transition: all 0.4s ease;
            ;
        }

        form .btn:hover .btn-layer {
            left: 0;
        }

        form .btn input[type="submit"] {
            height: 100%;
            width: 100%;
            z-index: 1;
            position: relative;
            background: none;
            border: none;
            color: #fff;
            padding-left: 0;
            border-radius: 15px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
        }

        .errorText {
            font-size: small;
            margin-left: 4px;
            margin-top: 2px;
            color: rgb(251, 30, 30);
        }

        .errorSignup {
            font-size: x-small;
            margin-left: 4px;


            color: rgb(251, 30, 30);
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="#" class="login" method="post">
                    <div class="field">
                        <input type="text" placeholder="User Name" name="username" required>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <p class="errorText"> <?php echo $error ?> </p>
                    <div class="pass-link"><a href="">Forgot password?</a></div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input value="Login" type="submit">
                    </div>
                    <div class="signup-link">Not a member? <a href="">Signup now</a></div>
                </form>
                <form action="#" class="signup" method="post">
                    <div class="field">
                        <input type="text" placeholder="User Name" name="username" required>
                        <p class="errorSignup"> <?php echo $userError ?> </p>
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" required name="password">
                        <p class="errorSignup"> <?php echo $passError ?> </p>
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Email Address" required name="email">
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Address" required name="address">
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input value="Signup" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>
<script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    const passLink = document.querySelector("form .pass-link a");

    signupBtn.onclick = (() => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
        signupBtn.click();
        return false;
    });
    passLink.onclick = (() => {
        signupBtn.click();
        return false;
    });
    <?php if ($showSignupForm) : ?>
        signupBtn.click();
    <?php endif; ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>

</html>