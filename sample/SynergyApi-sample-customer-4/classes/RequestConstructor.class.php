<?php
/**
 * リクエスト生成クラス
 * 
 * クエリ文字列よりリクエストを連想配列で生成します
 */
class RequestConstructor
{
    /**
     * selectを作成
     */
    private static function createSelect($value, $subText)
    {
        $select = null;
        if (!is_null($value) && $value != '') {
            $select = array('value' => $value);
            if (!is_null($subText) && $subText != '') {
                $select['text'] = $subText;
            }
            $select;
        }
        return $select;
    }

    /**
     * singleSelectを作成
     */
    private static function createSingleSelect($value1, $text1)
    {
        $singleSelect = null;

        // 選択肢
        $select = self::createSelect($value1, $text1);
        if (!is_null($select)) {
            $singleSelect = $select;
        }

        // 選択肢無し時
        if (is_null($singleSelect)) {
            return '';
        }

        // 選択肢有り時
        return array('select' => $singleSelect);
    }

    /**
     * selectListを作成
     */
    private static function createSelectList($value1, $text1, $value2, $text2)
    {
        $selectList = null;
        // 選択肢1
        $select = self::createSelect($value1, $text1);
        if (!is_null($select)) {
            $selectList[] = $select;
        }

        // 選択肢2
        $select = self::createSelect($value2, $text2);
        if (!is_null($select)) {
            $selectList[] = $select;
        }
        
        // 選択肢無し時
        if (is_null($selectList)) {
            return '';
        }

        // 選択肢有り時
        return array('select' => $selectList);
    }

    /**
     * synergyComplexDataを作成
     */
    private static function createSynergyComplexData($op, $dataType, $text, $value1, $subText1, $value2, $subText2)
    {
        $synergyComplexData = null;
        if ($dataType == 'text') {
            // textData時
            if (!is_null($text)) {
                $text = $text;
            }
            $synergyComplexData['textData'] = $text;
        } elseif ($dataType == 'select') {
            // selectData時
            $selectList = self::createSelectList($value1, $subText1, $value2, $subText2);
            $synergyComplexData['selectData'] = $selectList;
        }

        // op
        if (!is_null($op) && $op != '') {
            $synergyComplexData['op'] = $op;
        }

        return $synergyComplexData;
    }

    /**
     * extensionDataを作成
     */
    private static function createExtensionData($column, $dataType, $text, $value1, $subText1, $value2, $subText2)
    {
        if (is_null($column) || $column == '') {
            return;
        }
        $synergyComplexData = self::createSynergyComplexData(null, $dataType, $text, $value1, $subText1, $value2, $subText2);
        return array('column' => $column, 'data' => $synergyComplexData);
    }

    /**
     * searchConditionを作成
     */
    private static function createSearchCondition($column, $op, $dataType, $text, $value1, $value2)
    {
        if (is_null($column) || $column == '') {
            return;
        }
        $synergyComplexData = self::createSynergyComplexData($op, $dataType, $text, $value1, null, $value2, null);
        return array('column' => $column, 'condition' => $synergyComplexData);
    }

    /**
     * テキストタイプの項目をsynergyPersonにセット
     */
    private static function setTextTypeValueToPerson(&$synergyPerson, $paramName)
    {
        if (Utils::getParam($paramName . '_set') == 'true') {
            $param = Utils::getParam($paramName);
            if (!is_null($param) && $param != '') {
                $param = $param;
            }
            $synergyPerson[$paramName] = $param;
        }
    }

    /**
     * 日付タイプの項目をsynergyPersonにセット
     */
    private static function setDateTypeValueToPerson(&$synergyPerson, $paramName)
    {
        if (Utils::getParam($paramName . '_set') == 'true') {
            $param = Utils::getParam($paramName);
            if (!is_null($param) && $param != '') {
                $param = $param;
            } else {
                $param = null;
            }
            $synergyPerson[$paramName] = $param;
        }
    }

    /**
     * セレクトリストタイプの項目をsynergyPersonにセット
     */
    private static function setSelectListTypeValueToPerson(&$synergyPerson, $paramName)
    {
        if (Utils::getParam($paramName . '_set') == 'true') {
            $synergyPerson[$paramName] = self::createSelectList(Utils::getParam($paramName . '_value_1'), 
                                                                Utils::getParam($paramName . '_text_1'), 
                                                                Utils::getParam($paramName . '_value_2'), 
                                                                Utils::getParam($paramName . '_text_2'));
        }
    }

