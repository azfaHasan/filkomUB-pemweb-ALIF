<?php
include "service/database.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $db->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: index.php");
?>
