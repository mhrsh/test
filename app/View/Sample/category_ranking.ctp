<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="./index"><?php echo __('mhrsh/ys_api_test_2015'); ?></a>
				<div class="nav-collapse">
					<ul class="nav">
						<li><a href="./index">Home</a></li>
						<li><a href="./search">商品検索APIを使ってみる</a></li>
						<li><a href="./categoryRanking">カテゴリランキングAPIを使ってみる</a></li>
						<li><a href="https://github.com/mhrsh/ys_api_test_2015">GitHubページ</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>
</div>

<h1>カテゴリランキングAPIを使ってみる</h1>

<p>
  <?php
  echo $this->Form->create(false,array('type'=>'post','action'=>'./categoryRanking'));
  echo $this->Form->label('category_id',"商品カテゴリ");
  echo $this->Form->select('category_id', $categories, array('default' => '1'));
  echo $this->Form->end("ランキングを表示");
  ?>
</p>

<div class="row">
<?php for($i=0;$i<count($ranking_data);$i++){
		$rank = $i + 1;
		if($i==0){
			echo '<div class="span12">';
			?>
			<h3><a href="<?php echo h($ranking_data[$i]->Url); ?>"><?php echo $rank."位: ".h($ranking_data[$i]->Name); ?></a></h3>
			<p><a href="<?php echo h($ranking_data[$i]->Url); ?>">
				<img src="<?php echo h($ranking_data[$i]->Image->Medium); ?>" />
				</a>
			</p>
			</div>
			<?php
		}elseif($i==1 || $i==2){
			echo '<div class="span6">';
			?>
			<h4><a href="<?php echo h($ranking_data[$i]->Url); ?>"><?php echo $rank."位: " .h($ranking_data[$i]->Name); ?></a></h4>
			<p><a href="<?php echo h($ranking_data[$i]->Url); ?>">
				<img src="<?php echo h($ranking_data[$i]->Image->Medium); ?>" />
				</a>
			</p>
			</div>
			<?php
		}else{
			echo '<div class="span4">';
			?>
			<p class="hit-name"><a href="<?php echo h($ranking_data[$i]->Url); ?>"><?php echo $rank."位: ". h($ranking_data[$i]->Name); ?></a></p>
			<p><a href="<?php echo h($ranking_data[$i]->Url); ?>">
				<img src="<?php echo h($ranking_data[$i]->Image->Medium); ?>" />
				</a>
			</p>
			</div>
			<?php
		}
} 
?>
</div>

<hr>

<!-- <div class="<?php if($i!=0){
					echo "span12";
					}elseif($i==1 || $i==2){
					echo "span6";
					}else{
					echo "span4";
					} ?>
			">
 -->