    /**
     * シングルセレクトタイプの項目をsynergyPersonにセット
     */
    private static function setSingleSelectTypeValueToPerson(&$synergyPerson, $paramName)
    {
        if (Utils::getParam($paramName . '_set') == 'true') {
            $synergyPerson[$paramName] = self::createSingleSelect(Utils::getParam($paramName . '_value_1'), 
                                                                  Utils::getParam($paramName . '_text_1'));
        }
    }

    /**
     * 真偽タイプの項目をsynergyPersonにセット
     */
    private static function setBoolTypeValueToPerson(&$synergyPerson, $paramName)
    {
        if (Utils::getParam($paramName . '_set') == 'true') {
            $param = Utils::getParam($paramName);
            if ($param != '') {
                if (strtoupper($param) == 'TRUE') {
                    $param = true;
                }
                if (strtoupper($param) == 'FALSE') {
                    $param = false;
                }
                $synergyPerson[$paramName] = $param;
            }
        }
    }

    /**
     * 指定タイプの項目をextensionにセット
     */
    private static function setValueToExtension(&$extensionData, $paramName, $dataType)
    {
        if (Utils::getParam($paramName . '_set') == 'true') {
            $extensionData[] = self::createExtensionData($paramName, 
                                                   $dataType, 
                                                   Utils::getParam($paramName), 
                                                   Utils::getParam($paramName . '_value_1'), 
                                                   Utils::getParam($paramName . '_text_1'), 
                                                   Utils::getParam($paramName . '_value_2'), 
                                                   Utils::getParam($paramName . '_text_2'));
        }
    }

    /**
     * 指定項目をsearchConditionにセット
     */
    private static function setValueToSearchCondition(&$searchCondition, $paramName)
    {
        // 項目名に何か値が入っていれば作成
        if (!is_null(Utils::getParam($paramName . '_column')) && Utils::getParam($paramName . '_column') != '') {
            $searchCondition[] = self::createSearchCondition(Utils::getParam($paramName . '_column'), 
                                                       Utils::getParam($paramName . '_op'), 
                                                       Utils::getParam($paramName . '_dataType'), 
                                                       Utils::getParam($paramName . '_text'), 
                                                       Utils::getParam($paramName . '_value_1'), 
                                                       Utils::getParam($paramName . '_value_2'));
        }
    }

    /**
     * synergyPersonを作成
     */
    private static function createSynergyPerson()
    {
        $synergyPerson = null;

        // ＰＣメールアドレス
        self::setTextTypeValueToPerson($synergyPerson, 'mailaddress');

        // 携帯メールアドレス
        self::setTextTypeValueToPerson($synergyPerson, 'mobilemailaddress');

        // メール受信拒否フラグ
        self::setBoolTypeValueToPerson($synergyPerson, 'refusalflag');

        // ＰＣメールエラーカウント
        self::setTextTypeValueToPerson($synergyPerson, 'mailerrorcount');

        // 携帯メールエラーカウント
        self::setTextTypeValueToPerson($synergyPerson, 'mobilemailerrorcount');

        // メルマガ解除フラグリスト
        self::setSelectListTypeValueToPerson($synergyPerson, 'releaseflaglist');

        // 氏名
        self::setTextTypeValueToPerson($synergyPerson, 'name');

        // シメイ
        self::setTextTypeValueToPerson($synergyPerson, 'kana');

        // 都道府県
        self::setSingleSelectTypeValueToPerson($synergyPerson, 'prefecture');

        // 住所
        self::setTextTypeValueToPerson($synergyPerson, 'address');

        // 郵便番号
        self::setTextTypeValueToPerson($synergyPerson, 'zipcode');

        // 電話番号
        self::setTextTypeValueToPerson($synergyPerson, 'phonenumber');

        // FAX
        self::setTextTypeValueToPerson($synergyPerson, 'faxnumber');

        // 携帯電話番号
        self::setTextTypeValueToPerson($synergyPerson, 'mobilenumber');

        // 生年月日
        self::setDateTypeValueToPerson($synergyPerson, 'birthday');

        // パスワード
        self::setTextTypeValueToPerson($synergyPerson, 'password');

        $extensionData = null;
        // ext1
        self::setValueToExtension($extensionData, 'ext1', 'text');

        // ext2
        self::setValueToExtension($extensionData, 'ext2', 'text');

        // ext3
        self::setValueToExtension($extensionData, 'ext3', 'text');

        // ext4
        self::setValueToExtension($extensionData, 'ext4', 'text');

        // ext5
        self::setValueToExtension($extensionData, 'ext5', 'select');

        // ext6
        self::setValueToExtension($extensionData, 'ext6', 'select');

        // ext7
        self::setValueToExtension($extensionData, 'ext7', 'text');

        // extensions
        if (!is_null($extensionData)) {
            $synergyPerson['extensions'] = array('extensionData' => $extensionData);
        }

        return $synergyPerson;
    }

