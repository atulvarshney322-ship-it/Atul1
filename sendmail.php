<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';     // Gmail SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'atulvarshney5577@gmail.com';  // 🔴 your Gmail address
        $mail->Password   = 'Atulvarshney@5577#';     // 🔴 App Password from Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender & Recipient
        $mail->setFrom($email, $phoneno);
        $mail->addAddress('atulvarshney5577@gmail.com', 'Atulvarshney@5577#'); // Receiver

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Message from: $phoneno - $email";
        $mail->Body    = "
            <html>
            <body>
                <h3>Contact Details</h3>
                <p><strong>Phone:</strong> {$phoneno}</p>
                <p><strong>Email:</strong> {$email}</p>
            </body>
            </html>
        ";

        // Send email
        $mail->send();
        echo "<h2 style='color:green;'>Mail Sent Successfully!</h2>";

    } catch (Exception $e) {
        echo "<h2 style='color:red;'>Mail Sending Failed: {$mail->ErrorInfo}</h2>";
    }
}
?>
