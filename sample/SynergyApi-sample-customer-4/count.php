<?php
    require_once 'classes/Utils.class.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Count [customer version4.0]</title>
</head>
<body>
<a href="create.php">Create</a> <a href="read.php">Read</a> <a href="update.php">Update</a> <a href="delete.php">Delete</a> <a href="count.php">Count</a> <a href="upsert.php">Upsert</a>
<h1>Count [customer version4.0]</h1>
<form action="count.php" method="get">
    <p><fieldset>
        <legend>検索条件</legend>
        <p>
        searchConditions op : <input type="text" name="scsop" size="5" value=<?php echo htmlspecialchars(Utils::getParam('scsop')); ?>>
        </p>
        
        <p><fieldset>
            <legend>検索条件1</legend>
            column : <input type="text" name="cond1_column" size="20" value=<?php echo htmlspecialchars(Utils::getParam('cond1_column')); ?>><br/>
            condition op : <input type="text" name="cond1_op" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond1_op')); ?>><br/>
            <input type="radio" name="cond1_dataType" value="text" <?php if (Utils::getParam('cond1_dataType') == 'text' || Utils::getParam('cond1_dataType') != 'select') { echo 'checked'; } ?>>
            textData:<input type="text" name="cond1_text" size="50" value=<?php echo htmlspecialchars(Utils::getParam('cond1_text')); ?>><br/>
            <input type="radio" name="cond1_dataType" value="select" <?php if (Utils::getParam('cond1_dataType') == 'select') { echo 'checked'; } ?>>selectData<br/>
                &nbsp&nbsp value : <input type="text" name="cond1_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond1_value_1')); ?>><br/>
                &nbsp&nbsp value : <input type="text" name="cond1_value_2" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond1_value_2')); ?>><br/>
        </fieldset>
        </p>
        
        <p>
        <fieldset>
            <legend>検索条件2</legend>
            column : <input type="text" name="cond2_column" size="20" value=<?php echo htmlspecialchars(Utils::getParam('cond2_column')); ?>><br/>
            condition op : <input type="text" name="cond2_op" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond2_op')); ?>><br/>
            <input type="radio" name="cond2_dataType" value="text" <?php if (Utils::getParam('cond2_dataType') == 'text' || Utils::getParam('cond2_dataType') != 'select') { echo 'checked'; } ?>>
            textData:<input type="text" name="cond2_text" size="50" value=<?php echo htmlspecialchars(Utils::getParam('cond2_text')); ?>><br/>
            <input type="radio" name="cond2_dataType" value="select" <?php if (Utils::getParam('cond2_dataType') == 'select') { echo 'checked'; } ?>>selectData<br/>
                &nbsp&nbsp value : <input type="text" name="cond2_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond2_value_1')); ?>><br/>
                &nbsp&nbsp value : <input type="text" name="cond2_value_2" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond2_value_2')); ?>><br/>
        </fieldset></p>
    </fieldset></p>
    
    <p>
    <input type="submit" value=" 送信 "> <input type="checkbox" name="needtrace" value="true" <?php if (Utils::getParam('needtrace') == 'true') { echo 'checked'; } ?>>要トレース
    </p>
</form>

<?php
    if (count($_GET) > 0) {
        require_once 'classes/Controller.class.php';
        require_once 'classes/HTMLWriter.class.php';

        // countリクエスト送信
        $controller = new Controller();
        $soapFault = null;
        try {
            $response = $controller->count();
        } catch(SoapFault $e) {
            $soapFault = $e;
        }

        echo '<h3>Response</h3>';

        // エラーメッセージ表示
        HTMLWriter::writeErrorResponse($soapFault);

        // トレース内容表示
        HTMLWriter::writeTrace($controller);

        if (!is_null($soapFault)) {
            return;
        }

        // レスポンスデータ表示
        HTMLWriter::writeCountResponse($response);
    }
?>
</body>
</html>
