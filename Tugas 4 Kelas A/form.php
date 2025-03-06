<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <form action="form.php" method="POST">
            <div class="form-group">
                <label for="name">Nama: </label>
                <input type="text" name="name" class="form-control" id="name" required><br>
            </div>
            <div class="form-group">
                <label for="ttl">Tempat Lahir: </label>
                <input type="text" name="tempat-lahir" class="form-control" id="tempat-lahir" required><br>
            </div>
            <div class="form-group">
                <label for="ttl">Tanggal Lahir: </label>
                <input type="date" name="tanggal-lahir" class="form-control" id="tanggal-lahir" required><br>
            </div>
            <div class="form-group">
                <label for="pendidikan">SMA: </label>
                <input type="text" name="pendidikan" class="form-control" id="pendidikan" required><br>
            </div>
            <input type="submit" name="submitForm" class="submitForm" value="Submit Form">
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST["submitForm"]))
    {
        if(!empty($_POST["name"]) && !empty($_POST["tempat-lahir"]) && !empty($_POST["pendidikan"]) && !empty($_POST["tanggal-lahir"]))
        {
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["tempat-lahir"] = $_POST["tempat-lahir"];
            $_SESSION["tanggal-lahir"] = $_POST["tanggal-lahir"];
            $_SESSION["pendidikan"] = $_POST["pendidikan"];

            header("Location: cv.php");
        }
    }
?>
