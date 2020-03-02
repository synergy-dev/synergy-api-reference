<?php
/**
 * ユーティリティクラス
 */
class Utils {
    /**
     * パラメータ取得（パラメータが存在しない時は空文字列に変換）
     */
    public static function getParam($paramName)
    {
        if (!array_key_exists($paramName, $_GET)) {
            return '';
        }
        return $_GET[$paramName];
    }

    /**
     * selectListやsingleSelectを文字列に整形
     * 例） '1, 2, 3 (補助テキスト)'
     */
    public static function formatSelect($selectObject)
    {
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
