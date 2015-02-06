<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');

class SampleController extends AppController {

  public function index() {
    require_once(dirname(__FILE__). "/common.php");
    $this->modelClass = false;

    // if ($this->request->data){
    //   $result = "[result]";
    //   $result .= "<br>sort: ". $this->request->data['sort'];
    //   $result .= "<br>category_id: ". $this->request->data['category_id'];
    //   $result .= "<br>query: " . Sanitize::stripAll($this->request->data['query']);
    // } else {
    //   $result = "no data.";
    // }
    // $this->set("result", $result);
        
    $sort =  !empty($this->request->data["sort"]) && array_key_exists($this->request->data["sort"], $sortOrder) ? $this->request->data["sort"] : "-score";
    $category_id = ctype_digit($this->request->data["category_id"]) && array_key_exists($this->request->data["category_id"], $categories) ? $this->request->data["category_id"] : 1;
     
    if ($this->request->data['query'] != "") {
        $query4url = rawurlencode($this->request->data['query']);    
        $sort4url = rawurlencode($sort);   
        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url";
        $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
            $this->set("hits", $xml->Result->Hit);
        }
 
        

    }
  }//index

}