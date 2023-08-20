<?php
require_once('config.php');
?>

<?php
    if(isset($_POST['submit']))
    {
        $fullname = $_POST['fullname'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if(empty($fullname) || empty($phonenumber)|| empty($message)|| empty($email)|| empty($subject))
        {
            header('location:index.php?error=emptytabs&fullname=' . urlencode($fullname) . '&phonenumber=' . urlencode($phonenumber) . '&email=' . urlencode($email) . '&subject=' . urlencode($subject) . '&message=' . urlencode($message));
            exit();
        }
        elseif(!preg_match('/^[0-9]{10}$/', $phonenumber))
        {     
            header('location:index.php?error=phonenumber&fullname=' . urlencode($fullname) . '&email=' . urlencode($email) . '&subject=' . urlencode($subject) . '&message=' . urlencode($message));
            exit();
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {    
            header('location:index.php?error=invalid-email&fullname=' . urlencode($fullname) . '&phonenumber=' . urlencode($phonenumber) . '&subject=' . urlencode($subject) . '&message=' . urlencode($message));
            exit();
        }
        else{
            
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $currenttime = date('Y-m-d H:i:s');
            $sql = "INSERT INTO contact_form (fullname,phonenumber,email,subject,message,ip_address,time) VALUES (?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$fullname, $phonenumber, $email, $subject, $message, $ip_address,$currenttime]);
            header('location:index.php?success');


//commenting the mail confirmation code to avoid spammings - remove the above line of code when uncommenting

        //     if($results){
        // $to = "rahuldhingra7029@gmail.com"; 
        // $subject = "New Contact Form Submission";
        // $body = "Full Name: $fullname\nPhone Number: $phonenumber\nEmail: $email\nSubject: $subject\nMessage: $message\nIP address: $ip_adress\nTime: $currenttime\n";
        // $headers = "From: rahul19csu235@ncuindia.edu.com\r\n"; 
        // $headers .= "Content-Type: text/plain; charset=utf-8\r\n"; 
        // mail($to, $subject, $body, $headers);

        //     header('location:index.php?success');
        //     exit();
        //     }else{
        //         header('location:index.php?error=mail-failed');
        //     }
        }
    }
?>