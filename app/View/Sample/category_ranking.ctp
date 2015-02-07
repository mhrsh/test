<a href="./index">商品検索APIを使ってみる</a><br>
<a href="./categoryRanking">カテゴリランキングAPIを使ってみる</a>

<p>
  <?php
  echo $this->Form->create(false,array('type'=>'post','action'=>'./categoryRanking'));
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
  echo $this->Form->end("ランキングを表示");
  ?>
</p>

<?php foreach ($ranking_data as $ranking) { ?>
<div>
	<p><a href="<?php echo h($ranking->Url); ?>"><?php echo h($ranking->Name); ?></a></p>
	<p><a href="<?php echo h($ranking->Url); ?>"><img src="<?php echo h($ranking->Image->Medium); ?>" /></a><?php echo h($ranking->Description); ?></p>
</div>
<?php } ?>
