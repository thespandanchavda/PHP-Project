<!DOCTYPE html>
<html>
<head>
    <title>Add New Parent Resource</title>
</head>
<body>
    <h1>Add New Parent Resource</h1>
    <form action="create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if(isset($_POST['submit'])) {
        // Include database connection
        include('connect.php');
        
        // Retrieve form data
        $name = $_POST['name'];
        
        // Insert new parent resource into database
        $query = "INSERT INTO parent_resources (name) VALUES ('$name')";
        mysqli_query($conn, $query);
        
        // Redirect to index page after successful creation
        header("Location: index.php");
    }
    ?>
</body>
</html>
