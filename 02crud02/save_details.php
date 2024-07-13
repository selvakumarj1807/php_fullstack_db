<?php

require('db.php');


$student_name = $_POST["student_name"];

$phone = $_POST["phone"];

$gender = $_POST["gender"];

$course = $_POST["course"];


// Image - path

$sourcePath = $_FILES['image']['tmp_name'];
$targetPath = "Upload/" . $_FILES['image']['name'];
$filename = $_FILES['image']['name'];
if (move_uploaded_file($sourcePath, $targetPath)) {
    $image = $filename;
}


// Insert Into the Table

$sql = "INSERT INTO `details`(`student_name`, `phone`, `gender`, `image_path`, `course`)
VALUES ('$student_name', '$phone', '$gender', '$image', '$course')";

if ($conn->query($sql) == TRUE) {
    echo "<script>alert('Added  Successfully!');</script>";
    echo "<script type='text/javascript'>window.location.href = 'view_details.php';</script>";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
