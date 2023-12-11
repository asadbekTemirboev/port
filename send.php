<?
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' && !empty($_POST['name'])) {
   
   
   
   /* ОТПРАВКА ПИСЬМА ЗАКАЗА В TELEGRAM */
/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}


    
    {$message = '
<html>
<body>
<center>	
<table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
 <tr><td colspan=2 align=center bgcolor="#E4E4E4"><b>Информация</b></td></tr>
 <tr>
  <td><b>Имя</b></td>
  <td>' . $_POST['name'] . '</td>
 </tr>
 <tr>
  <td><b>Номер</b></td>
  <td> <b>' . $_POST['phone'] . '</b> </td>
 </tr>
  <tr>
  <td><b>Принятие политика конфедициальности</b></td>
  <td> '.$_POST['test'].'</td>
 </tr>
 <tr>
  <td><b>Тема</b></td>
  <td>'.$subject.'</td>
 </tr>
 <tr>
  <td><b>Сообщение</b></td>
  <td>'. $_POST['text'] . '</td>
 </tr>
</table>
</center>	
</body>
</html>'; }

    $mailTo = "apkvar.asadbek@gmail.com"; // Ваш e-mail
    $subject = "Письмо с сайта"; // Тема сообщения
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: info@site.ru <info@site.ru>\r\n";
    if(mail($mailTo, $subject, $message, $headers)) {
        echo "Спасибо, ".$_POST['name'].", мы свяжемся с вами в самое ближайшее время!"; 
    } else {
        echo "Сообщение не отправлено!"; 
    }
    
}
?>
