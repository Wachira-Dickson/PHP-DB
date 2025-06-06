<?php
if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $color = $_POST['color'];
    if (empty($first_name) || empty($last_name) || empty($email) || empty($color)) {
        echo "All fields are required.";
    } else {
        include 'connect.php'; // Include the database connection file

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, color) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $color);

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>