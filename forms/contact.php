<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kumarajay@gmail.com"; // Replace with your email
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    // Error Handling
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($subject)) {
        $errors[] = "Subject is required.";
    }
    if (empty($message)) {
        $errors[] = "Message cannot be empty.";
    }

    // Show errors if any
    if (!empty($errors)) {
        echo "<span class='text-danger'>" . implode("<br>", $errors) . "</span>";
        exit;
    }

    // Email Headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Try sending email and print error if it fails
    if (mail($to, $subject, $body, $headers)) {
        echo "<span class='text-success'>Message sent successfully!</span>";
    } else {
        error_log("Mail sending failed to $to.");
        echo "<span class='text-danger'>Failed to send message. Server error.</span>";
    }
} else {
    echo "<span class='text-danger'>Invalid request.</span>";
}
?>
