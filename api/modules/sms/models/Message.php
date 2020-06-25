<?php
namespace api\modules\sms\models;

use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "lab".
 *
 * @property integer $id
 * @property integer $region_id
 * @property string $name
 * @property string $code
 */
//class Lab extends \yii\db\ActiveRecord
class Message extends ActiveRecord
{
    //const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['hash', 'sender', 'recipient', 'status', 'title', 'message', 'via', 'created_at', 'module', 'action'], 'required'],
            [['recipient', 'title', 'message'], 'required'],
            [['sender', 'recipient', 'status'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
            [['hash'], 'string', 'max' => 32],
            [['title'], 'string', 'max' => 200],
            [['via', 'module', 'action'], 'string', 'max' => 100],
        ];
    }

    /*public function scenarios()
    {
            $scenarios = parent::scenarios();
            $scenarios['create'] = ['recipient','title','message']; 
            return $scenarios; 
    }*/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'message_id' => 'Message ID',
            'hash' => 'Hash',
            'sender' => 'Sender',
            'recipient' => 'Recipient',
            'status' => 'Status',
            'title' => 'Title',
            'message' => 'Message',
            'via' => 'Via',
            'created_at' => 'Created At',
            'module' => 'Module',
            'action' => 'Action',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                ],
                'value' => function() { 
                    return date('U'); // unix timestamp 
                },
            ]
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            try{
                $folder     = 'D:/sms/outgoing/';
                //$folder     = '/var/spool/sms/outgoing/';
                $filename   = tempnam("","");

                $myfile = fopen($filename, "wb") or die("Unable to open file!");
                $sms_recipient = 'To: '.$this->recipient.PHP_EOL.PHP_EOL;

                fwrite($myfile, $sms_recipient);
                fwrite($myfile, $this->message);
                fclose($myfile);
                
                copy($filename, $folder.basename($filename));
                unlink($filename);
            } catch (Exception $e) {

            }

            return true;

        } else {
            return false;
        }
    }

    /*public function afterSave() {
        parent::afterSave();
        if ($this->isNewRecord) {
            $newid = self::newid($this->id);
            $this->driverid = $new_id;
            $this->isNewRecord = false;
            $this->saveAttributes(array('driverid'));
        }
    }*/

    /*public function beforeSave($insert) 
    {
        

        if ($insert) {
            //do something
        }else{
            //check if there are changes in discount
            if($this->_oldAttributes['discount_id']!=$this->attributes['discount_id']){
                //if there are any changes
                //check if the original data has no discount yet
                if($this->_oldAttributes['discount_id']){
                    //recompute all the fee in the anakysis
                    $sql = "SELECT SUM(fee) as subtotal FROM tbl_analysis WHERE request_id=$this->request_id";
                    $Connection = Yii::$app->labdb;
                    $command = $Connection->createCommand($sql);
                    $row = $command->queryOne();
                    $subtotal = $row['subtotal'];
                    $this->total = $subtotal - ($subtotal * ((int)$this->discount/100));

                }else{
                    //we just adjust the total base on the discount
                    if($this->discount_id){
                        $this->total = $this->total - ($this->total * ((int)$this->discount/100));
                    }
                }
            }
            
        }
        return parent::beforeSave($insert);
    }*/


    /**
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getLabSampletypes()
    {
        return $this->hasMany(LabSampletype::className(), ['lab_id' => 'id']);
    }
    */

    /**
     * @return \yii\db\ActiveQuery
     */
    /*
    public function getReferrals()
    {
        return $this->hasMany(Referral::className(), ['lab_id' => 'id']);
    }
    */
}