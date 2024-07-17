<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Upload foto
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Generate a unique file name
        $unique_file_name = uniqid() . '.' . $imageFileType;
        $target_file = $target_dir . $unique_file_name;

        // Check if file is an actual image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                // Update foto path in the database
                $query = "UPDATE tamu SET foto = ? WHERE id = ?";
                $stmt = mysqli_prepare($koneksi, $query);
                mysqli_stmt_bind_param($stmt, "si", $target_file, $id);

                if (mysqli_stmt_execute($stmt)) {
                    header("Location: ../tamu/profile.php");
                    exit;
                } else {
                    echo "Error updating record: " . mysqli_error($koneksi);
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File is not an image.";
        }
    }
}

mysqli_close($koneksi);