    /**
     * searchConditionsを作成
     */
    private static function createSearchConditions()
    {
        $searchCondition = null;
        // 検索条件1
        self::setValueToSearchCondition($searchCondition, 'cond1');

        // 検索条件2
        self::setValueToSearchCondition($searchCondition, 'cond2');

        $searchConditions['searchCondition'] = $searchCondition;

        // op
        $op = Utils::getParam('scsop');
        if ($op != '') {
            $searchConditions['op'] = $op;
        }

        return $searchConditions;
    }

    /**
     * createRequestを作成
     */
    public static function createCreateRequest($apiKey) 
    {
        // key
        $request['key'] = $apiKey;

        // synergyPerson
        $request['synergyPerson'] = self::createSynergyPerson();

        return $request;
    }

    /**
     * readRequestを作成
     */
    public static function createReadRequest($apiKey)
    {
        // key
        $request['key'] = $apiKey;

        // searchConditions
        $request['searchConditions'] = self::createSearchConditions();
        
        // limit
        $limit = Utils::getParam('limit');
        if ($limit != '') {
            $request['limit'] = $limit;
        }
        
        // offset
        $offset = Utils::getParam('offset');
        if ($offset != '') {
            $request['offset'] = $offset;
        }

        // sortcolumn
        $sortcolumn = Utils::getParam('sortcolumn');
        if ($sortcolumn != '') {
            $request['sortcolumn'] = $sortcolumn;
        }

        // isDesc
        $isDesc = Utils::getParam('isDesc');
        if ($isDesc != '') {
            if (strtoupper($isDesc) == 'TRUE') {
                $isDesc = true;
            }
            if (strtoupper($isDesc) == 'FALSE') {
                $isDesc = false;
            }
            $request['isDesc'] = $isDesc;
        }

        return $request;
    }

    /**
     * updateRequestを作成
     */
    public static function createUpdateRequest($apiKey)
    {
        // key
        $request['key'] = $apiKey;

        // searchConditions
        $request['searchConditions'] = self::createSearchConditions();

        // synergyPerson
        $request['synergyPerson'] = self::createSynergyPerson();

        return $request;
    }

    /**
     * deleteRequestを作成
     */
    public static function createDeleteRequest($apiKey)
    {
        // key
        $request['key'] = $apiKey;

        // searchConditions
        $request['searchConditions'] = self::createSearchConditions();

        return $request;
    }

    /**
     * countRequestを作成
     */
    public static function createCountRequest($apiKey)
    {
        // key
        $request['key'] = $apiKey;

        // searchConditions
        $request['searchConditions'] = self::createSearchConditions();
        
        // limit
        $limit = Utils::getParam('limit');
        if ($limit != '') {
            $request['limit'] = $limit;
        }
        
        // offset
        $offset = Utils::getParam('offset');
        if ($offset != '') {
            $request['offset'] = $offset;
        }

        // sortcolumn
        $sortcolumn = Utils::getParam('sortcolumn');
        if ($sortcolumn != '') {
            $request['sortcolumn'] = $sortcolumn;
        }

        // isDesc
        $isDesc = Utils::getParam('isDesc');
        if ($isDesc != '') {
            if (strtoupper($isDesc) == 'TRUE') {
                $isDesc = true;
            }
            if (strtoupper($isDesc) == 'FALSE') {
                $isDesc = false;
            }
            $request['isDesc'] = $isDesc;
        }

        return $request;
    }

    /**
     * upsertRequestを作成
     */
    public static function createUpsertRequest($apiKey)
    {
        // key
        $request['key'] = $apiKey;

        // searchConditions
        $request['searchConditions'] = self::createSearchConditions();

        // synergyPerson
        $request['synergyPerson'] = self::createSynergyPerson();

        return $request;
    }
}
?>
