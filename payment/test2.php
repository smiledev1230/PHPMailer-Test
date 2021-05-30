<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
class Bitly
{
	var $apiURL = 'http://api.bit.ly/v3/';
	var $apiQuery = '';
 
	/**
	 * @param str $login as Bitly login
	 * @param str $apiKey as Bitly API Key
	 */
	function __construct($login, $apiKey)
	{
		$this->apiQuery = 'login=' . $login;
		$this->apiQuery .= '&apiKey=' . $apiKey;
		$this->apiQuery .= '&format=json';
	}
 
	/**
	 * Short Long URL
	 * @param string URL
	 * @return string || void
	 */
	function shorten($uri)
	{
		$this->apiQuery .= '&uri=' . urlencode($uri);
		$query = $this->apiURL . 'shorten?' . $this->apiQuery;
		$data = $this->curl($query);
		$json = json_decode($data);
		return isset($json->data->url) ? $json->data->url : '';
	}
 
	/**
	 * Expend Short URL
	 * @param str URL
	 * @return str || void
	 */
	function expend($uri)
	{
		$this->apiQuery .= '&shortUrl='.urlencode($uri);
		$query = $this->apiURL . 'expand?' . $this->apiQuery;
		$data = $this->curl($query);
		$json = json_decode($data);
		return isset($json->data->expand[0]->long_url) ? $json->data->expand[0]->long_url : '';
	}
 
	/**
	 * Send CURL Request
	 * @param string URL
	 * @return string
	 */
	function curl($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}

# Bitly User Login
$login = 'honestinstall';
# Bitly API key
$api = 'R_4db3814232bf454ea4d99101ddc863aa';
 
$bitly = new Bitly($login, $api);
# Shorten Long URL
$short=$bitly->shorten('http://www.w3bees.com');
# Expend Short URL
$bitly->expend('http://bit.ly/15MCr0p');
echo "short: $short";

?>
</body>
</html>
