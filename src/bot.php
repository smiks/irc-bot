<?php
$socket = fsockopen("irc.freenode.net", 6667);
fputs($socket,"USER userbot google.com SB :Sbot\n");
fputs($socket,"NICK nickbot\n");
fputs($socket,"JOIN #channel\n");
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
		if ($command == ":welcome") 
		{	
		fputs($socket, "PRIVMSG ".$ex[2]." :have a nice day!\n");
		}
 
	}
}
?>