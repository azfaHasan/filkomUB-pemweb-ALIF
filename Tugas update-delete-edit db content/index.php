<?php
    include "service/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include "layout/header.html" ?>
    <div class="container py-3">

    <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th style="width: 200px;">Nama</th>
            <th style="width: 300px;">Email</th>
            <th style="width: 150px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $db->query("SELECT * FROM users");
        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td style="width: 200px; word-break: break-word;">
                <?= ($row["name"]) ?>
            </td>
            <td style="width: 300px; word-break: break-word;">
                <?= ($row["email"]) ?>
            </td>
            <td style="width: 150px;">
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kontak ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; else: ?>
        <tr>
            <td colspan="3" class="text-center">Belum ada data kontak.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>