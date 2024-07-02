<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $course = htmlspecialchars($_POST['course']);
    $fees = htmlspecialchars($_POST['fees']);
    $date = htmlspecialchars($_POST['date']);
    $duration = htmlspecialchars($_POST['duration']);
    $demo = htmlspecialchars($_POST['demo']);
    $message = htmlspecialchars($_POST['message']);

    $to = "dineshkumarpdk33@gmail.com";  // Replace with your email address
    $subject = "New Placement Application from $name";
    $body = "
    Name: $name\n
    Email: $email\n
    Phone: $phone\n
    Course: $course\n
    Fees: $fees\n
    Date of Joining: $date\n
    Duration: $duration\n
    Demo Submitted: $demo\n
    Message: $message\n
    ";

    // Handle file upload
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $cv = $_FILES['cv'];
        $cv_path = "uploads/" . basename($cv["name"]);
        move_uploaded_file($cv["tmp_name"], $cv_path);
        $body .= "\nCV: $cv_path\n";
    }

    $headers = "From: webmaster@example.com";  // Replace with your desired sender email address

    if (mail($to, $subject, $body, $headers)) {
        echo "Application submitted successfully.";
    } else {
        echo "There was an error submitting your application. Please try again.";
    }
}
?>
