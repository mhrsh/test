<h1>商品レビューとSNSでの口コミ</h1>

<div>
	<p><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></p>
	<p><a href="<?php echo h($hit->Url); ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a></p>
</div>

<iframe src="<?php echo h($hit->Review->Url); ?>" name="yahooReview" width="650" height="800">
この部分はインラインフレームを使用しています。
</iframe>