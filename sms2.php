<?php
$c2route=$_SESSION['c1route'];
$a2route=$_SESSION['a1route'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transcendence";
echo "</br></br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
echo "Connected to the Database";
echo "</br><hr>";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

error_reporting(E_ALL);
ob_implicit_flush(true);
$smsapp=new sms();
$smsapp->setGateway('way2sms');
$myno="9444331913";
$p="1234";
switch($c2route)
{
case 1:
{
$sql1 = "SELECT CONTACT FROM route1";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 2:
{
$sql1 = "SELECT CONTACT FROM route2";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 3:
{
$sql1 = "SELECT CONTACT FROM route3";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 4:
{
$sql1 = "SELECT CONTACT FROM route4";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 5:
{
$sql1 = "SELECT CONTACT FROM route5";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 6:
{
$sql1 = "SELECT CONTACT FROM route6";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 7:
{
$sql1 = "SELECT CONTACT FROM route7";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 8:
{
$sql1 = "SELECT CONTACT FROM route8";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 9:
{
$sql1 = "SELECT CONTACT FROM route9";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
case 10:
{
$sql1 = "SELECT CONTACT FROM route10";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
	$tonum=$row["CONTACT"];
    $mess="Your bus route is cancelled..Sorry for the inconvenience..Your alternate route is ".$a2route;
    }
}
break;
}
default:
{
echo"invalid";	
}
}

cprint("</br>Logging in ..\n");
$ret=$smsapp->login($myno,$p);

if (!$ret) {
   cprint("</br>Error Logging In");
   exit(1);
}

print("</br>Logged in Successfully\n");

print("</br>Sending SMS ..\n");
$ret=$smsapp->send($tonum,$mess);

if (!$ret) {
   print("Error in sending message");
   exit(1);
}
print("</br>Message sent");
class sms
{
    var $username,$password;
    var $curl,$server,$data;

    public function __construct()
    {
        $this->curl=new cURL();
        //$this->curl->setProxy("");
        $this->data=array();
    }

    public function setGateway($serverName)
    {
        switch($serverName)
        {
            case 'way2sms':
            $this->server='way2sms';
            break;
           
            default :
            print "</br>Currently only Way2sms is supported";
            break;
        }
    }
    public function login($username,$password)
    {
        $server=$this->server;
        return(call_user_func(array($this,"login_$server"),$username,$password));
    }

    public function send($number,$msg)
    {
        $server=$this->server;
        return(call_user_func(array($this,"send_$server"),$number,$msg));
    }

    private function login_way2sms($username,$password)
    {
        $html=($this->curl->post("http://www.way2sms.com","1=1"));

        if (!preg_match("/Location:(.*)\n/",$html,$matches)) {
            print("</br>Error getting domain");
            cprint($html);
            return(0);
        }

        $domain=trim($matches[1]);
        $this->data['domain']=$domain;
        cprint("Domain:$domain");

        $html= $this->curl->post(
            "${domain}Login1.action",
            "username=$username&password=$password&Submit=Sign+in"
        );


        if (!preg_match('/<h3>Welcome to Way2SMS<.h3>/',$html)) {
            print("</br>Error Logging In");
            print($html);
            return(0);
        }

        print("</br>Logged In Successfully");

        if (!preg_match("/Location:(.*)[?]id=(.*)\n/",$html,$matches)) {
            print("</br>Error getting location & token");
            cprint($html);
            return(0);
        }

        $referer=trim($matches[1]);
        $token=trim($matches[2]);
        $this->data['referer']=$referer;
        $this->data['token']=$token;
        cprint("Referer:$referer");
        cprint("Token:$token");
        return(1);
    }
   
    
    private function send_way2sms($number,$msg)
    {
        $domain=$this->data['domain'];
        print("Msg:$msg");
        $token=$this->data['token'];

        $html=$this->curl->post(
            "{$domain}main.action?section=s",
            "vfType=register_verify&Token=${token}",
            $this->data['referer']
        );

        $msg=urlencode($msg);
        $html=$this->curl->post(
            "{$domain}smstoss.action",
            "ssaction=ss&Token=${token}&mobile=$number&message=$msg"
        );

        if (!preg_match('/Message has been submitted successfully/',$html)) {
            print("</br>Error in sending sms");
            print($html);
            return(0);
        }
        else {
            echo "<script type=\"text/javascript\">alert('SMS Successfully sended');</script>";
           
            print("</br>sms sended sucessfully");
            print("</br>Logged In Successfully");
            return(1);
        }
    }

}
class cURL {
var $headers;
var $user_agent;
var $compression;
var $cookie_file;
var $proxy;
function cURL($cookies=TRUE,$cookie='cookies.txt',$compression='gzip',$proxy='') {
$this->headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$this->headers[] = 'Connection: Keep-Alive';
$this->headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
$this->headers[] = 'Accept-Language: en-us,en;q=0.5';
$this->headers[] = 'Accept-Encoding    gzip,deflate';
$this->headers[] = 'Keep-Alive: 300';
$this->headers[] = 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7';
$this->user_agent = 'iPhone 4.0';
$this->compression=$compression;
$this->proxy=$proxy;
$this->cookies=$cookies;
if ($this->cookies == TRUE) $this->cookie($cookie);
}

function setUserAgent($ua)
{
   
}
function setProxy($proxy)
{
    $this->proxy=$proxy;
}

function cookie($cookie_file) {
if (file_exists($cookie_file)) {
$this->cookie_file=$cookie_file;
} else {
fopen($cookie_file,'w') or $this->error('The cookie file could not be opened. Make sure this directory has the correct permissions');
$this->cookie_file=$cookie_file;
fclose($this->cookie_file);
}
}

function get($url) {
$process = curl_init($url);
curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
curl_setopt($process, CURLOPT_HEADER, 0);
curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
curl_setopt($process,CURLOPT_ENCODING , $this->compression);
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_PROXY, $this->proxy);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
$return = curl_exec($process);   
curl_close($process);
return $return;
}
function post($url,$data,$referer=false) {
$process = curl_init($url);
curl_setopt($process, CURLOPT_HTTPHEADER, $this->headers);
curl_setopt($process, CURLOPT_HEADER, 1);
curl_setopt($process, CURLOPT_USERAGENT, $this->user_agent);
if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEFILE, $this->cookie_file);
if ($this->cookies == TRUE) curl_setopt($process, CURLOPT_COOKIEJAR, $this->cookie_file);
curl_setopt($process, CURLOPT_ENCODING , $this->compression);
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_PROXY, $this->proxy);
curl_setopt($process, CURLOPT_POSTFIELDS, $data);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
if($referer)
{
curl_setopt($process, CURLOPT_REFERER, $referer);
}
curl_setopt($process, CURLOPT_POST, 1);
  curl_setopt($process, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($process, CURLOPT_SSL_VERIFYHOST, 2);
$return = curl_exec($process);
curl_close($process);
return $return;
}
function error($error) {
echo "<center><div style='width:500px;border: 3px solid #FFEEFF; padding: 3px; background-color: #FFDDFF;font-family: verdana; font-size: 10px'><b>cURL Error</b><br>$error</div></center>";
die;
}
}
function cprint($str) {
   static $debug_2014=-1;

   if ($debug_2014===-1) {
       if (!empty($GLOBALS["_SERVER"]["DEBUG_2014"])) { $debug_2014=1; }
       else { $debug_2014=0; }
   }
   if ($debug_2014===1) { echo $str,"\n"; }
}
echo "</br></br><hr>";
echo "<h2><center> Message Sent Successfully!!!</center></h2>";
echo"<hr>";
?>