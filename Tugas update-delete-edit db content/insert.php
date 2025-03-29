<?php
    include "service/database.php";

    $register_message = "";

    if(isset($_POST["tambah"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];

        $sql = "INSERT INTO users (name, email)
        VALUES ('$name', '$email')";

        try
        {
            if($db->query($sql))
            {
                $register_message = "Contact Berhasil Ditambahkan!";
            }
            else
            {
                $register_message = "Contact Gagal Ditambahkan!";
            }
        }
        catch(mysqli_sql_exception)
        {
            $register_message = "Terjadi error!";
        }
        $db->close();
    
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light">
    <?php include "layout/header.html" ?>
    <form action="insert.php" method="POST">
        <div class="container py-3 border rounded p-4 bg-white shadow-sm" style="width: 300;">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Nama:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary mt-3" name="tambah">Tambah</button>
                    <h6><?= $register_message ?></h6>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>