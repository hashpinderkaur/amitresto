<?php
include 'config.php';

$id = $name = $price = "";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM menu WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $price = $row['price'];
        $image_path = $row['image_path'];
    } else {
        echo '<div class="alert alert-danger" role="alert">order not found!</div>';
        exit();
    }
} else {
    echo '<div class="alert alert-danger" role="alert">order ID not provided!</div>';
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // File upload handling
    $target_directory = "C:\xampp\htdocs\Amitresto\assets";
    $target_file = $target_directory . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $image_path = "images/" . basename($_FILES["image"]["name"]);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo '<div class="alert alert-success" role="alert">The file '. htmlspecialchars( basename( $_FILES["image"]["name"])). ' has been uploaded.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Sorry, there was an error uploading your file.</div>';
        exit();
    }

    $sql = "UPDATE orders SET name='$name', price='$price', image_path='$image_path' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert">order details updated successfully!</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating order details: ' . mysqli_error($conn) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="orderd">
                    <div class="orderd-header">
                        <h3 class="mb-0">Update order Details</h3>
                    </div>
                    <div class="orderd-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">order Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Update Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
