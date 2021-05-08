<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MailController extends Controller
{
    public function email()
    {
        return view("email");
    }


    // ========== [ Compose Email ] ================
    public function composeEmail($subject, $body)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'midastouchacademy.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@midastouchacademy.com';   //  sender username
            $mail->Password = '~yHx[_4LvZ]^';       // sender password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465

            $mail->setFrom($mail->Username, 'MidasTouchAcademy');
            $mail->addAddress(request()->email);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            // $mail->addReplyTo('sender-reply-email', 'sender-reply-name');

            // if (isset($_FILES['emailAttachments'])) {
            //     for ($i = 0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
            //         $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
            //     }
            // }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $subject;
            $mail->Body    = view('email.registration');

            // $mail->AltBody = plain text version of email body;

            if (!$mail->send()) {
                return false;
                // echo "mail not sent";
                // return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {
                return true;
                // echo "mail  sent";
                // return back()->with("success", "Email has been sent.");
            }
        } catch (Exception $e) {
            return false;
            // echo "an error occured $e";
            // return back()->with('error', 'Message could not be sent.');
        }
    }
}
