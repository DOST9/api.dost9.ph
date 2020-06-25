<?php
namespace api\components;

use Yii;
use api\modules\v1\controllers; //edit
use yii\base\Component;
use yii\base\InvalidConfigException;

class ApiComponent extends Component {

    public $modelAccesstoken = 'api\modules\v1\models\Accesstoken';

    public function validateToken()
    {
        $header = \Yii::$app->request->getHeaders();
        $access = new $this->modelAccesstoken;

        if(isset($header['token'])){
            $accesstoken = $access->find()
                ->select('*')
                ->having('token = :token')
                ->addParams([':token'=>$header['token']])
                ->one();    
        }else{
            throw new \yii\web\HttpException(401, 'Unauthorized access!');            
        }
        
                
        if(count($accesstoken) > 0){
            if( $accesstoken->exp > date("Y-m-d H:i:s") ){
            //if( (time($accesstoken->exp) - time(date("Y-m-d H:i:s"))) > 0  ){
                //throw new \yii\web\HttpException(401, time($accesstoken->exp).'  --  '.time(date("Y-m-d H:i:s")));
                if($accesstoken->ip == \Yii::$app->request->userIP)
                    return parent::beforeAction($event);
                    //return parent::beforeAction($event);
                else
                    throw new \yii\web\HttpException(401, 'You are accessing from a different IP Address.!');    
            }else{
                throw new \yii\web\HttpException(401, 'Unauthorized access. Token expired!');
            }
        }

        throw new \yii\web\HttpException(401, 'Unauthorized access. Invalid token!');
    }

    /*public function checkForToken(&$accesstoken)
    {
        $header = \Yii::$app->request->getHeaders();
        $access = new $this->modelAccesstoken;

        if(isset($header['token'])){
            $accesstoken = $access->find()
                ->select('*')
                ->having('token = :token')
                ->addParams([':token'=>$header['token']])
                ->one();    
            //return $accesstoken;
        }else{
            throw new \yii\web\HttpException(401, 'Unauthorized access!');            
        }
    }*/

    public function validate($header)
    {
        $access = new $this->modelAccesstoken;

        $accesstoken = $access->find()
                ->select('*')
                ->having('token = :token')
                ->addParams([':token'=>$header])
                ->one();

        if(count($accesstoken) > 0){
            if( $accesstoken->exp > date("Y-m-d H:i:s") ){
            //if( (time($accesstoken->exp) - time(date("Y-m-d H:i:s"))) > 0  ){
                //throw new \yii\web\HttpException(401, time($accesstoken->exp).'  --  '.time(date("Y-m-d H:i:s")));
                if($accesstoken->ip == \Yii::$app->request->userIP)
                    return true;
                    //return parent::beforeAction($event);
                else
                    throw new \yii\web\HttpException(401, 'You are accessing from a different IP Address.!');    
            }else{
                throw new \yii\web\HttpException(401, 'Unauthorized access. Token expired!');
            }
        }
    }

}