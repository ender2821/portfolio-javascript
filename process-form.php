<?php
    $formData = file_get_contents( 'php://input' );
    $data = json_decode( $formData );

    $name = filter_var($data->name,FILTER_SANITIZE_STRING);
    $email = filter_var($data->email,FILTER_SANITIZE_EMAIL);
    $title = filter_var($data->title,FILTER_SANITIZE_STRING);
    $message = filter_var($data->message,FILTER_SANITIZE_STRING);

    $mailTo = "design@joshjensencreative.com";
    $from = "noReply@joshjensencreative.com";
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    $subject = 'Message from ' . $name;
    $body  = <<<EOF
<html>
  <body>
    <h2>New message</h2>
    <p>From: $name</p>
    <p>Email: $email</p>
    <p>Title: $title</p>
    <p>Message:</p>
    <p>$message</p>
  </body>
</html>
EOF;
    mail( $mailTo, $subject, $body,$headers );
?>