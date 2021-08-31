<?php
function callAPI($name) {
//Runs GET cURL script for all cards in API	
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://omgvamp-hearthstone-v1.p.rapidapi.com/cards/search/$name",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: omgvamp-hearthstone-v1.p.rapidapi.com",
		"x-rapidapi-key: 5b21beee5dmsh75a6c9db8d778d1p140593jsnacba14172a1d"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

$responseData = json_decode($response, TRUE);

curl_close($curl);
//If cURL call errors then the call dies
if ($err) {
	die("cURL Error #:" . $err);
} else {
	return$responseData;
}
}
//Searches API for cards with word "legend", turns it into array

$results = callAPI($name);

$_SESSION['cards'] = $results;

$resKeys = array_keys($results);
 
