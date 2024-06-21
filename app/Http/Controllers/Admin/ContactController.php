<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;


class  ContactController extends Controller
{

    /**
     * @param Request $request
     * @return array|true[]|void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function contact(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'bail|required|email',
            'msg'   => 'bail|required|max:1000',
        ]);

        if ($validator->fails()) {

            return [
                'status' => false,
                'msg'    => $validator->errors()->toArray()
            ];

        } else {

            $input = $request->except('_token');
            $email = $input['email'];
            $msg   = $input['msg'];

            if ($this->sendMail($email, $msg)){

                return [
                    'status' => true,
                ];
            }
        }
    }


    /**
     * @param $email
     * @param $msg
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function sendMail($email, $msg): bool
    {
        $mail = new PHPMailer(true);

        $mail->Mailer   = env('MAIL_MAILER');
        $mail->Host     = env('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SMTPSecure = env('MAIL_ENCRYPTION');
        $mail->Port = env("MAIL_PORT");
        $mail->setFrom($email, 'visitor');
        $mail->addAddress('vit.chebotnikov@gmail.com');
        $mail->Subject = "question";
        $mail->Body = $msg;

        return $mail->send();
    }
}
