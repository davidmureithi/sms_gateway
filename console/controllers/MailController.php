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



// Now,what have you to do is whenever you want to send a mail, save the same in database like,

//     $queue = new MailQueue();
//     $queue->to_email = 'xx@xmail.com;
//     $queue->subject = 'Test Mail';
//     $queue->from_email = \Yii::$app->params['adminEmail'];
//     $queue->from_name =  ' Test';
//     $queue->date_published = date("Y-m-d");
//     $queue->max_attempts = 3;  //No of try to send this mail
//     $queue->attempts = 0;
//     $queue->success = 1;  //will be set to 0 on send.
//     $queue->message = \Yii::$app->controller->renderPartial('your_view',['param' => $params]);
//     $queue->save();  
// Now set your crontab so as to execute the send action in every 10 minutes.

//    */10 * * * * php /var/www/vhosts/yourapp/yii mail/send
// Ready to Go..! Happy Coding!
