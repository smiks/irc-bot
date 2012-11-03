<?
$bothi=rand(1,2);
if ($user == "_botko_" && $bothi == 1) 
{
fputs($socket, "PRIVMSG ".$ex[2]." :Another bot. Brother from another mother\n");
}
if ($user == "_haibot_" && $bothi == 1) 
{
fputs($socket, "PRIVMSG ".$ex[2]." :Another bot. Brother from another mother\n");
}
switch($command)
{
	case ":welcome":
	fputs($socket, "PRIVMSG ".$ex[2]." :Welcome here. I wish you a nice chat!\n");
	break;

	case ":explode":
	fputs($socket, "PRIVMSG ".$ex[2]." :did you mean sexplode\n");
	break;

	case ":_sbot_++":
	fputs($socket, "PRIVMSG ".$ex[2]." :thank you ".$user."\n");
	break;

	case ":@listen":
	fputs($socket, "PRIVMSG ".$ex[2]." :Listen everyone. ".$user." has something to tell you.\n");
	break;

	case ":@yes":
	$yes+=1;
	fputs($socket, "PRIVMSG ".$ex[2]." :-yes- number ".$yes."\n");
	break;

	case ":@no":
	$no+=1;
	fputs($socket, "PRIVMSG ".$ex[2]." :-no- number ".$no."\n");
	break;

	case ":@count":
	fputs($socket, "PRIVMSG ".$ex[2]." :-yes- ".$yes." time(s) -- -no- ".$no." time(s)\n");
	break;

}
switch($command2)
{
	case ":Retweeted it!":
	$yes=0;$no=0;
	break;

	case ":Should I retweet that?":
	$rand=rand(1,2);
	if($rand == 1){$ans='yes';}
	elseif($rand == 2){$ans='no';}
	$yes=0;$no=0;
	fputs($socket, "PRIVMSG ".$ex[2]." :".$ans."\n");
	break;

	case ":Want me to retweet that?":
	$rand=rand(1,2);
	if($rand == 1){$ans='yes';}
	elseif($rand == 2){$ans='no';}
	$yes=0;$no=0;
	fputs($socket, "PRIVMSG ".$ex[2]." :".$ans."\n");
	break;
}
$looking='@world';
$match1=strstr($command,$looking);
$match2=strstr($command,$looking,true);
if(strlen($match1) != 0 || strlen($match2) != 0){$yes=0;$no=0;}
$looking='_sbot_';
$match1=strstr($command,$looking);
$match2=strstr($command,$looking,true);
if((strlen($match1) != 0 || strlen($match2) != 0) && $user != '_sbot_')
{
fputs($socket, "PRIVMSG ".$ex[2]." :".$user.", talking behind my back is not polite.\n");
}
$looking='brb';
$match1=strstr($command,$looking);
$match2=strstr($command,$looking,true);
if(strlen($match1) != 0 || strlen($match2) != 0)
{
fputs($socket, "PRIVMSG ".$ex[2]." :take your time\n");
}
?>