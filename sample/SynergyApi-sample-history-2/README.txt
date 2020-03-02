
Synergy!履歴API サンプルプログラム

■初めに
　このサンプルプログラムはSynergy!履歴APIを利用し
　「履歴一覧表示」「履歴新規登録」「履歴変更」「履歴削除」を行うサイトを想定したPHPプログラムサンプルです。

  また、Synergy!上から下記の項目設定が完了していることを前提とします。
   element1(文字型)
   element2(数値型)
   element3(年月日型)
   element4(月日型)
   element5(単一選択型)
   element6(複数選択型)

■プログラム構成

サンプルプログラム
Top.php(トップページ)
SynergyHistoryApiClient.class.php(SynergyHistoryApiと通信を行うクラス)
HistoryLogic.class.php(CRUD処理とSynergyHistoryApiClientを繋ぐクラス)
create.php(作成処理ライブラリ)
delete.php(削除処理ライブラリ)
update.php(更新処理ライブラリ)
historyTop.php(履歴一覧ページ)
edit.php(履歴変更変更ページ)
edit_finish.php(履歴変更完了ページ)
new.php(履歴登録ページ)
new_finish.php(履歴登録完了ページ)
withdrawal_finish.php(削除完了ページ)

■権利・免責事項
著作権は弊社が保持します。 
ただし、これらのプログラムは無保証であり、使用したことにより生じた損害について、弊社は一切の責任を負いません。
このプログラムの使用に対して無保証であることを前提に、プログラムの使用，複製，改変は自由に行なえます。

2000-2016 Synergy Marketing, Inc. All Right Reserved.
