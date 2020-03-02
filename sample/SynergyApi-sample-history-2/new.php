<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>履歴登録</title>
</head>
<body>
<h1>■履歴登録</h1>
<form action="create.php" method="post">
element1(文字型)<br/>
<input type="text" name="element1" size="30" value=""><br/>
element2(数値型)<br/>
<input type="text" name="element2" size="30" value=""><br/>
element3(年月日型)<br/>
<input type="text" name="element3" size="30" value=""><br/>
element4(月日型)<br/>
<input type="text" name="element4" size="30" value=""><br/>
element5(単一選択型)<br/>
<select name="element5"><option value="1" selected="selected">選択肢１</option><option value="2">選択肢２</option><option value="3">選択肢３</option><option value="4">選択肢４</option><option value="5">選択肢５</option></select><br/>
element6(複数選択型)<br/>
<input type="checkbox" name="element6_1" value="1">選択肢１<br/>
<input type="checkbox" name="element6_2" value="2">選択肢２<br/>
<input type="checkbox" name="element6_3" value="3">選択肢３<br/>
<input type="checkbox" name="element6_4" value="4">選択肢４<br/>
<input type="checkbox" name="element6_5" value="5">選択肢５<br/>
<input type="submit" value="登録">
</form>
</body>
</html>