<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $registrationLink = "https://bit.ly/3Nbp5GF";

    // Create a string with the form data
    $data_message = "First Name: $first_name\nLast Name: $last_name\nEmail: $email\nPhone: $phone";

    // Set the recipient email address for form data
    $to_data = "elitetechtraining9@gmail.com";  // Replace with the actual email address

    // Set the subject for form data email
    $subject_data = "New Form Submission";

    // Set additional headers for form data email
    $headers_data = "From: info@elitetechtraining.com\r\n";
    $headers_data .= "Content-type: text/plain; charset=UTF-8";

    // Send the form data email
    mail($to_data, $subject_data, $data_message, $headers_data);

    // Customize the welcome email content
    $welcome_message = "Dear $first_name,\n\n"
        . "Thank you for taking the first step towards advancing your career with Elite Tech Training's IT Business Analyst bootcamp!\n\n"
        . "Your registration marks the beginning of an exciting journey into the world of business analysis and IT expertise. \n\n"
        . "We're thrilled to have you join our program and look forward to providing you with top-notch training, industry insights, and a supportive learning environment.\n\n"
        . "Should you have any questions or require further assistance, please don't hesitate to reach out. We're here to ensure your experience with Elite Tech Training exceeds your expectations.\n\n"
        . "Thank you once again for choosing Elite Tech Training for your professional development. We can't wait to embark on this educational journey with you!\n\n"
        . "Best regards,\n\n"
        . "The Elite Tech Training Team";

    // Set the recipient email address for the welcome email
    $to_welcome = $email;

    // Set the subject for the welcome email
    $subject_welcome = "Welcome to Elite Tech Training's IT Business Analyst Bootcamp";

    // Set additional headers for the welcome email
    $headers_welcome = "From: info@elitetechtraining.com\r\n";
    $headers_welcome .= "Content-type: text/plain; charset=UTF-8";

    // Additional settings for cPanel's SMTP
    ini_set("SMTP", "mail@elitetechtraining.com");
    ini_set("smtp_port", "465");
    ini_set("sendmail_from", "info@elitetechtraining.com");

    // Send the welcome email
    mail($to_welcome, $subject_welcome, $welcome_message, $headers_welcome);

    // Save the data to a text file (optional)
    $file_path = "form_data.txt";
    $data = "$first_name, $last_name, $email, $phone\n";
    file_put_contents($file_path, $data, FILE_APPEND);

    header("Location: https://elitetechtraining.mia-share.com/apply/programs?program_group=1090");
    exit();
}
?>
