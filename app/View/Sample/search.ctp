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
    <?php
      echo $this->Html->image(h($hit->Image->Medium), array(
        "alt" => h($hit->Name),
        'url' => h($hit->Url)
        ));
    ?>
    <p class="hit-name"><a href="<?php echo h($hit->Url); ?>"><?php echo $hit->Name; ?></a></p>
    <?php
      // echo $this->Html->link(h($hit->Name), h($hit->Url), array('class'=>'hit-name'));
      $dispPrice = "";
      $dispPrice .= $hit->Price;
      echo $this->Html->tag('p',
        "¥".number_format($dispPrice)."<br>"
        ."レビュー平均".$hit->Review->Rate."<br>"
        ."レビュー件数".$hit->Review->Count);
      echo $this->Html->link("レビューを見る", "./review/". h($hit->Code));
      // echo $this->Html->link($hit->Category->Current->Name, "./categoryRanking/". h($hit->Category->Current->Id));
    ?>
  </div>
  <?php } } ?>
</div>


</div>

