<?php

namespace api\modules\sms\controllers;
use yii\web\Response;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;

/**
 * Lab Controller API
 *
 * @author DOST IX ICT Team <red_x88@yahoo.com>
 */
class MessageController extends ActiveController
{
    public $modelClass = 'api\modules\sms\models\Message';    

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['view', 'index'],  // in a controller
                // if in a module, use the following IDs for user actions
                //'only' => ['user/create', 'user/index'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            /*[
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age' => 86400,
                ]    
            ],*/
        ];
    }  

    public function actions()
    {
        $actions = parent::actions(); 
        unset($actions['create']);
        return $actions;
    }

    protected function verbs(){
          return [
            'create' => ['POST'],
            'update' => ['PUT', 'PATCH','POST'],
            'delete' => ['DELETE'],
            'view' => ['GET'],
            'index'=>['GET'],
        ];
    }

    public function actionCreate()
    {
        \Yii::$app->response->format = \yii\web\Response:: FORMAT_JSON;
        $model = new $this->modelClass;
        //$model->scenario = Message:: SCENARIO_CREATE;
        $model->attributes = \yii::$app->request->post();
        if($model->validate())
        {
            $model->save();
            return array('status' => true, 'data'=> 'message created is successfully updated');
        }else{
            return array('status'=>false,'data'=>$model->getErrors());    
        }
    }
    /*public function actionCreate(){ 

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new $this->modelClass;
        $post_data = Yii::$app->request->post();
        $model->load($post_data);   
        $model->save(false);            
        return $model;
    }*/

    function createNewmessage()
    {
        $model =  new $this->modelClass;
        
        //'hash', 'sender', 'recipient', 'status', 'title', 'message', 'via', 'created_at', 'module', 'action'
        $model->hash = SHA1(rand(1,999999999)); 
        $model->sender = '639274790425'; 
        $model->recipient = 639177975944; 
        $model->status = 10; 
        $model->title = 'SMS'; 
        $model->message = 'This is a sms notification'; 
        $model->via = 'web'; 
        $model->created_at = date("Y-m-d H:i:s"); 
        $model->module = 'FAIMS'; 
        $model->action = 'Validate';
        $model->save();

        return $model;
    }
}


