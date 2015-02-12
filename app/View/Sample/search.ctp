<a href="./index">index</a><br>
<a href="./search">サンプル：商品検索APIを使ってみる</a><br>
<a href="./categoryRanking">サンプル：カテゴリランキングAPIを使ってみる</a><br>
<a href="./bookSearch">書籍の検索とレビュー</a>
<hr>

<p>
  <?php
  echo $this->Form->create(false,array('type'=>'post','action'=>'search'));
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


<?php
if($hits != null){
  foreach ($hits as $hit) { ?>
    <div>
      <p><a href=<?php echo "./review/". h($hit->Code); ?>>レビューとSNSの口コミを見る</a></p>
      <p><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></p>
      <p><a href="<?php echo h($hit->Url); ?>"><img src="<?php echo h($hit->Image->Medium); ?>" /></a></p>
    </div>
    <hr>
<?php } } ?>

</div>

<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn1_125_17.gif" title="Webサービス by Yahoo! JAPAN" alt="Web Services by Yahoo! JAPAN" width="125" height="17" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->