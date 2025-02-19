<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kumarajay@gmail.com"; // Replace with your real email
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "<span class='text-success'>Message sent successfully!</span>";
    } else {
        echo "<span class='text-danger'>Failed to send message. Try again.</span>";
    }
} else {
    echo "<span class='text-danger'>Invalid request.</span>";
}
?>
