<?php
namespace frontend\controllers;

use common\models\Tags;
use common\models\User;
use common\models\UserCourse;
use common\models\Visas;
use kartik\mpdf\Pdf;
use Yii;
use yii\db\Exception;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class PayController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['success','fail','request','index'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'request' => ['post'],

                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */


    /**
     * Displays homepage.
     *
     * @return mixed
     */

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionRequest()
    {
        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post();

            $visa = new Visas();
            $visa->user_id = $post['user_id'];
            $visa->amount = $post['amount'];
            $visa->program = $post['course'];
            $visa->status = 3;
            $visa->save();

            $orderId = $visa['id'];
            $data["merchantId"] = "13533402640613693";
            $data["login"] = "13533402640613693";
            $data["pass"] = "4KaeU75XAxHn12CbBTs6";
            $data["demo"] = false;
            if($visa->user_id == 5){
                $data["demo"] = true;
            }
            $data["callback"] = "http://auxmed.kz/pay/success";
            $data['orderId'] = "$orderId";
            $data['description'] = 'Все вопросы можете задавать на AuxMed';
            $data['returnUrl'] = "http://auxmed.kz/cabinet/course/view?id=" . $post['course'];
            $data["amount"] = $visa->amount * 100;

            $visa = Visas::findOne($visa['id']);
            $result = null;
            if($visa->status == 3){
                $result = $this->createPayment($data);

                $visa->status = 2;
                $visa->save();
            }

            if(!empty($result)){
                if(isset($result['id'])){
                    $visa->code = $result["id"];
                }else{
                    $visa->code = $result->id;
                }
                $visa->save();
                return $this->redirect($result["url"]);
            }else{
                Yii::$app->getSession()->setFlash('danger', Yii::t('users', 'Произошла ошибка, попробуйте повторить еще раз!'));
                return $this->redirect('/non');
            }

        }
    }
    function createPayment (array $data){

        if($data["amount"]<=0){
            throw new Exception('цена не указана или меньше 0');
        }


        $dataArray=array(
            "merchantId"=>      strval($data["merchantId"]),
            "callbackUrl"=>     strval($data["callback"]),
            "orderId"   =>      strval($data['orderId']),
            "description"=>     strval($data['description']),
            "demo"      =>      false,
            "returnUrl" =>      strval($data['returnUrl']),
            "amount"  =>        (int)$data["amount"]
        );

        $data_string = json_encode ($dataArray, JSON_UNESCAPED_UNICODE);
        $curl = curl_init( "https://ecommerce.pult24.kz/payment/create");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        $headers = array(
            "Content-Type: application/json",
            "Authorization: Basic " . base64_encode($data["login"].':'.$data["pass"]),
            'Content-Length: ' . strlen($data_string)
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl);
        curl_close($curl);
        $result=json_decode($result,true);
        return $result;
    }
    public function actionFail()
    {
        Yii::$app->getSession()->setFlash('danger', Yii::t('users', 'Произошла ошибка, попробуйте повторить еще раз!'));
        return $this->redirect('/course/payment');
    }
    public function actionSuccess()
    {

        if ($_SERVER["REMOTE_ADDR"]!="35.157.105.64") {//проверяем ip адрес с которого пришел ответ

            echo "no access";
            die();
        }
        $json = json_decode (file_get_contents('php://input'));
        $out=true;
        if ($json->status==1){
            $order = Visas::findOne($json->orderId);
            $order->status_api = 1;
            $order->save();
        }else{
            $order = Visas::findOne($json->orderId);
            $order->status_api = 2;
            $order->save();
        }
        header( 'HTTP/1.1 200 OK' );
        if(gettype($out)=="boolean"){
            echo '{"accepted":'.(($out) ? 'true' : 'false').'}';
        }else{
            throw  new  Exception($out);
        }

        $order = Visas::findOne($order['id']);
        if(!empty($order)){
            if($order['status_api'] == 1 and $order['status'] == 2){
                $user = User::findOne($order['user_id']);

            }else{

                Yii::$app->getSession()->setFlash('success', Yii::t('users', 'Ваш баланс успешно пополнен!'));

            }

            $order->ts = time();
            $order->status = 1;
            $order->save();

            $uc = new UserCourse();
            $uc->user_id = $order['user_id'];
            $uc->course_id = $order['program'];
            $uc->save();
        }else{
            Yii::$app->getSession()->setFlash('danger', Yii::t('users', 'Ошибка!'));
            return $this->redirect('/profile');
        }
    }

}

