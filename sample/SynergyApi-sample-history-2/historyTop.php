<?php
require "HistoryLogic.class.php";
 session_start();
 $historyLogic = new HistoryLogic();
 
 if(isset($_GET["limit"]) == null){
   $limit = 10;
 }else{
   $limit = $_GET['limit'];
 }
 
 if(isset($_GET['offset']) == null){
   $offset = 0;
 }else{
   $offset = $_GET['offset'];
 }
 
 $_SESSION['synergyid'] = $_POST['synergyid'];
 
 $obj = $historyLogic->read_by_synergyid($_SESSION['synergyid'],$limit,$offset);

  if(count($obj->synergyHistory) <= 1){
    $history = array($obj->synergyHistory);
  }else{
    $history = $obj->synergyHistory;
  }
  
  $allCount = $historyLogic->count_by_synergyid($_SESSION['synergyid']);
  

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>会員向け履歴ページ</title>
</head>
<body>
<table border=1 width=800 align=center>
<div align="left"><h1>■履歴データ</h1></div>
<div align="left"><form action="Top.php"><input type="submit" value="TOPへ戻る"></input></form></div></div>
<div align="right"><form action="new.php"><input type="submit" value="新規作成"></input></form></div><br>
 <tr bgcolor="#cccccc">
  <th>Synergy!Id</th>
  <th>HistoryId</th>
  <th>Element1</th>
  <th>Element2</th>
  <th>Element3</th>
  <th>Element4</th>
  <th>Element5</th>
  <th>Element6</th>
  <th>変更</th>
  <th>削除</th>
 </tr>
<?php 

for ($i = 0 ; $i <count($history); $i++) {


  $select =$history[$i]->elements->elementData[5]->data->selectData->select;
  $c = count($select);

  $multipleSelect = "";
  if($c == 1){
    $multipleSelect = $history[$i]->elements->elementData[5]->data->selectData->select->value;
  }else if ($c > 1){
    for($j = 0 ; $j < $c ; $j++){
    $multipleSelect .= $history[$i]->elements->elementData[5]->data->selectData->select[$j]->value;
      if($j + 1 != $c){
        $multipleSelect .=  ",";
      }
    
    }
  }

?>
 <tr align=center>
  <td><?php echo $history[$i]->synergyid ?></td>
  <td><?php echo $history[$i]->historyid ?></td>
  <td><?php echo $history[$i]->elements->elementData[0]->data->textData ?></td>
  <td><?php echo $history[$i]->elements->elementData[1]->data->textData ?></td>
  <td><?php echo $history[$i]->elements->elementData[2]->data->textData ?></td>
  <td><?php echo $history[$i]->elements->elementData[3]->data->textData ?></td>
  <td><?php echo $history[$i]->elements->elementData[4]->data->selectData->select->value ?></td>
  <td><?php echo $multipleSelect ?></td>
  <td><a href="edit.php?id=<?php echo $history[$i]->historyid ?>">編集</a></td>
  <td><a href="delete.php?id=<?php echo $history[$i]->historyid ?>">削除</a></td>
 </tr>
 
<?php 
}
?>

</table>
<br>
<div align="center">
<?php 
if($offset != 0){
?>
<a href="historyTop.php?limit=10&offset=<?php echo $offset-10 ?>">戻る</a>
<?php
}
?>
|
<?php
if( $offset + 10 < $allCount){
?>
<a href="historyTop.php?limit=10&offset=<?php echo $offset+10 ?>">次へ</a>
<?php
}
?>
</div>

</body>
</html>