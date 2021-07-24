<?php
session_start();
require 'vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = "8jFqKkLZVrLXQfKfhPelQ8Nlc";
$consumerSecret = "KZ40olwXboDSyKMS4WUMGJH7A7sSpogKrqQezCEJYbziSrd7ci";
$accessToken = "1407728282154389507-XCVB5tbBlNAgb7jJAhdfReStJfH3uM";
$accessTokenSecret = "uvMl9bjP8uhmzpaxDlwUb8j7lD3y2ga00AWT6vliYcX1s";

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$result = $twitter->get('account/verify_credentials'); //アカウントの有効性確認

if($twitter->getLastHttpCode() == 200) {
  $postMsg = "OK";
  $result = $twitter->oAuthRequest("https://api.twitter.com/1.1/statuses/update.json","POST",array("status"=>$postMsg));
} else {
    // ツイート失敗
    print "tweet failed\n";
}
?>
