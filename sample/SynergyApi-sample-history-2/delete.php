<?php
require "HistoryLogic.class.php";
    session_start();
    $logic = new HistoryLogic();
    if(($count = $logic->delete_by_historyid($_GET['id']))== 1){

        $_SESSION = array();
        include("withdrawal_finish.php");
    }else{
        $error = "削除に失敗しました。";
        include("withdrawal_finish.php");
    }

?>