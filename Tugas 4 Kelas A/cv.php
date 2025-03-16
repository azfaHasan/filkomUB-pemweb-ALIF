<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curriculum Vitae</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <form action="cv.php" method="POST">
            <div id="welcome">
                <?php echo "Selamat datang, {$_SESSION["name"]}";?>
            </div>
            <div class="isi">
                <?php 
                    $profileImage = isset($_SESSION["profile-pic"]) ? $_SESSION["profile-pic"] : "images/default-profile.jpg";
                ?>
                <img src="<?php echo $profileImage; ?>" alt="Foto Profil" class="profile-img">
            </div>
            <div class="isi">
                <label for="">Email:</label><br>
                <?php echo $_SESSION["email"] ?>
            </div>
            <div class="isi">
                <label for="">Tempat, Tanggal Lahir:</label><br>
                <?php echo "{$_SESSION["tempat-lahir"]}, {$_SESSION["tanggal-lahir"]}" ?>
            </div>
            <div class="isi">
                <label for="">Riwayat Pendidikan:</label><br>
                <?php echo $_SESSION["pendidikan"] ?>
            </div>
            <input type="submit" name="logout" class="logout" value="logout">
        </form> 
    </div>
</body>
</html>
<?php 
    if(isset($_POST["logout"]))
    {
        session_destroy();
        header("Location: login.php");
    }
?>