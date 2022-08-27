<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="http://localhost:8888/fullstack-webdev/.vscode/test.php" method="POST">
        <p>個数を入力</p>
        <ul>
            <li><input type="text"  name="num"></li>
            <li><input type="text"  name="num"></li>
            <li><input type="text"  name="num"></li>
            <li><input type="submit" value="送信"></li>
        </ul>
   </form>
</body>
</html> -->
<?php 
// $num = $_POST['num']['0'];
// echo $num;
// $price = 2;
// $amount = 3;
// $sum = $price * $num;
// echo $sum;
// if(!empty($sum)){
//     echo "{$price}円の商品を{$num}個買ったので合計金額は{$sum}円です。";
// }else{
//     echo '何か商品を買いましょう。';
// }

// $products = [
//     'table' => [1000, 2], 
//     'chair' => [500, 4],
//     'bed' => [10000, 1],
//     'light' => [5000, 1]
// ];

/**
 * 問１：商品一覧
 * 
 * 商品一覧
 * tableは1000円で2個存在します。
 * chairは500円で4個存在します。
 * bedは10000円で2個存在します。
 * lightは5000円で1個存在します。
 */
// foreach($products as $name=>$num){
//     echo"<div>{$name}は{$num[0]}円で{$num[1]}個存在します。</div>";
// }

/**
 * 問２：商品購入
 * 
 * $cartの品物を買いたいと想定して、
 * $productsの在庫数が足りている場合、足りていない場合で
 * 以下のように画面に表示してください。
 * 
 * 商品購入
 * tableを1個ください。
 * はい。ありがとうございます。 <- 足りている場合
 * bedを2個ください。
 * すいません。bedは1個しかありません。 <- 足りていない場合
 */
// $cart = [
//     'table' => 1,
//     'bed' => 2];
// foreach($cart as $c_name=>$c_unit){
//     $p_unit = $products[$c_name][1];
//     echo "{$c_name}を{$c_unit}個ください。";

//     if($c_unit<$p_unit){
//         echo 'はい、ありがとうございます。';
//     }else{
//         echo "すいません。{$c_name}は{$p_unit}個しかありません。";}
// }



/**
 * 問１：生徒の点呼をとる関数(tenko)
 * 
 * 以下のような点呼をとりましょう。
 * ```
 * （出席しているとき）
 * taroは出席しています。
 * （欠席しているとき）
 * taroは欠席しています。
 * ```
 * $is_absentのデフォルト引数はfalseとしてください。
 * 
 * @param string $student 生徒
 * @param bool $is_absent true:欠席 false:出席
 * @return void 
 */

// function tenko($student,$absent=false){
//     if($absent){
//         echo "{$student}は出席しています。";
//     }else{
//         echo "{$student}は欠席しています。";
//     }
// }
// tenko('ketty',true);

/**
 * 問２：カウンター関数(counter)
 * 
 * グローバルスコープに定義された $num に対して、
 * 引数でわたってきた $step を足し合わせた数値を
 * $num に再び格納して、画面に出力するプログラムを作成してください。
 * $stepのデフォルト引数は 1 としてください。
 * 
 * @global int $num 足し合わせる元となる数値
 * 
 * @param int $step 足し合わせる数値
 * 
 * @return int 合計値 ($num + $step)
 */

// $num =0;
// function counter($step = 1){
//     global $num;
//     $num += $step; 
//     echo $num;
//     return $num;  
// }
// $sum = counter($num,5);
// echo $sum;



/**
 * 理解度チェック（クラス）
 * 
 * ファイル書き込みを行うためのクラスを定義してみましょう。
 * 
 * ヒント）PHP_EOL: 改行するための特殊な定数です。
 */
class MyFileWriter{

    // プロパティの定義
    private $content;
    private $filename;
    public const  FILE_APPEND = PHP_EOL ;
    
    // メソッド定義
    function __construct($content,$filename){
        $this->$filename = $filename;
    }
    // 改行処理
    function newline(){
        $this->content = FILE_APPEND;
    }
    function append($content){
        $this->content += $content ;
        return ;
    }
    // ファイルへの書き込み
    function commit(){
        $this->content->commit();
    }
    
}
    
    $content = 'Hello, Bob.'; // append
    $content .= PHP_EOL; // newline
    // php-eol　は改行を示す
    $content .= 'Bye, '; // append
    $content .= 'Bob.'; // append
    $content .= PHP_EOL; // newline
    
    // commit
    file_put_contents('sample.text', $content);
    // file_put_contents　　　　ファイルに文字列を書き込む関数
    // 　　　　　　　　内容を書き込みたいファイル名を指定,内容を含む変数
    $content = '';
    
    $content = 'Good night, Bob.'; // append
    
    // commit
    file_put_contents('sample.text', $content, FILE_APPEND);
    // 第三引数にFILE_APPEND　とすることで中身を追記することができる
    $content = '';
    
    
    $file = new MyFileWriter('sample.text');
    $file->append('Hello, Bob.')
    // append   文字列をつなぎ合わせる
    
    ->newline()
    // 文字列に対して改行が仕込まれる
    ->append('Bye, ')
    ->append('Bob.')
    ->newline()
    ->commit()
    // commit処理実行でファイルへの書き込みが行われる
    ->append('Good night, Bob.')
    ->commit(MyFileWriter::APPEND);

?> 