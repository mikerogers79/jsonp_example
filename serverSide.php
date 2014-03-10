<?php
/*
Sample server side call to SPD.


*/

$content = 'NO DATA';
	$fpc_tok = 'AQENKEEZN8YeOQEuvUblAQEJSwE';
	
	
	$url = 'http://dotomi.javascriptprototype.com:8089/msg/spd/5333/22211/22225?dmm_param_1=decision&fpctok=AQECw3EZb1VSSAEBAQErAQEV1AE&user_ip=69.241.45.78&user_agent=Mozilla%2F5.0+%28iPad%3B+CPU+OS+5_1+like+Mac+OS+X%29+AppleWebKit%2F534.46+%28KHTML%2C+like+Gecko%29+Version%2F5+Mobile%2F9B176+Safari%2F7534.48.3?dtm_com=2&dtm_format=5&cli_callback_cgi=http%3A%2F%2Fustest-o01.dotomi.com%2Fregindex.php&dtm_cid=5333&dtm_cmagic=caa892&dtm_fid=101&cli_promo_id=1234&dtm_test=&dtm_user_type=&dtm_test_pp_reg=&dtm_user_agent=Mozilla%2F5.0+%28iPad%3B+CPU+OS+5_1+like+Mac+OS+X%29+AppleWebKit%2F534.46+%28KHTML%2C+like+Gecko%29+Version%2F5+Mobile%2F9B176+Safari';
	
	
	$ch = curl_init( $url );
  
  if ($_GET['send'] == 'true') {
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $_POST );

		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt( $ch, CURLOPT_HEADER, true );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

		//curl_setopt( $ch, CURLOPT_USERAGENT, $_GET['user_agent'] ? $_GET['user_agent'] : $_SERVER['HTTP_USER_AGENT'] );

		$content = curl_exec( $ch );
		$status = curl_getinfo( $ch );


		curl_close( $ch );
  }
?>