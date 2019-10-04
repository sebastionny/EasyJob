<?php
if( isset($_POST['n']) && isset($_POST['e']) && isset($_POST['m']) ){
    $n = $_POST['n']; // HINT: use preg_replace() to filter the data
    $e = $_POST['e'];
    $m = nl2br($_POST['m']);
    $to = "ameliagro@gmail.com";
    $from = $e;
    $subject = 'Contacter nous';
    $message = '<b>Name:</b> '.$n.' <br><b>Email:</b> '.$e.' <p>'.$m.'</p>';
    $headers = "From: $from\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=UFT-8\n";
    if( mail($to, $subject, $message, $headers) ){
        echo "success";
    } else {
        echo "The server failed to send the message. Please try again later.";
    }
}
?>