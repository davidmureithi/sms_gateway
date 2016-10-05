<?php

namespace console\controllers;

class MailController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSend()
    {
	    $mails=MailQueue::find()->all();
	    foreach($mails as $mail)
	    {
	         if($mail->success==1)
	         {
	         if($mail->attempts<=$mail->max_attempts)
	            {
	                //send mail here
	            	$message =\Yii::$app->mail->compose();
	                $message->setHtmlBody($mail->message,'text/html')
	                        ->setFrom($mail->from_email)
	                        ->setTo($mail->to_email)
	                        ->setSubject($mail->subject);


	            	if($message->send())
	                {
	                 	$mail->success=0;//set status to 0 to avoid resending of emails.
	                 	$mail->date_sent=date("Y-m-d H:i:s");
	                }
	             $mail->attempts=$mail->attempts + 1;
	             $mail->last_attempt= date("Y-m-d H:i:s");
	             $mail->save();
	            }
	         }
	     }
    }
}
