<?php
/**
 * HTML出力クラス
 */
class HTMLWriter {
    /**
     * トレース情報をHTML形式で出力します
     */
    public static function writeTrace($controller)
    {
        if (!$controller->get_NeedTrace()) {
            return;
        }

        $client = $controller->get_Client();

        echo '<p><dl>';

        // リクエストヘッダ
        echo '<dt>Request Header</dt>';
        echo '<dd>';
        echo '<pre>';
        echo htmlspecialchars($client->__getLastRequestHeaders());
        echo '</pre>';
        echo '</dd>';

        // リクエストXML
        echo '<dt>Request XML</dt>';
        echo '<dd>';
        echo '<pre>';
        echo mb_ereg_replace('&gt;&lt;', '&gt;<br/>&lt;', htmlspecialchars($client->__getLastRequest()));
        echo '</pre>';
        echo '</dd>';

        // レスポンスヘッダ
        echo '<dt>Response Header</dt>';
        echo '<dd>';
        echo '<pre>';
        echo htmlspecialchars($client->__getLastResponseHeaders());
        echo '</pre>';
        echo '</dd>';

        // レスポンスXML
        echo '<dt>Response XML</dt>';
        echo '<dd>';
        echo '<pre>';
        echo mb_ereg_replace('&gt;&lt;', '&gt;<br/>&lt;', htmlspecialchars($client->__getLastResponse()));
        echo '</pre>';
        echo '</dd>';

        echo '</dl></p>';
        echo '<hr/>';
    }

    /**
     * エラーレスポンス情報をHTML形式で出力します
     */
    public static function writeErrorResponse($soapFault)
    {
        if ($soapFault == null) {
            return;
        }
        echo '<p><font color="red"><b>エラー発生</b></font></p>';
        if (property_exists($soapFault, 'detail') 
            && property_exists($soapFault->detail, 'fault') 
            && property_exists($soapFault->detail->fault, 'errorCode') 
            && property_exists($soapFault->detail->fault, 'errorMessage')
        ) {
            echo '<p><dl>';
            echo '<dt>ErrorCode</dt>';
            echo '<dd>';
            echo htmlspecialchars($soapFault->detail->fault->errorCode);
            echo '</dd>';
            echo '<dt>ErrorMessage</dt>';
            echo '<dd>';
            echo htmlspecialchars($soapFault->detail->fault->errorMessage);
            echo '</dd>';
            echo '</dl></p>';
        } else {
            var_dump($soapFault);
        }
    }

    /**
     * createResponseより作成したsynergyidを文字列に整形し出力
     */
    public static function writeCreateResponse($createResponse)
    {
        // synergyid出力
        self::writeSynergyIdResponse($createResponse);
    }

    /**
     * readResponseより先頭顧客データを文字列に整形し出力
     */
    public static function writeReadResponse($readResponse)
    {
        echo '<p>データ件数 : ' . $readResponse->count . '</p>';

        // 先頭1件データ表示
        if (!is_null($readResponse) && $readResponse->count > 0) {
            if (is_array($readResponse->synergyPerson)) {
                $synergyPerson = $readResponse->synergyPerson[0];
            } else {
                $synergyPerson = $readResponse->synergyPerson;
            }
            echo '<p>先頭データ</p>';        
            echo '<p><dl>';
            echo '<dt>Synergy!ID</dt><dd>' . htmlspecialchars($synergyPerson->synergyid) . '</dd>';
            echo '<dt>ＰＣメールアドレス</dt><dd>' . htmlspecialchars($synergyPerson->mailaddress) . '</dd>';
            echo '<dt>携帯メールアドレス</dt><dd>' . htmlspecialchars($synergyPerson->mobilemailaddress) . '</dd>';
            echo '<dt>更新日時</dt><dd>' . htmlspecialchars($synergyPerson->updateddate) . '</dd>';
            echo '<dt>システム登録日時</dt><dd>' . htmlspecialchars($synergyPerson->registereddate) . '</dd>';
            echo '<dt>メール受信拒否フラグ</dt><dd>' . htmlspecialchars(var_export($synergyPerson->refusalflag, TRUE)) . '</dd>';
            echo '<dt>ＰＣメールエラーカウント</dt><dd>' . htmlspecialchars($synergyPerson->mailerrorcount) . '</dd>';
            echo '<dt>携帯メールエラーカウント</dt><dd>' . htmlspecialchars($synergyPerson->mobilemailerrorcount) . '</dd>';
            echo '<dt>メルマガ解除フラグリスト</dt><dd>' . htmlspecialchars(self::formatSelect($synergyPerson->releaseflaglist)) . '</dd>';
            echo '<dt>氏名</dt><dd>' . htmlspecialchars($synergyPerson->name) . '</dd>';
            echo '<dt>シメイ</dt><dd>' . htmlspecialchars($synergyPerson->kana) . '</dd>';
            echo '<dt>都道府県</dt><dd>' . htmlspecialchars(self::formatSelect($synergyPerson->prefecture)) . '</dd>';
            echo '<dt>住所</dt><dd>' . htmlspecialchars($synergyPerson->address) . '</dd>';
            echo '<dt>郵便番号</dt><dd>' . htmlspecialchars($synergyPerson->zipcode) . '</dd>';
            echo '<dt>電話番号</dt><dd>' . htmlspecialchars($synergyPerson->phonenumber) . '</dd>';
            echo '<dt>FAX</dt><dd>' . htmlspecialchars($synergyPerson->faxnumber) . '</dd>';
            echo '<dt>携帯電話番号</dt><dd>' . htmlspecialchars($synergyPerson->mobilenumber) . '</dd>';
            echo '<dt>生年月日</dt><dd>' . htmlspecialchars($synergyPerson->birthday) . '</dd>';
            echo '<dt>パスワード</dt><dd>' . htmlspecialchars($synergyPerson->password) . '</dd>';
            self::writeExtensionData($synergyPerson->extensions);
            echo '</dl></p>';
        }
    }

