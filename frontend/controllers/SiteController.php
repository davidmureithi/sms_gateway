<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\ContactOne;
use frontend\models\User;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'dashboard';
        return $this->render('index');
    }

    public function actionImportExcel(){

        $inputFile = 'uploads/contacts.xlsx';

        try{

            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);


        }catch(Exception $e)
        {
            die('Error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        for($row = 1; $row <= $highestRow; $row++)
        {
            $rowData = $sheet->rangeToArray('A' .$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

            if($row == 1)
            {
                continue;
            }

            $contacts = new ContactOne();
            $id = $rowData[0][0];
            $contacts->name = $rowData[0][1];
            $contacts->email = $rowData[0][2];
            $contacts->message = $rowData[0][3];
            $contacts->contact = $rowData[0][4];
            $contacts->save();

            //$id = 2;
            // $contacts->name = 'David';
            // $contacts->email = 'fs@fssf.ddd';
            // $contacts->message = 'vsdvsdsdfvs';
            // $contacts->contact = '06546362';
            // $contacts->save();

            print_r($contacts->getErrors());

        }
        die('okay');
    }


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        return $this->render('login',[
                'model' => $model,
            ]);
    }
    
    public function actionContactone()
    {
        $model = new ContactOne();
        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->render('contactone', ['model' => $model,]);
        } else {
            return $this->render('contactone', ['model' => $model,]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /** --------------------- Application Proggramming Interface [API] --------------------- **/
   
    public function actionApiget()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new ContactOne();
        $model = ContactOne::find()->all();
        //$model = ContactOne::find()->where(['name' => 'Man'])->one();
        //$this->setHeader(200);
        //echo json_encode(array('status'=>1,'data'=>array_filter($model->attributes)),JSON_PRETTY_PRINT);
 
        return $model;
    }

    public function actionApigetone($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new ContactOne();
        //$model = ContactOne::find()->where(['id' => 3])->one(); //Working
        $model = ContactOne::find()->where(['id' => $id])->one();
        return $model;
    }

    public function actionApipost($name, $email, $message)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new ContactOne();
        //$model = ContactOne::find()->where(['id' => 3])->one(); //Working
        $model = ContactOne::find()->where(['id' => $id])->one();
        return $model;
    }


    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

     public function successCallback($client)
    {
        $attributes = $client->getUserAttributes();
            // user login or signup comes here
            /*
            Checking facebook email registered yet?
            Maxsure your registered email when login same with facebook email
            die(print_r($attributes));
            */
            
            $user = \common\modules\auth\models\User::find()->where(['email'=>$attributes['email']])->one();
            if(!empty($user)){
                Yii::$app->user->login($user);
            
            }else{
                // Save session attribute user from FB
                $session = Yii::$app->session;
                $session['attributes']=$attributes;
                // redirect to form signup, variabel global set to successUrl
                $this->successUrl = \yii\helpers\Url::to(['signup']);
            }
    }
    public $successUrl = 'Success';
}
