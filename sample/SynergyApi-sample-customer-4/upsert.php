<?php
    require_once 'classes/Utils.class.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Upsert [customer version4.0]</title>
</head>
<body>
<a href="create.php">Create</a> <a href="read.php">Read</a> <a href="update.php">Update</a> <a href="delete.php">Delete</a> <a href="count.php">Count</a> <a href="upsert.php">Upsert</a>
<h1>Upsert [customer version4.0]</h1>
<form action="upsert.php" method="get">
    <p>
    <fieldset>
        <legend>検索条件</legend>
        column : <input type="text" name="cond1_column" size="20" value=<?php echo htmlspecialchars(Utils::getParam('cond1_column')); ?>><br/>
        <input type="radio" name="cond1_dataType" value="text" <?php if (Utils::getParam('cond1_dataType') == 'text' || Utils::getParam('cond1_dataType') != 'select') { echo 'checked'; } ?>>
        textData:<input type="text" name="cond1_text" size="50" value=<?php echo htmlspecialchars(Utils::getParam('cond1_text')); ?>><br/>
        <input type="radio" name="cond1_dataType" value="select" <?php if (Utils::getParam('cond1_dataType') == 'select') { echo 'checked'; } ?>>selectData<br/>
            &nbsp&nbsp value : <input type="text" name="cond1_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond1_value_1')); ?>><br/>
            &nbsp&nbsp value : <input type="text" name="cond1_value_2" size="5" value=<?php echo htmlspecialchars(Utils::getParam('cond1_value_2')); ?>><br/>
    </fieldset>
    </p>
    
    <p>
    <fieldset>
        <legend>更新データ</legend>
        <input type="checkbox" name="mailaddress_set" value="true" <?php if (Utils::getParam('mailaddress_set') == 'true') { echo 'checked'; } ?>>
         ＰＣメールアドレス : <input type="text" name="mailaddress" size="50" value=<?php echo htmlspecialchars(Utils::getParam('mailaddress')); ?>><br/>

        <input type="checkbox" name="mobilemailaddress_set" value="true" <?php if (Utils::getParam('mobilemailaddress_set') == 'true') { echo 'checked'; } ?>>
         携帯メールアドレス : <input type="text" name="mobilemailaddress" size="50" value=<?php echo htmlspecialchars(Utils::getParam('mobilemailaddress')); ?>><br/>

        <input type="checkbox" name="refusalflag_set" value="true" <?php if (Utils::getParam('refusalflag_set') == 'true') { echo 'checked'; } ?>>
         メール受信拒否フラグ : <input type="text" name="refusalflag" size="5" value=<?php echo htmlspecialchars(Utils::getParam('refusalflag')); ?>><br/>

        <input type="checkbox" name="mailerrorcount_set" value="true" <?php if (Utils::getParam('mailerrorcount_set') == 'true') { echo 'checked'; } ?>>
         ＰＣメールエラーカウント : <input type="text" name="mailerrorcount" size="5" value=<?php echo htmlspecialchars(Utils::getParam('mailerrorcount')); ?>><br/>

        <input type="checkbox" name="mobilemailerrorcount_set" value="true" <?php if (Utils::getParam('mobilemailerrorcount_set') == 'true') { echo 'checked'; } ?>>
         携帯メールエラーカウント : <input type="text" name="mobilemailerrorcount" size="5" value=<?php echo htmlspecialchars(Utils::getParam('mobilemailerrorcount')); ?>><br/>

        <input type="checkbox" name="releaseflaglist_set" value="true" <?php if (Utils::getParam('releaseflaglist_set') == 'true') { echo 'checked'; } ?>>
         メルマガ解除フラグリスト : <br/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp value : <input type="text" name="releaseflaglist_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('releaseflaglist_value_1')); ?>><br/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp value : <input type="text" name="releaseflaglist_value_2" size="5" value=<?php echo htmlspecialchars(Utils::getParam('releaseflaglist_value_2')); ?>><br/>

        <input type="checkbox" name="name_set" value="true" <?php if (Utils::getParam('name_set') == 'true') { echo 'checked'; } ?>>
         氏名 : <input type="text" name="name" size="20" value=<?php echo htmlspecialchars(Utils::getParam('name')); ?>><br/>

        <input type="checkbox" name="kana_set" value="true" <?php if (Utils::getParam('kana_set') == 'true') { echo 'checked'; } ?>>
         シメイ : <input type="text" name="kana" size="20" value=<?php echo htmlspecialchars(Utils::getParam('kana')); ?>><br/>

        <input type="checkbox" name="prefecture_set" value="true" <?php if (Utils::getParam('prefecture_set') == 'true') { echo 'checked'; } ?>>
         都道府県 : <br/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp value : <input type="text" name="prefecture_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('prefecture_value_1')); ?>>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp text : <input type="text" name="prefecture_text_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('prefecture_text_1')); ?>><br/>

        <input type="checkbox" name="address_set" value="true" <?php if (Utils::getParam('address_set') == 'true') { echo 'checked'; } ?>>
         住所 : <input type="text" name="address" size="20" value=<?php echo htmlspecialchars(Utils::getParam('address')); ?>><br/>

        <input type="checkbox" name="zipcode_set" value="true" <?php if (Utils::getParam('zipcode_set') == 'true') { echo 'checked'; } ?>>
         郵便番号 : <input type="text" name="zipcode" size="20" value=<?php echo htmlspecialchars(Utils::getParam('zipcode')); ?>><br/>

        <input type="checkbox" name="phonenumber_set" value="true" <?php if (Utils::getParam('phonenumber_set') == 'true') { echo 'checked'; } ?>>
         電話番号 : <input type="text" name="phonenumber" size="20" value=<?php echo htmlspecialchars(Utils::getParam('phonenumber')); ?>><br/>

        <input type="checkbox" name="faxnumber_set" value="true" <?php if (Utils::getParam('faxnumber_set') == 'true') { echo 'checked'; } ?>>
         FAX : <input type="text" name="faxnumber" size="20" value=<?php echo htmlspecialchars(Utils::getParam('faxnumber')); ?>><br/>

        <input type="checkbox" name="mobilenumber_set" value="true" <?php if (Utils::getParam('mobilenumber_set') == 'true') { echo 'checked'; } ?>>
         携帯電話番号 : <input type="text" name="mobilenumber" size="20" value=<?php echo htmlspecialchars(Utils::getParam('mobilenumber')); ?>><br/>

        <input type="checkbox" name="birthday_set" value="true" <?php if (Utils::getParam('birthday_set') == 'true') { echo 'checked'; } ?>>
         生年月日 : <input type="text" name="birthday" size="20" value=<?php echo htmlspecialchars(Utils::getParam('birthday')); ?>><br/>

        <input type="checkbox" name="password_set" value="true" <?php if (Utils::getParam('password_set') == 'true') { echo 'checked'; } ?>>
         パスワード : <input type="text" name="password" size="20" value=<?php echo htmlspecialchars(Utils::getParam('password')); ?>><br/>

        <input type="checkbox" name="ext1_set" value="true" <?php if (Utils::getParam('ext1_set') == 'true') { echo 'checked'; } ?>>
         ext1（文字型） : <input type="text" name="ext1" size="20" value=<?php echo htmlspecialchars(Utils::getParam('ext1')); ?>><br/>

        <input type="checkbox" name="ext2_set" value="true" <?php if (Utils::getParam('ext2_set') == 'true') { echo 'checked'; } ?>>
         ext2（数値型） : <input type="text" name="ext2" size="20" value=<?php echo htmlspecialchars(Utils::getParam('ext2')); ?>><br/>

        <input type="checkbox" name="ext3_set" value="true" <?php if (Utils::getParam('ext3_set') == 'true') { echo 'checked'; } ?>>
         ext3（年月日型） : <input type="text" name="ext3" size="20" value=<?php echo htmlspecialchars(Utils::getParam('ext3')); ?>><br/>

        <input type="checkbox" name="ext4_set" value="true" <?php if (Utils::getParam('ext4_set') == 'true') { echo 'checked'; } ?>>
         ext4（月日型） : <input type="text" name="ext4" size="20" value=<?php echo htmlspecialchars(Utils::getParam('ext4')); ?>><br/>

        <input type="checkbox" name="ext5_set" value="true" <?php if (Utils::getParam('ext5_set') == 'true') { echo 'checked'; } ?>>
         ext5（単一選択型） : <br/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp value : <input type="text" name="ext5_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('ext5_value_1')); ?>>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp text : <input type="text" name="ext5_text_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('ext5_text_1')); ?>><br/>

        <input type="checkbox" name="ext6_set" value="true" <?php if (Utils::getParam('ext6_set') == 'true') { echo 'checked'; } ?>>
         ext6（複数選択型） : <br/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp value : <input type="text" name="ext6_value_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('ext6_value_1')); ?>>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp text : <input type="text" name="ext6_text_1" size="5" value=<?php echo htmlspecialchars(Utils::getParam('ext6_text_1')); ?>><br/>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp value : <input type="text" name="ext6_value_2" size="5" value=<?php echo htmlspecialchars(Utils::getParam('ext6_value_2')); ?>>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp text : <input type="text" name="ext6_text_2" size="5" value=<?php echo htmlspecialchars(Utils::getParam('ext6_text_2')); ?>><br/>

        <input type="checkbox" name="ext7_set" value="true" <?php if (Utils::getParam('ext7_set') == 'true') { echo 'checked'; } ?>>
         ext7（パスワード型） : <input type="text" name="ext7" size="20" value=<?php echo htmlspecialchars(Utils::getParam('ext7')); ?>><br/>
    </fieldset>
    </p>
    
    <p>
    <input type="submit" value=" 送信 "> <input type="checkbox" name="needtrace" value="true" <?php if (Utils::getParam('needtrace') == 'true') { echo 'checked'; } ?>>要トレース
    </p>
</form>

<?php
    if (count($_GET) > 0) {
        require_once 'classes/Controller.class.php';
        require_once 'classes/HTMLWriter.class.php';

        // upsertリクエスト送信
        $controller = new Controller();
        $soapFault = null;
        try {
            $response = $controller->upsert();
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
        HTMLWriter::writeUpsertResponse($response);
    }
?>
</body>
</html>
