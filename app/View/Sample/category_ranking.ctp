<a href="./index">商品検索APIを使ってみる</a><br>
<a href="./categoryRanking">カテゴリランキングAPIを使ってみる</a>

<p>
  <?php
  echo $this->Form->create(false,array('type'=>'post','action'=>'./categoryRanking'));
  echo $this->Form->label('category_id',"商品カテゴリ");
  echo $this->Form->select('category_id', $categories, array('default' => '1'));
  echo $this->Form->end("ランキングを表示");
  ?>
</p>

<?php foreach ($ranking_data as $ranking) { ?>
<div>
	<p><a href="<?php echo h($ranking->Url); ?>"><?php echo h($ranking->Name); ?></a></p>
	<p><a href="<?php echo h($ranking->Url); ?>"><img src="<?php echo h($ranking->Image->Medium); ?>" /></a><?php echo h($ranking->Description); ?></p>
</div>
<?php } ?>
