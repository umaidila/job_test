<?php 
$data = [
    'result'=>'success',
    'error'=>null
];
$users = array([1,'Semen','semoves@mail.ru'],[2,'Ivan','ivan@gmail.com'],[3,'Andrew','sergey96@yandex.ru']);
$fl = fopen("log.txt",'a');
$currentTime = date('j-M-Y H:i');
$outstr = "{$currentTime} Пользователь {$_POST['email']}: ";

if ($_POST['password']!=$_POST['password_dub']){
    $data['result'] = 'error';
    $data['error'] = 'Пароли не совпадают';
}
elseif (substr_count($_POST['email'],'@',1)!=1){
    $data['result'] = 'error';
    $data['error'] = 'Неверный формат email';
}
else{
    foreach ($users as $user){
        if ($_POST['email']==$user[2]){
            $data['result'] = 'error';
            $data['error'] = 'Пользователь с таким email уже существует';
        }
    }
}
if ($data['result'] == 'success'){
    fwrite($fl,$outstr.'успешная регистрация'.PHP_EOL);
}
else{
    fwrite($fl,$outstr.'ошибка регистрации: '.$data['error'].PHP_EOL);
}
fclose($fl);
echo json_encode($data);