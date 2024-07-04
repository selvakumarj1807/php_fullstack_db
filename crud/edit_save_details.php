<?php

require('db.php');

$id = $_POST['id'];
$student_name = $_POST["student_name"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];
$course = $_POST["course"];

// Get the existing image path from the hidden input
$existing_image_path = $_POST['existing_image_path'];

// Check if a new image is uploaded
if (!empty($_FILES['image']['name'])) {
    // New image selected, process the upload
    $sourcePath = $_FILES['image']['tmp_name'];
    $targetPath = "Upload/" . $_FILES['image']['name'];
    $filename = $_FILES['image']['name'];
    if (move_uploaded_file($sourcePath, $targetPath)) {
        $image = $filename;
    } else {
        // If the upload fails, retain the existing image
        $image = $existing_image_path;
    }
} else {
    // No new image selected, use the existing image path
    $image = $existing_image_path;
}

// Update the table
$sql = "UPDATE `details` SET `student_name`='{$student_name}', `phone`='{$phone}',
     `gender`='{$gender}', `image_path`='{$image}', `course`='{$course}' WHERE `student_id`='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Updated Successfully!');</script>";
    echo "<script type='text/javascript'>window.location.href = 'view_details.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>