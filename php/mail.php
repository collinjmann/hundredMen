<?php
session_start();

$sender_fname = $_POST['fname'];
$sender_lname  = $_POST['lname'];
$sender_email = $_POST['emai'];
$sender_staddress = $_POST['address'];
$sender_city = $_POST['city'];
$sender_state = $_POST['state'];
$sender_zip = $_POST['zip'];
$sender_hphone = $_POST['hphone1'] . $_POST['hphone2'] . $_POST['hphone3'];
$sender_wphone = $_POST['wphone1'] . $_POST['wphone2'] . $_POST['wphone3'];
$sender_cphone = $_POST['cphone1'] . $_POST['cphone2'] . $_POST['cphone3'];




if($sender_fname != null && $sender_lname != null && sender_email != null && $sender_staddress != null && $sender_city != null && $sender_state != null && $sender_zip != null && $sender_hphone != null && $sender_wphone != null && $sender_cphone != null) {
    $_SESSION['form_completed'] = true;
    
    if(filter_var(FILTER_VALIDATE_EMAIL, $sender_email)) {
    $_SESSION['email_valid'] = true;
    } else {
        $_SESSION['email_valid'] = false;
        redirect();
    }
    if(preg_match('/[^0-9]/', $sender_phone) && preg_match('/[^0-9]/', $sender_wphone) && preg_match('/[^0-9]/', $sender_cphone)) {
        $_SESSION['phones_valid'] = true;
    } else

} else {
    $_SESSION['form_completed'] = false;
    redirect();
    
}

function redirect() {
    echo "<script>window.location.href = 'contact.html'</script>";
    
    $error_message;
    if($_SESSION['form_completed'] == false && $_SESSION['form_completed'] != null) {
        $error_message = "Please verify all fields were filled out".
    }
    
    if($_SESSION['email_valid'] == false && $_SESSION['email_valid'] != null) {
        $error_message = "Invalid Email";
    }
    
    
    echo "$error_message";
}

function sendmail($message, $subject, $to) {
    $headers = 'From: noreply@the100men.org';
}

?>
