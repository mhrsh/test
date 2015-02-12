<h1>商品レビューとSNSでの口コミ</h1>

<div>
	<p><a href="<?php echo h($hit->Url); ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a></p>
	<p><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></p>
	<p><?php echo "価格: ￥". $hit->Price; ?></p>
	<p><?php echo "レビュー平均評価: ". $hit->Review->Rate. "<br>レビュー保持数: ". $hit->Review->Count; ?></p>
	<p><?php echo $hit->Description; ?></p>
</div>

<div>
	<iframe src="<?php echo h($hit->Review->Url); ?>" name="yahooReview" width="650" height="800">
	この部分はインラインフレームを使用しています。
	</iframe>
</div>

<div>
<?php
	$dispTweets = "";
	if (isset($tweets) && empty($tweets->errors)) {
		$tweets = $tweets->statuses;
		$dispTweets = "<dl>";
		foreach ($tweets as $val) {
			$dispTweets .=  "<dt>" . date('Y-m-d H:i:s', strtotime($val->created_at))
			. '<img src="'. $val->user->profile_image_url . '" width="20" height="20">' 
			. "<br>" .  " [" . $val->user->name . "]" . "</dt>";
		$dispTweets .= "<dd>" . $val->text . '<br><HR size="5">' . "</dt>";
	}
	$dispTweets .= "</dl>";
} else {
	$dispTweets .= "ツイートなし";
}
echo $dispTweets;
?>
</div>