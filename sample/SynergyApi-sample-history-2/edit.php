<?php
require "HistoryLogic.class.php";

$historyLogic = new HistoryLogic();

$obj = $historyLogic->read_by_historyid($_GET['id']);
$history = $obj->synergyHistory;

$ele4 = $history->elements->elementData[4]->data->selectData->select->value;

for($i = 0 ; $i >= 4 ; $i++){

}

  $select = $history->elements->elementData[5]->data->selectData->select;
  $c = count($select);

  if($c == 1){
    $value = $history->elements->elementData[5]->data->selectData->select->value;
    $multipleSelect =array();
    array_push($multipleSelect,$value);
  }else if ($c > 1){
    $multipleSelect =array();
    for($j = 0 ; $j < $c ; $j++){
      $value = $history->elements->elementData[5]->data->selectData->select[$j]->value;
      array_push($multipleSelect,$value);
    }
  }

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>履歴データ変更</title>
</head>
<body>
<h1>■履歴データ変更</h1>
<br/>
<br/>
<form action="update.php" method="post">
<input type="hidden" name="synergyid" size="30" value="<?php echo $history->synergyid ?>">
<input type="hidden" name="historyid" size="30" value="<?php echo $history->historyid ?>">
element1(文字型)<br/>
<input type="text" name="element1" size="30" value="<?php echo $history->elements->elementData[0]->data->textData ?>"><br/>
element2(数値型)<br/>
<input type="text" name="element2" size="30" value="<?php echo $history->elements->elementData[1]->data->textData ?>"><br/>
element3(年月日型)<br/>
<input type="text" name="element3" size="30" value="<?php echo $history->elements->elementData[2]->data->textData ?>"><br/>
element4(月日型)<br/>
<input type="text" name="element4" size="30" value="<?php echo $history->elements->elementData[3]->data->textData ?>"><br/>
element5(単一選択型)<br/>
<select name="element5">
<option value="1" <?php if($ele4 == 1 or $ele4 == null){?> selected="selected" <?php }?>>選択肢１</option>
<option value="2" <?php if($ele4 == 2){?> selected="selected" <?php }?>>選択肢２</option>
<option value="3" <?php if($ele4 == 3){?> selected="selected" <?php }?>>選択肢３</option>
<option value="4" <?php if($ele4 == 4){?> selected="selected" <?php }?>>選択肢４</option>
<option value="5" <?php if($ele4 == 5){?> selected="selected" <?php }?>>選択肢５</option>
</select>
<br/>
element6(複数選択型)<br/>
<input type="checkbox" name="element6_1" value="1" <?php for ($i = 0 ; $i < count($multipleSelect) ; $i++){ if($multipleSelect[$i] == 1){?> checked <?php }}?>>選択肢１<br/>
<input type="checkbox" name="element6_2" value="2" <?php for ($i = 0 ; $i < count($multipleSelect) ; $i++){ if($multipleSelect[$i] == 2){?> checked <?php }}?>>選択肢２<br/>
<input type="checkbox" name="element6_3" value="3" <?php for ($i = 0 ; $i < count($multipleSelect) ; $i++){ if($multipleSelect[$i] == 3){?> checked <?php }}?>>選択肢３<br/>
<input type="checkbox" name="element6_4" value="4" <?php for ($i = 0 ; $i < count($multipleSelect) ; $i++){ if($multipleSelect[$i] == 4){?> checked <?php }}?>>選択肢４<br/>
<input type="checkbox" name="element6_5" value="5" <?php for ($i = 0 ; $i < count($multipleSelect) ; $i++){ if($multipleSelect[$i] == 5){?> checked <?php }}?>>選択肢５<br/>
<input type="submit" value="登録">
</form>


</body>
</html>