<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
}
?>

<script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PBp</title>
    <link rel="stylesheet" type="text/CSS" href="Login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
            <form action="" method="POST" class="login-email">
                <label>Username</label><br>
                <input type="text" placeholder="Username" name="username" value="" require><br>
                <label>Password</label><br>
                <input type="password" placeholder="Password" name="password" value="" require><br>
                <button name="submit">Log in</button>
                <select class="custom_select">
                <option selected>Jenis Akun Anda</option>
                <option value="1">Member</option>
                <option value="2">Admin</option>
                </select>
                <?php 
                $username = array('Dhimas_Pram', 'User');
                $pass = array('QWERTY', 'user');
                if (isset($_POST['submit'])) {
                    if ($_POST['username'] == $username[0] && $_POST['password'] == $pass[0]){
                        $_SESSION["username"] = $username;
                        $_SESSION["priv"] = 'admin'; 
                        $_SESSION["nama"] = $_POST['nama'];
                        header("Location: ../");
                    }
                    elseif ($_POST['username'] == $username[1] && $_POST['password'] == $pass[1]){
                        $_SESSION["username"] = $username; 
                        $_SESSION["priv"] = 'user';
                        $_SESSION["nama"] = $_POST['nama'];
                        header("Location: ../");
                    }
                    else {
                        echo("<p class='login-register-text'>email atau password anda salah.</p>");
                    }
                }
                elseif (isset($_SESSION['username'])){
                    header("Location: ../");
                }
                ?>
            </form>
        <p>apakah anda belum mempunyai akun? <a href="Register.php" style="text-decoration:none">Daftar</a></p>    
    </div>
</body>
</html>