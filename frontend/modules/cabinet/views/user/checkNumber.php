<?
include_once "/Users/Nurzhan/Sites/auxmed/frontend/controllers/smsc_api.php";


//list($sms_id, $sms_cnt, $cost, $balance) = send_sms("79999999999", "http://smsc.kz\nSMSC.KZ", 0, 0, 0, 0, false, "maxsms=3");
//
//list($sms_id, $sms_cnt, $cost, $balance) = send_sms("79999999999", "0605040B8423F0DC0601AE02056A0045C60C036D79736974652E72750001036D7973697465000101", 0, 0, 0, 5, false);
//
//list($sms_id, $sms_cnt, $cost, $balance) = send_sms("79999999999", "", 0, 0, 0, 3, false);
//
list($cost, $sms_cnt) = get_sms_cost($phone, "Вы успешно зарегистрированы!");
//
//list($status, $time) = get_status($sms_id, "79999999999");

$balance = get_balance();

// отправка SMS через e-mail
