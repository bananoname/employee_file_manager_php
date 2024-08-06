<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Your File</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES['file'])) {
                $employee_archive_dir = 'employee_archive/';
                $upload_file = $employee_archive_dir . basename($_FILES['file']['name']);

                // Tạo thư mục employee_archive nếu chưa tồn tại
                if (!file_exists($employee_archive_dir)) {
                    mkdir($employee_archive_dir, 0777, true);
                }

                // Di chuyển file được upload tới thư mục employee_archive
                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                    echo "<p>File successfully uploaded.</p>";
                } else {
                    echo "<p>Failed to upload file.</p>";
                }
            }
        }
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" value="Upload" />
        </form>
    </div>
</body>
</html>
