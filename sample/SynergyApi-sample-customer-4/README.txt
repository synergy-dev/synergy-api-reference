
Synergy!API (Customer Version 4.0)サンプルプログラム

■初めに
  このサンプルプログラムはSynergy!API(Customer Version 4.0)を利用し
  CREATE、READ、UPDATE、DELETE、COUNT、UPSERTを行うプログラムです。

■プログラム構成
create.php(CREATEを行うページ)
read.php(READを行うページ)
update.php(UPDATEを行うページ)
delete.php(DELETEを行うページ)
count.php(COUNTを行うページ)
upsert.php(UPSERTを行うページ)
classes
    - Controller.class.php(各種クラスをコントロールするクラス)
    - HTMLWriter.class.php(エラーやレスポンスをHTML出力するクラス)
    - RequestConstructor.class.php(クエリ文字列よりリクエストを生成するクラス)
    - SynergyApiClient.class.php(SynergyApiと通信を行うクラス)
    - Utils.class.php(ユーティリティクラス)

■プログラムの処理の流れ
1. 各ページにて値をセットし送信ボタン押下
2. Controller.class.phpがRequestConstructor.class.phpを利用しクエリ文字列より
   リクエストを生成する
3. Controller.class.phpが上記2.で生成したリクエストをSynergyApiClient.class.phpに
   引き渡しリクエスト送信する
4. Controller.class.phpがSynergyApiClient.class.phpより取得したエラーやレスポンスを
   HTMLWriter.class.phpに引き渡し、送信結果をHTML出力する

■初期設定
SynergyApiClient.class.phpの下記定数に値を設定してください。
・API_KEY(ご利用のSynergy!API-KEY)
・WSDL(WSDL文書パス)

■権利・免責事項
著作権は弊社が保持します。 
ただし、これらのプログラムは無保証であり、使用したことにより生じた損害について、弊社は一切の責任を負いません。
このプログラムの使用に対して無保証であることを前提に、プログラムの使用，複製，改変は自由に行なえます。

2017 Synergy Marketing, Inc. All Right Reserved.
