<h1>商品検索APIを使ってみる</h1>

<p>
  <?php
  echo $this->Form->create(false,array('type'=>'post','action'=>'./search'));
  echo $this->Form->label('sort',"表示順");
  echo $this->Form->select('sort', $sortOrder, array('default' => '-score'));
  echo $this->Form->label('category_id',"商品カテゴリ");
  echo $this->Form->select('category_id', $categories, array('default' => '1'));
  echo $this->Form->label('query',"検索ワード");
  echo $this->Form->text('query', array('style' => 'width:200px'));
  echo $this->Form->end("検索");
  ?>
  <hr>
</p>

<div class="row">
<?php
if($hits != null){
  foreach ($hits as $hit) { ?>
<div class="span4">
  <p><a href="<?php echo h($hit->Url); ?>">
    <img src="<?php echo h($hit->Image->Medium); ?>" /></a></p>
  <p><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></p>
  <p><a href=<?php echo "./review/". h($hit->Code); ?>>レビューを見る</a></p>
</div>
<?php } } ?>
</div>

</div>

