<!-- TODO: navbarなどは共通化しincludeする．異なる階層からリンクを貼るときどうするか -->
<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="../index"><?php echo __('mhrsh/ys_api_test_2015'); ?></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="../index">Home</a></li>
						<li><a href="../search">商品検索APIを使ってみる</a></li>
						<li><a href="../categoryRanking">カテゴリランキングAPIを使ってみる</a></li>
						<li><a href="https://github.com/mhrsh/ys_api_test_2015">GitHubページ</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
</div>

<h1>商品レビューとSNSでの口コミ</h1>

<div>
	<p><a href="<?php echo h($hit->Url); ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a></p>
	<p><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></p>
	<p><?php echo "価格: ￥". $hit->Price; ?></p>
	<p><?php echo "レビュー平均評価: ". $hit->Review->Rate. "<br>レビュー保持数: ". $hit->Review->Count; ?></p>
	<p><?php echo $hit->Description; ?></p>
</div>

<div class="row">
	<div class="span8">
		<iframe src="<?php echo h($hit->Review->Url); ?>" name="yahooReview" width="100%" height="800" >
		この部分はインラインフレームを使用しています。
		</iframe>
	</div>

	<div class="span4">

		<p>
			<?php
			echo "<p>twitter検索</p>";
			echo $this->Form->create(false,array('type'=>'post','action'=>'./review/'. h($hit->Code)));
  			echo $this->Form->input('twiSearch', array('default' => $hit->Name, 'label' => false,));
			echo $this->Form->end("検索");
			?>
		</p>

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
</div>