<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';

/**
 * Use PHPMailer as a base class and extend it
 */
class Mailer extends PHPMailer
{
    private $mailArray;

    /**
     * myPHPMailer constructor.
     *
     * @param bool|null $exceptions
     * @param $mailArray
     * @throws Exception
     */
    public function __construct($exceptions, $mailArray)
    {
        //Don't forget to do this or other things may not be set correctly!
        parent::__construct($exceptions);

        //Show debug output
        //$this->SMTPDebug = SMTP::DEBUG_SERVER;

        //Server settings
        $this->isSMTP();
        $this->Host       = 'smtp.telenet.be';
        $this->SMTPAuth   = true;
        $this->Port       = 587;
        $this->Username   = $_ENV['MAIL_USER'];
        $this->Password   = $_ENV['MAIL_PASSWORD'];
        $this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //Set a default 'From' address
        $this->setFrom('gerrit.degenhardt@telenet.be', 'Degenhardt Gerrit');
        $this->isHTML(true);

        $this->mailArray = $mailArray;

        //Set an HTML and plain-text body, import relative image references
//        $this->msgHTML($body, './images/');

        //Inject a new debug output handler
        $this->Debugoutput = static function ($str, $level) {
            echo "Debug level $level; message: $str\n";
        };
    }

    //Extend the send function
    public function send()
    {

        $this->addAddress($this->mailArray['toAddress'], $this->mailArray['toAddress']);
        $this->Subject = $this->mailArray['subject'];
        $this->Body    = $this->mailArray['body'];

        parent::send();

    }


}

// Instantiation and passing `true` enables exceptions
//$mail = new PHPMailer(true);
//
//try {
//    //Server settings
//    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
//    $mail->isSMTP();                                            // Send using SMTP
//    $mail->Host       = 'smtp.telenet.be';                    // Set the SMTP server to send through
//    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//    $mail->Username   = 'gerrit.degenhardt@telenet.be';                     // SMTP username
//    $mail->Password   = 'Amrecage01!';                               // SMTP password
//    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//
//    //Recipients
//    $mail->setFrom('gerrit.degenhardt@telenet.be', 'Degenhardt Gerrit');
//    $mail->addAddress('gerrit.degenhardt@telenet.be', 'Degenhardt Gerrit');     // Add a recipient
//    //$mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('gerrit.degenhardt@telenet.be', 'Degenhardt Gerrit');
//    //$mail->addCC('cc@example.com');
//    //$mail->addBCC('bcc@example.com');
//
//    // Attachments
//    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//
//    // Content
//    $mail->isHTML(true);                                  // Set email format to HTML
//    $mail->Subject = 'Here is the subject';
//    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
//
//    $mail->send();
//    echo 'Message has been sent';
//} catch (Exception $e) {
//    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//}