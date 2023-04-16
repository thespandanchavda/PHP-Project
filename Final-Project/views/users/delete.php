<?php
// Include database connection
include('connect.php');

// Retrieve parent resource ID from URL parameter
$id = $_GET['id'];

// Delete parent resource from database
$query = "DELETE FROM parent_resources WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    // Redirect to index.php page with success message
    header("Location: index.php?message=success");
    exit();
} else {
    // Display error message
    echo "Error deleting parent resource: " . mysqli_error($conn);
}
?>
