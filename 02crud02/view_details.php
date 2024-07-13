<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h3 {
            text-align: center;
            margin-top: 20px;
        }

        .table-responsive {
            margin: 20px;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .img-responsive {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .text-center a {
            text-decoration: none;
        }

        .text-center a:hover {
            color: #0056b3;
        }

        .edit-icon {
            color: green;
            margin-right: 10px;
        }

        .delete-icon {
            color: red;
        }

        .actions a {
            margin: 0 5px;
            /* Add some spacing between icons */
        }
    </style>
</head>

<body>

    <?php
    // Include the navbar.php file
    include 'navbar.php';
    ?>

    <section>
        <h3>
            Form Details List
        </h3>

        <div class="table-responsive">
            <table class="table table-bordered border-primary">
                <thead class="table-primary">
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Mobile Number</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Select Course</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require('db.php');

                    $slno = 0;

                    $result = mysqli_query($conn, "SELECT * FROM details");

                    while ($row_result = mysqli_fetch_array($result)) {
                        $slno++;
                        $item_id = $row_result['student_id'];
                        $student_name = $row_result['student_name'];
                        $phone = $row_result['phone'];
                        $gender = $row_result['gender'];
                        $course = $row_result['course'];
                        $image_path = $row_result['image_path'];
                    ?>

                        <tr>
                            <td><?php echo $slno; ?></td>
                            <td><?php echo $student_name; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><img class="img-responsive" width="40" height="55" src="Upload/<?php echo $image_path; ?>" /></td>
                            <td><?php echo $course; ?></td>
                            <td class="text-center actions">
                                <a href="edit_detail.php?id=<?php echo $item_id; ?>" class="edit-icon">Edit&nbsp;&nbsp;<i class="fas fa-edit"></i></a>
                                <a href="remove_detail.php?id=<?php echo $item_id; ?>" class="delete-icon">Remove&nbsp;&nbsp;<i class="fas fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>