    /**
     * updateResponseより作成したsynergyidを文字列に整形し出力
     */
    public static function writeUpdateResponse($updateResponse)
    {
        // synergyid出力
        self::writeSynergyIdResponse($updateResponse);
    }

    /**
     * deleteResponseより作成したsynergyidを文字列に整形し出力
     */
    public static function writeDeleteResponse($deleteResponse)
    {
        // synergyid出力
        self::writeSynergyIdResponse($deleteResponse);
    }

    /**
     * countResponseより先頭顧客データを文字列に整形し出力
     */
    public static function writeCountResponse($countResponse)
    {
        echo '<p>データ件数 : ' . $countResponse->count . '</p>';
    }

    /**
     * upsertResponseより作成したsynergyidを文字列に整形し出力
     */
    public static function writeUpsertResponse($upsertResponse)
    {
        // synergyid出力
        self::writeSynergyIdResponse($upsertResponse);
    }

    /**
     * responseのsynergyidを文字列に整形し出力
     */
    private static function writeSynergyIdResponse($response)
    {
        // 先頭1件データ表示
        if (!is_null($response)) {
            echo '<p><dl>';
            echo '<dt>Synergy!ID</dt><dd>' . htmlspecialchars($response->synergyid) . '</dd>';
            echo '</dl></p>';
        }
    }

    /**
     * extensionsを文字列に整形し出力
     * 例） '<dt>ext1</dt><dd>あいうえお</dd>'
     *      '<dt>ext2</dt><dd>1, 2, 3 (補助テキスト)</dd>'
     */
    private static function writeExtensionData($extensions)
    {
        foreach ($extensions->extensionData as $extensionData) {
            $formated = '<dt>';
            $formated .= htmlspecialchars($extensionData->column) . '</dt>';

            // textData時
            if (property_exists($extensionData->data, 'textData')) {
                $formated .= '<dd>' . htmlspecialchars($extensionData->data->textData) . '</dd>';
            }

            // selectData時
            if (property_exists($extensionData->data, 'selectData')) {
                $formated .= '<dd>' . htmlspecialchars(self::formatSelect($extensionData->data->selectData)) . '</dd>';
            }

            // 出力
            echo $formated;
        }
    }

    /**
     * selectListやsingleSelectを文字列に整形
     * 例） '1, 2, 3 (補助テキスト)'
     */
    private static function formatSelect($selectList)
    {
        // 選択肢存在チェック
        if (!property_exists($selectList, 'select')) {
            return;
        }

        $selectObject = $selectList->select;
        $formated = '';
        if (is_array($selectObject)) {
            // 複数選択時
            foreach ($selectObject as $select) {
                if (strlen($formated) > 0) {
                    $formated .= ', ';
                }
                $formated .= $select->value;
                if ($select->text != '') {
                    $formated .= ' (' . $select->text . ')';
                }
            }
        } else {
            // 単一選択時
            $formated = $selectObject->value;
            if ($selectObject->text != '') {
                $formated .= ' (' . $selectObject->text . ')';
            }
            
        }
        return $formated;
    }
}
?>
