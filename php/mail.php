<?php
session_start();

$sender_fname = $_POST['fname'];
$sender_lname  = $_POST['lname'];
$sender_email = $_POST['email'];
$sender_staddress = $_POST['address'];
$sender_city = $_POST['city'];
$sender_state = $_POST['state'];
$sender_zip = $_POST['zip'];
$sender_hphone = $_POST['hphone1'] . $_POST['hphone2'] . $_POST['hphone3'];
$sender_wphone = $_POST['wphone1'] . $_POST['wphone2'] . $_POST['wphone3'];
$sender_cphone = $_POST['cphone1'] . $_POST['cphone2'] . $_POST['cphone3'];

if($sender_fname != null && $sender_lname != null && $sender_email != null && $sender_staddress != null || $sender_city != null && $sender_state != null && $sender_zip != null && $sender_hphone != null && $sender_wphone != null && $sender_cphone != null) {
    $_SESSION['form_completed'] = true;
    
    if(filter_var($sender_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_valid'] = true;
    } else {
        $_SESSION['email_valid'] = false;
        redirect();
    }
    if(preg_match('/[^0-9]{10}$/', $sender_phone) && preg_match('/[^0-9]{10}$/', $sender_wphone) && preg_match('/[^0-9]{10}$/', $sender_cphone)) {
        $_SESSION['phones_valid'] = true;
    } else {
        $_SESSION['phones_valid'] = false;
        redirect();
    }
    if($_SESSION['email_valid'] == true && $_SESSION['phones_valid'] == true && $_SESSION['form_completed'] == true) {
        $message = "<html>
            <div>   
                The 100 Men Who Give Signup: <br/>
                
                User Information: <br/>
                First Name: $sender_fname <br/>
                Last Name: $sender_lname <br/>
                Email: $sender_email <br/>
                <br/>
                Home Phone: $sender_hphone <br/>
                Work Phone: $sender_wphone <br/>
                Cell Phone: $sender_cphone <br/>
                <br/>
                Address: $sender_staddress <br/>
                City: $sender_city <br/>
                Zip Code: $sender_zip <br/>
                State: $sender_state
            </div>
        </html>";
        
        sendmail("noah.pikaart.wgd@gmail.com", "The 100 Men Who Give Signup", $message);
        redirect();
    } else {
        $_SESSION['form_completed'] = false;
        redirect();
    }

} else {
    $_SESSION['form_completed'] = false;
    redirect();
}

function redirect() {
    echo "<script>window.location.href = '../join.php';</script>";
    
    $error_message;
    if($_SESSION['form_completed'] == false && $_SESSION['form_completed'] != null) {
        $error_message = "Please verify all fields were filled out";
    }
    
    if($_SESSION['email_valid'] == false && $_SESSION['email_valid'] != null) {
        $error_message = "Invalid Email";
    }
    
    if($_SESSION['phones_valid'] == false && $_SESSION['email_valid'] != null) {
        $error_message = "One or more phone number was not filled out correctly.";
    }
    
    
    echo "$error_message";
}

function sendmail($to, $subject, $message) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@the100menwhogive.com" . "\r\n";
    
    if(@mail($to, $subject, $message, $headers)) {
        $_SESSION['form_submitted'] = true;
    }
    
}

?>
