<?php

namespace frontend\controllers;

use common\models\Messages;
use common\models\Tickets;
use frontend\models\forms\MessageForm;
use frontend\models\forms\TicketForm;
use Yii;
use yii\db\Exception;
use yii\web\UploadedFile;

class TicketsController extends \yii\web\Controller
{
    public function actionIndex($id=null)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $user = Yii::$app->user->identity;
        $tickets = Tickets::find()->where(['user_id'=>$user->id])->all();

        if (empty($id)) {
            if (is_array($tickets) && !empty($tickets) && sizeof($tickets) > 0) {
                $id = $tickets[0]['id'];
            } else {
                $id = 'new';
            }
        }

        if ($id == 'new') {
            $ticketForm = new TicketForm();

            if ($ticketForm->load(Yii::$app->request->post()) && $ticketForm->validate()) {

                $ticket = new Tickets();
                $ticket->user_id = $user->id;
                $ticket->status = 3;
                $ticket->title = $ticketForm['title'];
                $ticket->category = $ticketForm['category'];
                $ticket->time = time();
                $ticket->end_time = time() +60*60*12;
                $ticket->save();
                $message = new Messages();
                $message->time = time();
                $message->user_id = $user->id;
                $message->ticket_id = $ticket['id'];
                $message->text = $ticketForm->text;

                $file = UploadedFile::getInstance($ticketForm, 'file');
                $link = null;
                if ($file && $file->tempName) {
                    $ticketForm->file = $file;
                    if ($ticketForm->validate(['file'])) {

                        $rand = rand(900000, 9000000);
                        $dir = Yii::getAlias('@frontend/web/docs/tickets/');
                        $dir2 = Yii::getAlias('docs/tickets/');
                        $fileName = $rand . '.' . $ticketForm->file->extension;
                        $ticketForm->file->saveAs($dir . $fileName);
                        $ticketForm->file = $fileName; // без этого ошибка
                        $link = '/' . $dir2 . $fileName;
                    }
                }
                $message->link = $link;

                if ($message->save()) {
                    $notification = 'Новая заявка  №'.$ticket['id'].' .';
                    $this->sendTelegramNotification($notification, 'AuxMed');
                    Yii::$app->getSession()->setFlash('success', Yii::t('users', 'Запрос принят!'));
                    $this->redirect('/tickets');
                } else {
                    Yii::$app->getSession()->setFlash('danger', Yii::t('users', 'Произошла ошибка, попробуйте повторить!'));
                    $this->redirect('/tickets');
                }

            }
            $categories = Tickets::getCategoryList();
            return $this->render('tickets-new', [
                'ticketForm' => $ticketForm,
                'tickets' => $tickets,
                'categories' => $categories,
            ]);
        } elseif (!empty($id)) {

            $ticket = Tickets::find()->where(['id' => $id, 'user_id' => Yii::$app->user->id])->one();

            if (!empty($ticket)) {
                $messages = Messages::find()->where(['ticket_id' => $ticket['id']])->all();
                $messageForm = new MessageForm();
                if ($messageForm->load(Yii::$app->request->post()) && $messageForm->validate()) {
                    $ticket = Tickets::findOne($ticket['id']);
                    $ticket->status = 3;
                    $ticket->save();

                    $message = new Messages();
                    $message->time = time();
                    $message->user_id = $user->id;
                    $message->ticket_id = $ticket['id'];
                    $message->text = $messageForm->text;

                    $file = UploadedFile::getInstance($messageForm, 'file');
                    $link = null;
                    if ($file && $file->tempName) {
                        $messageForm->file = $file;
                        if ($messageForm->validate(['file'])) {

                            $rand = rand(900000, 9000000);
                            $dir = Yii::getAlias('@frontend/web/docs/tickets/');
                            $dir2 = Yii::getAlias('docs/tickets/');
                            $fileName = $rand . '.' . $messageForm->file->extension;
                            $messageForm->file->saveAs($dir . $fileName);
                            $messageForm->file = $fileName; // без этого ошибка
                            $link = '/' . $dir2 . $fileName;
                        }
                    }
                    $message->link = $link;

                    if ($message->save()) {
                        $notification = 'Новая заявка  №'.$ticket['id'].' .';
                        $this->sendTelegramNotification($notification, 'Auxmed');
                        Yii::$app->getSession()->setFlash('success', Yii::t('users', 'Сообщение отправлено!'));
                        $this->redirect('/tickets');
                    } else {
                        Yii::$app->getSession()->setFlash('danger', Yii::t('users', 'Произошла ошибка, попробуйте повторить!'));
                        $this->redirect('/tickets');
                    }

                }
                return $this->render('messages', [
                    'ticket' => $ticket,
                    'messages' => $messages,
                    'messageForm' => $messageForm,
                    'user' => $user,
                    'tickets' => $tickets,
                ]);
            }

        }
        return $this->render('index',[
            'tickets'=>$tickets,
            'ticket' => $ticket
        ]);
    }

    public function actionCreate(){
        if (Yii::$app->request->isPost){
            $user = Yii::$app->user->identity;
            $ticket = new Tickets();
            $ticket->user_id = $user->id;
            $ticket->status = 3;
            $categoryId = Yii::$app->request->post('category');
            $ticket->title = Tickets::getCategoryList()[$categoryId];
            $ticket->category = $categoryId;
            $ticket->time = time();
            $ticket->end_time = time() +60*60*12;
            $ticket->task_id = Yii::$app->request->post('taskId');
            $ticket->save();
            $message = new Messages();
            $message->time = time();
            $message->user_id = $user->id;
            $message->ticket_id = $ticket['id'];
            $message->text = Yii::$app->request->post('message');
            $message->save();
            $notification = 'Новая заявка  №'.$ticket['id'].' .';
            $this->sendTelegramNotification($notification, 'AuxMed');
            return json_encode(['success' => 1]);

        }
    }

    private function sendTelegramNotification($notification, $localPass = null)
    {
        //https://api.telegram.org/bot5272221672:AAGGUyfbNlxCk354CuBmwuaNCRZn9bOdEEY/getUpdates - узнать id чата
        if ($localPass == 'AuxMed'){
            $token = "5272221672:AAGGUyfbNlxCk354CuBmwuaNCRZn9bOdEEY";
            $chat_id = "-1001633608043";
            $txt = $notification;
            $url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}";
            try {
                $sendTelegram = fopen($url, "r");
                if (!$sendTelegram){
                    throw new Exception('Error');
                }
            }catch (\Exception $exception){
                return false;
            }
        }else{
            return false;
        }



    }
}
