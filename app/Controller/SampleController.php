<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class SampleController extends AppController {

  public function index() {
    $this->set("title_for_layout","index");
  }//index


  public function search() {
    $this->set("title_for_layout","search");
    //共通ファイルの読み込み
    require_once(dirname(__FILE__). "/common.php");
    $this->set("sortOrder", $sortOrder);
    $this->set("categories", $categories);
    //モデルは使わない
    $this->modelClass = false;
    //変数の初期化
    $this->set("hits", null);
    //フォームで渡された値の有無をチェックしてローカル変数に代入  
    if(!empty($this->request->data["sort"]) && array_key_exists($this->request->data["sort"], $sortOrder)){
      $sort = $this->request->data["sort"];
    }else{
      $sort = "-score"; 
    }
    if(!empty($this->request->data["category_id"]) && ctype_digit($this->request->data["category_id"]) && array_key_exists($this->request->data["category_id"], $categories)){
      $category_id = $this->request->data["category_id"];
    }else{
      $category_id = 1;
    }
    //クエリを作って投げる．結果を格納．
    if (!empty($this->request->data["query"]) && $this->request->data['query'] != "") {
      $query4url = rawurlencode($this->request->data['query']);    
      $sort4url = rawurlencode($sort);
      $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
      $xml = simplexml_load_file($url);
      if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
        $this->set("hits", $xml->Result->Hit);
      }
    }

  }//search

  public function categoryRanking(){
    $this->set("title_for_layout","category ranking");
    //共通ファイルの読み込み
    require_once(dirname(__FILE__). "/common.php");
    $this->set("categories", $categories);
    //モデルは使わない
    $this->modelClass = false;
    //フォームで渡された値の有無をチェックしてローカル変数に代入 
    if(!empty($this->request->data["category_id"]) && ctype_digit($this->request->data["category_id"]) && array_key_exists($this->request->data["category_id"], $categories)){
      $category_id = $this->request->data["category_id"];
    }else{
      $category_id = 1;
    }
    //クエリを作って投げる．結果を格納．
    if ($category_id != "") {
      $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/categoryRanking?appid=$appid&category_id=$category_id";
      $xml = simplexml_load_file($url);
      if ($xml["totalResultsReturned"] != 0) {//問い合わせ結果が0件でない場合,変数$ranking_dataに問い合わせ結果を格納します。
        //$ranking_data = $xml->Result->RankingData;
        $this->set("ranking_data", $xml->Result->RankingData);
      }
    }
  }//categoryRanking

  public function review($itemCode){
    $this->set("title_for_layout","review");
    //共通ファイルの読み込み
    require_once(dirname(__FILE__). "/common.php");
    require_once(dirname(__FILE__). "/twi.php");
    // set_include_path(get_include_path().PATH_SEPARATOR.'/sample/php_include');
    //モデルは使わない
    $this->modelClass = false;
    $this->set("itemCode", $itemCode);
    //クエリを作って投げる．結果を格納．
    if ($itemCode != "") {
      $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemCode&responsegroup=large";
      $xml = simplexml_load_file($url);
      if ($xml["totalResultsReturned"] != 0) {//問い合わせ結果が0件でない場合,変数$ranking_dataに問い合わせ結果を格納します。
        $this->set("hit", $xml->Result->Hit);
      }
    }

    //twitterAPIのクエリ記述
    // $tweets = getTweets($xml->Result->Hit->Name, 10);
    $tweets = getTweets($this->request->data['twiSearch'], 10);
    $this->set("tweets", $tweets);

  }//review

}//SampleController