<?php

$url1='https://lichess.org/games/export/lachess100?since=1644876000000&until=1648501200000&perfType=blitz,rapid,classical,correspondence&opening=true';

$user="lachess100";
//print_r($_REQUEST);

if (@$_REQUEST["linktextUC"]!="") {

    //$url="https://chess-results.com/tnr609201.aspx?lan=1&art=1&rd=7";
    $url=$_REQUEST["linktextUC"];
  }
   else {
    $url = $url1;
 }

//Check if filter is given
if (@$_REQUEST["usernameUC"]!="") {
    //echo "<h1>AAAAAAAAAAAAAAAAAAA</h1>";
    //print_r($_REQUEST); //$_REQUEST["selected_names"]
    $user=$_REQUEST["usernameUC"];
  }
   else {
    //$temp_keywords_pattern='u12|u99|etc';
 }

header("Content-disposition: attachment; filename=\"".$user.".pgn\"");

function grabURL($path){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$path);
    curl_setopt($ch, CURLOPT_FAILONERROR,1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $retValue = curl_exec($ch);          
    curl_close($ch);
    return $retValue;
}



$response=grabURL($url);

//"lachess100",


//echo "<hr><pre>".$response."</pre>";

$response =str_replace($user, ucfirst($user), $response, $count);
//echo "<hr><pre>".$response."</pre>";
//echo $url;
echo $response;
//echo "<hr><pre>".ucfirst($response)."</pre>";

?>