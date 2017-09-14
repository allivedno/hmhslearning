

<?php
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
echo $hostname;
$REMOTE_ADDR=$hostname;
$ip= $REMOTE_ADDR;
echo " Your hostname : " . GetHostByName($ip);

echo "<br>";
echo "<br>";
echo "<br>";


echo GetMAC();

function GetMAC(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}
?>


