<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        /* Responsive CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        input[type="number"],
        input[type="tel"],
        select,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .input-group label {
            margin-bottom: 5px;
        }

        .input-group input[type="radio"] {
            margin-right: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <h1><u>CRUD - Create, Read, Update, Delete</u></h1>

    <?php
    // Include the navbar.php file
    include 'navbar.php';
    ?>
    
    <center>
        <h1><u>Edit the Detail</u></h1>
    </center>

    <form role="form" action="edit_save_details.php" method="POST" enctype="multipart/form-data">

        <?php
        require('db.php');

        $slno = 0;

        $id = $_REQUEST["id"];

        $result = mysqli_query($conn, "SELECT * FROM details where student_id= '$id'");

        while ($row_result = mysqli_fetch_array($result)) {
            $slno++;
            $item_id = $row_result['student_id'];
            $student_name = $row_result['student_name'];
            $phone = $row_result['phone'];
            $gender = $row_result['gender'];
            $course = $row_result['course'];
            $image_path = $row_result['image_path'];
        ?>


            <input type="hidden" name="id" value="<?php echo $id; ?>" />

            <!-- Existing form fields -->
            <label for="student_name">Name</label>
            <input class="form-control" name="student_name" placeholder="Enter your name" value="<?php echo $student_name; ?>" required />

            <label for="phone">Mobile Number</label>
            <input class="form-control" name="phone" placeholder="Enter the mobile number" value="<?php echo $phone; ?>" required />

            <!-- Image display and upload -->
            <div class="input-wrap">
                <label for="image">Image</label>
                <?php if ($image_path) { ?>
                    <img src="Upload/<?php echo $image_path; ?>" alt="Student Image" style="max-width: 150px; margin-bottom: 10px;">
                <?php } ?>
                <input type="file" name="image" accept="image/jpeg">
                <input class="file-path validate" type="hidden" name="existing_image_path" value="<?php echo $image_path; ?>">
            </div>

            <!-- Gender input with radio buttons -->
            <div class="input-group">
                <label>Gender</label>
                <label><input type="radio" name="gender" value="male" <?php echo ($gender == 'male') ? 'checked' : ''; ?>> Male</label>
                <label><input type="radio" name="gender" value="female" <?php echo ($gender == 'female') ? 'checked' : ''; ?>> Female</label>
                <label><input type="radio" name="gender" value="other" <?php echo ($gender == 'other') ? 'checked' : ''; ?>> Other</label>
            </div>

            <!-- Course selection with select input -->
            <div class="input-group">
                <label for="course">Select Course</label>
                <select name="course" required>
                    <option value="Python" <?php echo ($course == 'Python') ? 'selected' : ''; ?>>Python</option>
                    <option value="PHP" <?php echo ($course == 'PHP') ? 'selected' : ''; ?>>PHP</option>
                    <option value="Angular" <?php echo ($course == 'Angular') ? 'selected' : ''; ?>>Angular</option>
                    <option value="Reatct" <?php echo ($course == 'Reatct') ? 'selected' : ''; ?>>Reatct</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        <?php
        }
        ?>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>