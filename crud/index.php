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

    <form role="form" action="save_details.php" method="POST" enctype="multipart/form-data">
        <!-- Existing form fields -->
        <label for="student_name">Name</label>
        <input class="form-control" name="student_name" placeholder="Enter your name" />


        <label for="phone">Mobile Number</label>
        <input class="form-control" name="phone" placeholder="Enter the mobile number" />



        <div class="input-wrap">
            <label for="image">Image</label>
            <input type="file" name="image" accept="image/jpeg" required>
            <input class="file-path validate" type="hidden" placeholder="Choose your profile image">
        </div>


        <!-- Gender input with radio buttons -->
        <div class="input-group">
            <label>Gender</label>
            <label><input type="radio" name="gender" value="male" required> Male</label>
            <label><input type="radio" name="gender" value="female" required> Female</label>
            <label><input type="radio" name="gender" value="other" required> Other</label>
        </div>


        <!-- Course selection with select input -->
        <div class="input-group">
            <label for="course">Select Course</label>
            <select name="course" required>
                <option value="Python">Python</option>
                <option value="PHP">PHP</option>
                <option value="Angular">Angular</option>
                <option value="Reatct">Reatct</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>