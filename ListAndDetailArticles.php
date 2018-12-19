<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.hurriyet.com.tr/v1/articles",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "apikey: APIKEY-HERE"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$array=json_decode($response, True);
	foreach($array as $news){
		$curl_news = curl_init();
		curl_setopt_array($curl_news, array(
		  CURLOPT_URL => "https://api.hurriyet.com.tr/v1/articles/".$news['Id'],
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"accept: application/json",
			"apikey: APIKEY-HERE"
		  ),
		));
		$response_news = curl_exec($curl_news);
		$err = curl_error($curl_news);
		curl_close($curl_news);
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$news_detail=json_decode($response_news, True);
			print_r($news_detail);
		}		
	}
}
