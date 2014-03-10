<?php
	include_once('./serverSide.php');
?>
<html>
<head><title>SPD Access Control Example</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!-- Javascript CORS Function Library -->
<script type="text/javascript" src="cors.js"></script>

</head>
<body>
<h1 id='page_header'></h1>
<script type="text/javascript">
$(document).ready(function() {
    
	var url = '';
	var JSONData = '';
	
	//add onclick events to buttons
	$('#local').click(function(){
	
		
		url = 'http://localhost/jsonp_example/sample_content.js';
		
		
		if (url != '' && url) {
			console.log("Requesting URL: " + url);
			xBrowserCORSRequest('GET', url, false);
		} else {
		
			console.log("Request not sent - Invalid URL: " + url);
		
		}
				
	
	});
		$('#local_ie').click(function(){
	
		
		url = 'http://localhost/jsonp_example/sample_content.js';
		
		
		if (url != '' && url) {
			console.log("Requesting URL: " + url);
			xBrowserCORSRequest('GET', url, true);
		} else {
		
			console.log("Request not sent - Invalid URL: " + url);
		
		}
				
	
	});
	$('#remote').click(function(){
		
		//url =  "http://dotomi.javascriptprototype.com:8089/msg/spd/5333/22211/22225?dmm_param_1=decision&fpctok=AQECw3EZb1VSSAEBAQErAQEV1AE&user_ip=69.241.45.78&user_agent=Mozilla%2F5.0+%28iPad%3B+CPU+OS+5_1+like+Mac+OS+X%29+AppleWebKit%2F534.46+%28KHTML%2C+like+Gecko%29+Version%2F5+Mobile%2F9B176+Safari%2F7534.48.3?dtm_com=2&dtm_format=5&cli_callback_cgi=http%3A%2F%2Fustest-o01.dotomi.com%2Fregindex.php&dtm_cid=5333&dtm_cmagic=caa892&dtm_fid=101&cli_promo_id=1234&dtm_test=&dtm_user_type=&dtm_test_pp_reg=&dtm_user_agent=Mozilla%2F5.0+%28iPad%3B+CPU+OS+5_1+like+Mac+OS+X%29+AppleWebKit%2F534.46+%28KHTML%2C+like+Gecko%29+Version%2F5+Mobile%2F9B176+Safari";
	
		url = $('#remote_url').val();
	
		
		if (url != '' && url) {
			console.log("Requesting URL: " + url);
			xBrowserCORSRequest('GET', url, false);
		} else {
		
			console.log("Request not sent - Invalid URL: " + url);
		
		}
		
	});
		$('#remote_ie').click(function(){
		
		//url =  "http://dotomi.javascriptprototype.com:8089/msg/spd/5333/22211/22225?dmm_param_1=decision&fpctok=AQECw3EZb1VSSAEBAQErAQEV1AE&user_ip=69.241.45.78&user_agent=Mozilla%2F5.0+%28iPad%3B+CPU+OS+5_1+like+Mac+OS+X%29+AppleWebKit%2F534.46+%28KHTML%2C+like+Gecko%29+Version%2F5+Mobile%2F9B176+Safari%2F7534.48.3?dtm_com=2&dtm_format=5&cli_callback_cgi=http%3A%2F%2Fustest-o01.dotomi.com%2Fregindex.php&dtm_cid=5333&dtm_cmagic=caa892&dtm_fid=101&cli_promo_id=1234&dtm_test=&dtm_user_type=&dtm_test_pp_reg=&dtm_user_agent=Mozilla%2F5.0+%28iPad%3B+CPU+OS+5_1+like+Mac+OS+X%29+AppleWebKit%2F534.46+%28KHTML%2C+like+Gecko%29+Version%2F5+Mobile%2F9B176+Safari";
	
		url = $('#remote_url').val();
	
		
		if (url != '' && url) {
			console.log("Requesting URL: " + url);
			xBrowserCORSRequest('GET', url, true);
		} else {
		
			console.log("Request not sent - Invalid URL: " + url);
		
		}
		
	});
	
	
});	
</script>


<h1>Client Side Testing</h1>
<form>
		<p>Local URL: <input type='text' id='local_url' size='50' value='http://localhost/jsonp_example/sample_content.js' disabled><button type ='button' id='local'>Fetch Local File</button><button type ='button' id='local_ie'>Fetch Local File IE</button></p>
		
		<p>Remote URL: <input type='text' id='remote_url' size='50'><button type ='button' id='remote'>Fetch Remote File</button><button type ='button' id='remote_ie'>Fetch Remote File IE</button></p>
			
</form>
<textarea id='response' cols='50' rows='15'>Response: </textarea>

<h1>Server Side Testing</h1>
<form method='get'>

		
		<button type ='submit' id='server_remote' name='send' value='true'>Fetch Remote File</button>
			
</form>
<textarea id='server_response' cols='100' rows='15'><?php echo $content; ?></textarea>


<table id='JSONOutput'>
<tbody>


</tbody>
</table>



</body></html>