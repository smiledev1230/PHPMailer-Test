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

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sales Entry</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
body
{background:#eee;
  margin-top: 17px;
  margin-right: 0px;
  margin-bottom: 15px;
  margin-left: 0px;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
  text-align: center;
  font-size: small;
  font-family: "Lucida Grande",Tahoma,Arial,Verdana,sans-serif;
}

/* Line 1 */
#container
{
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 10px;
  margin-left: auto;
  padding:20px;
  font-size:14px;
  width:642px !important;
}
</style>

<!-- CSS -->
<link href="sales/css/structure.css" rel="stylesheet">
<link href="sales/css/form.css" rel="stylesheet">

</head>

<body id="public">
<img src="https://honestinstall.com/images/Payment-Gateway-Header.png" style="margin-bottom:-5px;padding:0"/>
<div id="container" class="ltr">

 
<?
$fname=$_POST['Field2'];
$lname=$_POST['Field3'];
$amount=$_POST['Field5'];
$amounts=explode('.',$amount);
$amount_dollar=$amounts[0];
$amount_cents=$amounts[1];
$company=$_POST['Field9'];
$reference=$_POST['Field6'];
$notes=$_POST['Field7'];
$email=$_POST['email'];
$link="https://honestinstall.com/payment/form/index.php?Field1=$fname&Field2=$lname&Field8=$amount_dollar&Field8-1=$amount_cents&Field4=$company&Field5=$reference&Field6=$notes&email=$email";

# Shorten Long URL
$short=$bitly->shorten("$link");
# Expend Short URL
//$bitly->expend('http://bit.ly/15MCr0p');

//echo "$fname $lname <BR>$amount_dollar $amoun_cents <BR>company: $company<BR> $reference<BR>$notes";
echo "<strong>You entered:</strong><BR><BR>Name: $fname $lname<BR>Amount: $$amount<BR>Company:  $company<BR>Reference:  $reference<BR>Notes: $notes ";
?>
<br>
<br>

<a href="<? echo "https://honestinstall.com/payment/sales/index.php?Field1=$fname&Field2=$lname&Field8=$amount_dollar.$amount_cents&Field4=$company&Field5=$reference&Field6=$notes&email=$email"; ?>">
<button type="button" class="btn btn-warning">Edit</button></a>
<BR><BR>Here's the link to the payment form (click on the textbox and control-c to copy):
<br>
<br>

Short:  <input type="text" onfocus="this.select();" onmouseup="return false;"  value="<? echo $short; ?>"/>
<br>
<br>
Long:  <input type="text" onfocus="this.select();" onmouseup="return false;"  value="<? echo $link; ?>" style="width:500px"/>
<br>
<br>

<?
echo"
  <a href='$link' target='_blank'><button type='button' class='btn btn-warning'>Preview Customer Form</button></a>";
?>


<br>
<br>
<HR><BR>
<a href="https://honestinstall.com/payment/sales">
<button type="button" class="btn btn-primary" onClick="if(!confirm('This will clear all the previously inputted info, ARE YOU SURE?')){return false;}">Start Over</button></a>
<br>
<br>
</div>

</body>
</html>
