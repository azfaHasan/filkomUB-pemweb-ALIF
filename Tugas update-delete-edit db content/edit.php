<?php
include "service/database.php";

$id = $_GET["id"];
$result = $db->query("SELECT * FROM users WHERE id=$id");

if ($result->num_rows == 0) {
    echo "Kontak tidak ditemukan.";
    exit;
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4">Edit Kontak</h2>

    <form action="update.php" method="POST" class="border rounded p-4 bg-white shadow-sm">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label for="name" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
        </div>

        <div class="d-flex content-start">
            <div class="row">
                <div class="col">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>
