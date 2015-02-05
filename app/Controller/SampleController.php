// <?php
// App::uses('AppController', 'Controller');

// class SampleController extends AppController {

// 	public function index() {
// 		$this -> autoRender = false;
        
//         //indexにアクセスすると，otherにリダイレクトする
//         //redirectメソッドにアドレスを渡す
// 		//ユーザには別のアクションの表示だとわかる
// 		//$this->redirect("./other/");

// 		//フォワード（サーバ内で別アドレスの内容を結果として出力する）
// 		//ユーザには別のアクションの表示だとわからない
// 		$this->setAction("other");
// 	}

// 	public function other(){
// 		$this -> autoRender = false;
// 		echo "<html><head></head><body>";
// 		echo "<h1>サンプルページ</h1>";
// 		echo "<p>これはもう１つのページです。</p>";
// 		echo "</body></html>";
// 	}

// }

App::uses('AppController', 'Controller');
 
class SampleController extends AppController {
 
    public function index() {
        $this -> autoRender = false;
        $date = new DateTime();
        $date->setTimeZone(new DateTimeZone('Asia/Tokyo'));
        $str = $date->format("H:i:s");
        $this->redirect("./other/" . urlencode($str));
    }
     
    public function other($param){
        $this -> autoRender = false;
        $str = urldecode($param);
        echo "<html><head></head><body>";
        echo "<h1>サンプルページ</h1>";
        echo "<p>これはもう１つのページです。</p>";
        echo "<p>送られた値: " . $str . "</p>";
        echo "</body></html>";
    }
 
}