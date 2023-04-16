<div class="container">
    <h1><?= $title ?></h1>

    <?php include_once("resources/_form.php") ?>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Parent Resource</title>
</head>
<body>
    <?php
    // Include database connection
    include('connect.php');
    
    // Retrieve parent resource data from database
    $id = $_GET['id'];
    $query = "SELECT * FROM parent_resources WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>
    <h1>Edit Parent Resource</h1>
    <form action="edit.php?id=<?php echo $row['id']; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    if(isset($_POST['submit'])) {
        // Retrieve form data
        $name = $_POST['name'];
        
        // Update parent resource data in database
        $query = "UPDATE parent_resources SET name = '$name' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect to show.php page with success message
            header("Location: show.php?id=$id&message=success");
            exit();
        } else {
            // Display error message
            echo "Error updating parent resource: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
In the above code, we retrieve the ID of the parent resource to be edited from the URL parameter using $_GET['id']. We then fetch the current data of the parent resource from the database and display it in a form for editing. When the form is submitted, we retrieve the updated data from the form using $_POST and update the parent resource data in the database using an SQL UPDATE query. If the update is successful, we redirect to the show.php page with a success message. Otherwise, we display an error message with the specific error from MySQL.

Note: Make sure to sanitize and validate user inputs to prevent SQL injection and other security vulnerabilities. Also, update the database connection details in the config.php file with your own database credentials.






