<?php
require "HistoryLogic.class.php";
    $logic = new HistoryLogic();
    session_start();
    $synergyid = $_SESSION['synergyid'];

    $singleSelect = array('select' => array('value' =>$_POST['element5']));
    
    $multipleSelect = array();
    if(isset($_POST['element6_1']) == 1){
      array_push($multipleSelect,array('value' =>$_POST['element6_1']));
    }
    if(isset($_POST['element6_2']) == 2){
      array_push($multipleSelect,array('value' =>$_POST['element6_2']));
    }
    if(isset($_POST['element6_3']) == 3){
      array_push($multipleSelect,array('value' =>$_POST['element6_3']));
    }
    if(isset($_POST['element6_4']) == 4){
      array_push($multipleSelect,array('value' =>$_POST['element6_4']));
    }
    if(isset($_POST['element6_5']) == 5){
      array_push($multipleSelect,array('value' =>$_POST['element6_5']));
    }
    
    $elements = array();
    array_push($elements,array('column' => 'element1' , 'data' => array('textData' => $_POST['element1'])));
    array_push($elements,array('column' => 'element2' , 'data' => array('textData' => $_POST['element2'])));
    array_push($elements,array('column' => 'element3' , 'data' => array('textData' => $_POST['element3'])));
    array_push($elements,array('column' => 'element4' , 'data' => array('textData' => $_POST['element4'])));
    array_push($elements,array('column' => 'element5' , 'data' => array('selectData' => $singleSelect)));
    array_push($elements,array('column' => 'element6' , 'data' => array('selectData' => $multipleSelect)));
    $synergyHistory = array('elements' => array('elementData' => $elements));
    
    $logic->create_by_synergyid($synergyid,$synergyHistory);

    include("new_finish.php");	
?>