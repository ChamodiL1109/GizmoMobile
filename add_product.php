<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $image_name = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    $upload_dir = "uploads/";

    if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
        $sql = "INSERT INTO products (name, price, description, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdss", $name, $price, $description, $image_name);

        if ($stmt->execute()) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Image upload failed.";
    }

    $conn->close();
}
?>

<h2>Add New Product</h2>
<form method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br><br>
    Price: <input type="number" step="0.01" name="price" required><br><br>
    Description: <textarea name="description" required></textarea><br><br>
    Image: <input type="file" name="image" accept="image/*" required><br><br>
    <button type="submit">Add Product</button>
</form>
