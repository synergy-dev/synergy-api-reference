<?php
session_start();
require "HistoryLogic.class.php";

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
 
 if(isset($_GET['synergyid']) != null){
   $_SESSION['synergyid'] = $_GET['synergyid'];
   echo $_SESSION['synergyid'];
 }
 
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
<title>トップページ</title>
</head>
<body>
<h1>■履歴マスタサンプルプログラム</h1>
<br/>
<br/>
<form action="historyTop.php" method="post">
Synergy!ID<br/>
<input type="text" name="synergyid" size="30" value=""><br/><br/>
<input type="submit" value="次へ">
</form>
</body>
</html>
