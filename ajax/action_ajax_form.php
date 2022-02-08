<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5109024591:AAEAmCYMJAj7_vC24-RNKvxbi_3YaM2Qh2E";

//Сюда вставляем chat_id
$chat_id = "-792996520";

//Определяем переменные для передачи данных из нашей формы
if ($_POST["name"]!='' &&  $_POST["phone"]!='' ) { 
    $name=null;
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $tovar = $_POST['tovar'];
    $txt='';

    $arr = array(
	    'Заявка с сайта:'=>'',
        'Имя:' => $name,
        'Телефон:' => $phone,
        'Товар:' =>$tovar,
    );
    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
    $result = array(
    	'name' => $_POST["name"],
    	'phone' => $_POST["phone"],
        'tovar' => $_POST['tovar'],
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}
?>

