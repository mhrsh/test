<?php
function getTweets($searchWord, $dispNum)
{
	require_once("twiKey.php");
	require_once("twitteroauth/twitteroauth.php");
	$twObj = new TwitterOAuth($consumerKey,$consumerSecret,$accessToken,$accessTokenSecret);
	$req = $twObj->OAuthRequest('https://api.twitter.com/1.1/search/tweets.json','GET',
		array(
          	'lang' => 'ja',
          	'q' => $searchWord,
        	'count' => $dispNum
        	));
	$tweets = json_decode($req);
	return $tweets;
}

?>