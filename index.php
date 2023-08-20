<!DOCTYPE html>
<html>
    <head>
        <title>Contact us</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <header>
            <nav>
                <div class="row">
                    <div >
                        <img src="logo.png"  class="logo">
                    </div>
            </nav>
 
            <?php
            $errorType = isset($_GET['error']) ? $_GET['error'] : '';

            if ($errorType === 'emptytabs') {
                $error_shown = "*Please fill all the details*";
                echo '<div class="error1">' . $error_shown . '</div>';
            }elseif ($errorType === 'phonenumber') {
                $phn_incorrect = "Your Phone number is invalid";
                echo '<div class="error1">' . $phn_incorrect . '</div>';
            }elseif($errorType === 'invalid-email'){
                $email_incorrect = "Please enter a valid email address";
                echo '<div class="error1">' . $email_incorrect . '</div>';
            }elseif($errorType === 'mail-failed'){
                $mailnotsent = "Please try again after some time, mail is not working";
                echo '<div class="error1">' . $mailnotsent . '</div>';
            }
            elseif(isset($_GET['success']))
            {
                $success1 = "Thankyou for the message, you will hear from us soon!";
                echo '<div class="success_css">'.$success1.'</div>';
            }
            ?>
            
            <div class="feel-free">
                <h1>Feel free to contact us - </h1> <br>
                <div class="form-container">
                    <form class="form" action="process.php" method="post">
                        <label for="fullname">Full name:</label><br>
                        <input type="text" id="fullname" name="fullname" placeholder="Full name" maxlength="100" value="<?php echo isset($_GET['fullname']) ? htmlspecialchars($_GET['fullname']) : ''; ?>" ><br>
                        <label for="phonenumber">Phonenumber:</label><br>
                        <input type="number" id="phonenumber" name="phonenumber" placeholder="10 digit Phone Number" maxlength="10"  value="<?php echo isset($_GET['phonenumber']) ? htmlspecialchars($_GET['phonenumber']) : ''; ?>" ><br>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email" placeholder="Valid Email address" maxlength="100"  value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>"><br>
                        <label for="Subject">Subject:</label><br>
                        <textarea type="text" id="subject" name="subject" rows="2" cols="40"  maxlength="100" placeholder="Subject"><?php echo isset($_GET['subject']) ? htmlspecialchars($_GET['subject']) : ''; ?></textarea><br>
                        <label for="message">Message:</label><br>
                        <textarea id="message" name="message" rows="4" cols="40"  maxlength="500" placeholder="Write your message here"><?php echo isset($_GET['message']) ? htmlspecialchars($_GET['message']) : ''; ?></textarea><br>
                        <button type="submit" class="btn" id="click" name="submit">Submit</button>
                     </form>
                </div>
             </div>
             
        </header>
    </body>
</html>