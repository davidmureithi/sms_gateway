<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ContactOne;
use yii\data\ActiveDataProvider;
use frontend\models\Msgqueue;
use frontend\models\Outbox;
use frontend\models\User;
use frontend\models\Post;
use frontend\models\ContactOneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use AfricasTalkingGateway\AfricasTalkingGateway;

/**
 * PhonebookController implements the CRUD actions for ContactOne model.
 */
class PhonebookController extends Controller
{
    public $status;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ContactOne models.
     * @return mixed
     */
   

    public function actionProfile()
    {
        $this->layout = 'headbar';
        $model = new User();
        $model = User::find()->where(['id' => 1])->one();
        $name = $model->name;
        $email = $model->email;
        $mobile = $model->contact;
        return $this->render('profile', [
                'model' => $model,
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
            ]);
    }

    public function actionContact()
    {
        $this->layout = 'headbar';
        $model = new ContactOne();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Your Message Was Sent Successfully!");
            return $this->redirect(['index']);
        } else {
            return $this->render('add-contact', [
                'model' => $model,
            ]);
        }
    }
    public function actionIndex()
    {
        $this->layout = 'headbar';
        $searchModel = new ContactOneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionContacts()
    {
        $this->layout = 'headbar';
        $searchModel = new ContactOneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionQueue()
    {
        $this->layout = 'headbar.php';
        $model = new Msgqueue();
        $dataProvider = new ActiveDataProvider([
            'query' => Msgqueue::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('queue', [
                'model' => $model,
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionOutbox()
    {
        $this->layout = 'headbar.php';

        $dataProvider = new ActiveDataProvider([
            'query' => Outbox::find()->where(['status' => 1]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('outbox', [
            'dataProvider' => $dataProvider,
          ]);
    }

    public function actionSend()
    {
        $this->layout = 'headbar';
        $model = new Msgqueue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            Yii::$app->session->setFlash('success', "Your Message Was Sent Successfully!");
            Yii::$app->session->setFlash('failed', "Your Message Was Not Sent Successfully!");
            $dataProvider = new ActiveDataProvider([
                'query' => Msgqueue::find()->where(['id' => $model->id]),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            return $this->render('send-message', ['model' => $model, 'dataProvider' => $dataProvider,]);
        } else {
            return $this->render('send-message', ['model' => $model,]);
        }
    }

    public function actionSending(){
        $username   = "";
        $apikey     = "";

        $model = new Msgqueue();
        $model = Msgqueue::find()->where(['status' => 02])->one();
        $recipients = '0'.$model->contact;
        $message = $model->message;

        //Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);
               
        // Thats it, hit send and we'll take care of the rest. 
        $results = $gateway->sendMessage($recipients, $message);

        // foreach($results as $result) {
        //   echo " Number: " .$result->number;
        //   echo " Status: " .$result->status;
        //   echo " MessageId: " .$result->messageId;
        //   echo " Cost: "   .$result->cost."\n";
        // }

        $number = $results->number;
        $status = $results->status;
        $messageid = $results->messageId;
        $cost = $results->cost;
      
        return $this->render('send-message',[
            'number' => $number,
            'status' => $status,
            'messageid' => $messageid,
            'cost' => $cost,
        ]);
    }

    public function actionSendsda(){

        $model = new ContactOne();
    
        if ($model->load(Yii::$app->request->post())) {
            $data=Yii::$app->request->post();
            //print_r(json_encode($data));
            //print_r($data["id"]);

            //$model->contact = $data["contact"];
            $model->message = $data["message"];
            
            //$data = json_encode($model);

            Yii::$app->session->setFlash('success', "Your Message Was Sent Successfully!");

            return $message;
        } else {
            return $this->render('send-message', [
                'model' => $model,
            ]);
        }              
    }


    public function actionReports(){

        $this->layout = 'headbar';
        $users = new User();
        $users = User::find()->count();
        $model = new Msgqueue();
        $sent = Msgqueue::find()->count();
        $successful = Msgqueue::find()->where(['status' => 1])->count();
        $failed = Msgqueue::find()->where(['status' => NULL])->count();
        $srate = 7 / $sent * 100;

        return $this->render('reports', [
            'model' => $model,
            'sent' => $sent,
            'successful' => $successful,
            'failed' => $failed,
            'srate' => $srate,
            'users' => $users,
        ]);
    }

    /**
     * Displays a single ContactOne model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'headbar';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ContactOne model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'headbar';
        $model = new ContactOne();
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $dataProvider = new ActiveDataProvider([
                'query' => ContactOne::find(),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            //return $this->redirect(['view', 'id' => $model->id]);

            return $this->render('view',[
                'dataProvider' => $dataProvider,
            ]);


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ContactOne model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'headbar';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ContactOne model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = 'headbar';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ContactOne model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactOne the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = 'headbar';
        if (($model = ContactOne::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}