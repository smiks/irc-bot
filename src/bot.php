<?php
function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$socket = fsockopen("irc.freenode.net", 6667);
fputs($socket,"USER userbot google.com SB :Sbot\n");
fputs($socket,"NICK nickbot\n");
fputs($socket,"JOIN #channel\n");
$yes=0;$no=0;
while (!feof($socket)) {
	while($data = fgets($socket, 128)) {
		echo nl2br($data);
		flush();
		$ex = explode(' ', $data);
		if($ex[0] == "PING")
		{
		fputs($socket, "PONG ".$ex[1]."\n");
		}
		$command = str_replace(array(chr(10), chr(13)), '', $ex[3]);
		$user = get_string_between($data,':','!');
		$command2 = get_string_between(nl2br($data),'#channel ','<br />');
include("commands.php");
		time_nanosleep(0, 200000000);
	}
}
?>