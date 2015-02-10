<a href=".">商品検索APIを使ってみる</a><br>
<a href="./categoryRanking">カテゴリランキングAPIを使ってみる</a>

<p>
  <?php
  echo $this->Form->create(false,array('type'=>'post','action'=>'.'));
  echo $this->Form->label('sort',"表示順");
  echo $this->Form->select('sort',
    array(
     "-score" => "おすすめ順",
     "+price" => "商品価格が安い順",
     "-price" => "商品価格が高い順",
     "+name" => "ストア名昇順",
     "-name" => "ストア名降順",
     "-sold" => "売れ筋順"
      ),array('default' => '-score')
    );
  echo $this->Form->label('category_id',"商品カテゴリ");
  echo $this->Form->select('category_id',
    array(
      "1" => "すべてのカテゴリから",
      "13457"=> "ファッション",
      "2498"=> "食品",
      "2500"=> "ダイエット、健康",
      "2501"=> "コスメ、香水",
      "2502"=> "パソコン、周辺機器",
      "2504"=> "AV機器、カメラ",
      "2505"=> "家電",
      "2506"=> "家具、インテリア",
      "2507"=> "花、ガーデニング",
      "2508"=> "キッチン、生活雑貨、日用品",
      "2503"=> "DIY、工具、文具",
      "2509"=> "ペット用品、生き物",
      "2510"=> "楽器、趣味、学習",
      "2511"=> "ゲーム、おもちゃ",
      "2497"=> "ベビー、キッズ、マタニティ",
      "2512"=> "スポーツ",
      "2513"=> "レジャー、アウトドア",
      "2514"=> "自転車、車、バイク用品",
      "2516"=> "CD、音楽ソフト",
      "2517"=> "DVD、映像ソフト",
      "10002"=> "本、雑誌、コミック"
      ),array('default' => '1')
    );  

  echo $this->Form->label('query',"検索ワード");
  echo $this->Form->text('query', array('style' => 'width:200px'));
  echo $this->Form->end("検索");
  ?>
</p>


<?php
if($hits != null){
  foreach ($hits as $hit) { ?>
<div>
  <p><a href="<?php echo h($hit->Url); ?>"><?php echo h($hit->Name); ?></a></p>
  <p><a href="<?php echo h($hit->Url); ?>">
    <img src="<?php echo h($hit->Image->Medium); ?>" /></a></p>
</div>
<?php } } ?>

</div>

<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn1_125_17.gif" title="Webサービス by Yahoo! JAPAN" alt="Web Services by Yahoo! JAPAN" width="125" height="17" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->