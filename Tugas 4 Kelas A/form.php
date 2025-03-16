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
        <form action="form.php" method="POST" enctype="multipart/form-data">
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
                <label for="profile-pic">Upload Foto Diri (jpg, jpeg, png) 500x500px</label><br>
                <input type="file" name="profile-pic" class="profile-pic" id="profile-pic" accept="image/*" required><br>
            </div>
            <div class="form-group">
                <br><label for="pendidikan">Riwayat Pendidikan: </label>
                <input type="text" name="pendidikan" class="form-control" id="pendidikan" required><br>
            </div>
            <input type="submit" name="submitForm" class="submitForm" value="Submit Form">
        </form>
    </div>
</body>
</html>
<?php
error_reporting(0);

    if(isset($_POST["submitForm"]))
    {
        if(!empty($_POST["name"]) && !empty($_POST["tempat-lahir"]) && !empty($_POST["pendidikan"]) && !empty($_POST["tanggal-lahir"]))
        {
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["tempat-lahir"] = $_POST["tempat-lahir"];
            $_SESSION["tanggal-lahir"] = $_POST["tanggal-lahir"];
            $_SESSION["pendidikan"] = $_POST["pendidikan"];

            if (!file_exists("uploads")) 
            {
                mkdir("uploads", 0777, true);
            }

            $target_dir ="uploads/";
            $maxWidth = 500;
            $maxHeight= 500;

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile-pic"])) 
            {
                $fileName = basename($_FILES["profile-pic"]["name"]);
                $targetFilePath = $target_dir . $fileName;
                $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            
                $allowedTypes = ["jpg", "jpeg", "png", "gif"];
                if (!in_array($fileType, $allowedTypes)) 
                {
                    echo "Format file tidak didukung.";
                    exit;
                }
            
                list($width, $height) = getimagesize($_FILES["profile-pic"]["tmp_name"]);
                if ($width > $maxWidth || $height > $maxHeight) 
                {
                    echo "Resolusi terlalu besar, Maksimal {$maxWidth}x{$maxHeight} px";
                    exit;
                }
            
                if (move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $targetFilePath)) 
                {
                    $_SESSION["profile-pic"] = $targetFilePath;
                    header("Location: cv.php");
                } 
                else 
                {
                    echo "gagal upload file";
                }
            }
        }
    }
?>
