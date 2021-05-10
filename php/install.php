<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register admin account</title>


    <style>
        .form-container {
            width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            vertical-align: middle;
        }

        .form-container .title {
            text-align: center;
            margin: 0px;
            padding: 0px;
        }

        .form-container .form-control {
            position: relative;
            margin: 50px 0;
            display: flex;
            justify-content: center;
        }

        form {
            width: 80%;
            margin: 0 auto;
        }

        label,
        input {
            display: inline-block;
        }

        label {
            width: 30%;
            text-align: left;
        }

        label+input {
            width: 50%;
        }

        input+input {
            float: right;
        }

        button {
            width: 80%;
            border-radius: 0.125rem;
            margin-bottom: 1.875rem;
            cursor: pointer;
            color: #000;
        }
    </style>
</head>

<body>
    <form method="post" class="form-container">
        <h1 class="title">Create admin account</h1>
        <div class="form-control">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" />
        </div>
        <div class="form-control">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" />
        </div>
        <div class="form-control">
            <label for="password_retype">Retype Password</label>
            <input id="password_retype" type="password" name="password_retype" />
        </div>
        <div class="form-control">
            <button class="button" type="submit" onclick="displayTest()">Register</button>
        </div>
    </form>
</body>
<script>
    function displayTest() {
        var pwd = document.getElementById("password").value;
        var pwd_retype = document.getElementById("password_retype").value;
        if (pwd != pwd_retype) alert("Password do not match");
    }
</script>
<?php
if (isset($_POST['username']) && isset($_POST['password_retype'])) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $pwd = password_hash($pwd, PASSWORD_BCRYPT);
    $fp = fopen('data.txt', 'w');
    fwrite($fp, $username);
    fwrite($fp, "\n");
    fwrite($fp, $pwd);
    fclose($fp);
}
?>

</html>