<?php
	
	define("GOOGLE_EMAIL_CREATOR", "marnassiftcc@gmail.com");
	define("GOOGLE_OAUTH_REFRESH_TOKEN", "1/cIuHkNDb9Ll0VEQ-bdZ5VZorOtxXU_NqcaoYUlw-lbxIgOrJDtdun6zK6XiATCKT");
	define("GOOGLE_API_KEY", "AIzaSyBQSaiTN4kDiBX6778WTb0HyUb6-3N5Z3U");
	define("GOOGLE_CALENDAR_ID", "marnassiftcc@gmail.com");
	define("GOOGLE_OAUTH_TOKEN_ENDPOINT", "https://www.googleapis.com/oauth2/v3/token");
	define("GOOGLE_CALENDAR_API_ENDPOINT", "https://www.googleapis.com/calendar/v3/calendars/".GOOGLE_CALENDAR_ID);
	define("GOOGLE_CALENDAR_SCOPES", "https://www.googleapis.com/auth/calendar https://www.googleapis.com/auth/calendar.readonly");
	define("WEBDOCTOR_OAUTH_REDIRECT_URI", "http://oauth.webdoctor.com/workspace/webdoctor/agenda/oauth.php");
	define("GOOGLE_CLIENT_ID", "486374960317-ci76sevslhc2ojaibof4jf7eq3bna4hd.apps.googleusercontent.com");
	define("GOOGLE_CLIENT_SECRET", "o3aniFPOowP1DPvamyySEnti");
	define("GOOGLE_OAUTH_ENDPOINT", "https://accounts.google.com/o/oauth2/auth?scope=".urlencode(GOOGLE_CALENDAR_SCOPES)."&redirect_uri=".urlencode(WEBDOCTOR_OAUTH_REDIRECT_URI)."&client_id=".urlencode(GOOGLE_CLIENT_ID)."&response_type=code&hl=pt-BR&access_type=offline&approval_prompt=force");
	
	function exchange_google_access_code($access_code){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, GOOGLE_OAUTH_TOKEN_ENDPOINT);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "code=".$access_code."&client_id=".GOOGLE_CLIENT_ID."&client_secret=".GOOGLE_CLIENT_SECRET."&redirect_uri=".WEBDOCTOR_OAUTH_REDIRECT_URI."&grant_type=authorization_code");
		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response);
		return (isset($response->refresh_token))?$response->refresh_token:"ERROR";
	}
	
	function exchange_google_refresh_token($refresh_token){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, GOOGLE_OAUTH_TOKEN_ENDPOINT);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/x-www-form-urlencoded"));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "refresh_token=".$refresh_token."&client_id=".GOOGLE_CLIENT_ID."&client_secret=".GOOGLE_CLIENT_SECRET."&grant_type=refresh_token");
		$response = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($response);
		return (isset($response->access_token))?$response->access_token:"ERROR";
	}
	
	function google_calendar_inclusion($start, $end, $summary, $description, $email = NULL){
		$access_token = exchange_google_refresh_token(GOOGLE_OAUTH_REFRESH_TOKEN);
		$path = "/events";
		$method = "POST";
		$add_query_string_parameter = "sendNotifications=true";
		$email = ($email)?$email:"x@x.x";
		$data = '{
					"start": {
						"dateTime": "'.$start.'"
					},
					"end": {
						"dateTime": "'.$end.'"
					},
					"creator": {
						"email": "'.GOOGLE_EMAIL_CREATOR.'"
					},
					"summary": "'.$summary.'",
					"description": "'.$description.'",
					"visibility": "public",
					"attendees": [
						{
							"email": "'.$email.'"
						}
					]
				}';
		$response = google_calendar_request($path, $method, $access_token, $add_query_string_parameter, $data);
		$response = json_decode($response);
		return (isset($response->id))?$response->id:"ERROR";
	}
	
	function google_calendar_exclusion($event_id){
		$access_token = exchange_google_refresh_token(GOOGLE_OAUTH_REFRESH_TOKEN);
		$path = "/events/".$event_id;
		$method = "DELETE";
		return (google_calendar_request($path, $method, $access_token))?"ERROR":"OK";
	}
	
	function google_calendar_request($path, $method, $access_token, $add_querystring_parameter = "", $data = NULL){
		if($method != "GET" && $method != "POST" && $method != "PUT" && $method != "DELETE"){
			return '{"error": "Invalid method"}';
		}
		else{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, GOOGLE_CALENDAR_API_ENDPOINT.$path."?key=".GOOGLE_API_KEY."&alt=json&".$add_querystring_parameter);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json", "Authorization: Bearer ".$access_token));
			if($data){
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			$response = curl_exec($ch);
			curl_close($ch);
			return $response;
		}
	}
			  
	//echo google_calendar_inclusion("2015-09-24T19:00:00-03:00", "2015-09-24T19:30:00-03:00", "Consulta", "Consulta com Dr. X", NULL);
	//echo google_calendar_exclusion("2m70vqha2qvljom93ljotevmj4");
	//echo google_calendar_exclusion("f3p961h05vfk9in7tfqiakop0s");
	
?>