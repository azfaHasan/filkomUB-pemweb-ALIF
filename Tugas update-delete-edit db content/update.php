<?php
include "service/database.php";

if (isset($_POST["update"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $id = $_POST["id"];

    $stmt = $db->prepare("UPDATE users SET name=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $email, $id);
    $stmt->execute();
}

header("Location: index.php");
?>
