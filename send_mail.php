<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $betreff = strip_tags(trim($_POST["betreff"]));
    $message = trim($_POST["message"]);

    if (!empty($name) && !empty($email) && !empty($betreff) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "julius28282@gmail.com";
        $subject = "New Contact Form Submission: $betreff";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Betreff: $betreff\n\n";
        $email_content .= "Message:\n$message\n";
        $headers = "From: $name <$email>";

        if (mail($to, $subject, $email_content, $headers)) {
            echo "<script type='text/javascript'>
                    alert('Thank you for your message. It has been sent.');
                    window.location.href = 'https://julius2828.github.io/Novorus/Homepage';
                  </script>";
        } else {
            echo "<script type='text/javascript'>
                    alert('Oops! Something went wrong, and we couldn\'t send your message.');
                    window.location.href = 'https://julius2828.github.io/Novorus/Homepage';
                  </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('There was a problem with your submission. Please complete the form and try again.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script type='text/javascript'>
            alert('There was a problem with your submission. Please complete the form and try again.');
            window.history.back();
          </script>";
}
?>
