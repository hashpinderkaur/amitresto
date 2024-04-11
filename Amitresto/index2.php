<?php
// Connect to the database
$servername = "127.0.0.1"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "amitresto"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Edit
if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $calories = $_POST['calories'];
    $price = $_POST['price'];

    $sql = "UPDATE menu SET name='$name', description='$description', calories='$calories', price='$price' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle Delete
if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM menu WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch menu items from the database
$sql = "SELECT * FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Calories</th>
                <th>Price</th>
                <th>Action</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <form method='post'>
                    <td>".$row["id"]."</td>
                    <td><input type='text' name='name' value='".$row["name"]."'></td>
                    <td><input type='text' name='description' value='".$row["description"]."'></td>
                    <td><input type='text' name='calories' value='".$row["calories"]."'></td>
                    <td><input type='text' name='price' value='".$row["price"]."'></td>
                    <input type='hidden' name='id' value='".$row["id"]."'>
                    <td>
                    <button type='submit' name='view'>view</button>
                        <button type='submit' name='edit'>Edit</button>
                        <button type='submit' name='delete'>Delete</button>
                    </td>
                </form>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
