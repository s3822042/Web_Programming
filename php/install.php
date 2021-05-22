<?php
    // check session status and start session 
	if ( empty(session_id()) ) session_start();

    function encrypt_decrypt($string, $action = 'encrypt')
    {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
        $secret_iv = '5fgf5HJ5g27'; // user define secret key
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    if (isset($_POST['username']) && isset($_POST['password_retype'])) {
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $pwd = encrypt_decrypt($pwd, 'encrypt');
        $fp = fopen('data.txt', 'w');
        fwrite($fp, $username);
        fwrite($fp, "\n");
        fwrite($fp, $pwd);
        fclose($fp);
        exit("Admin account created successfully! You can now close this tab!");
    }
?>

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

</html>