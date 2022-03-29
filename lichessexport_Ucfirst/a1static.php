<?php
$url1='https://lichess.org/games/export/lichess100?since=1644876000000&until=1648501200000&perfType=blitz,rapid,classical,correspondence&opening=true';

$user="lichess100";

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

$response=grabURL($url1);




//echo "<hr><pre>".$response."</pre>";
// ucfirst
$response =str_replace($user, ucfirst($user), $response, $count);
echo "<hr><pre>".$response."</pre>";
//echo "<hr><pre>".ucfirst($response)."</pre>";

?>