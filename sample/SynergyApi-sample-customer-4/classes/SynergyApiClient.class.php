<?php
/**
 * SoapClientラッパークラス
 * 
 * API_KEY、WSDLの値を設定してください
 */
class SynergyApiClient
{
    // Synergy!API-KEY
    const API_KEY = '';

    // WSDL文書パス dir/customer4.wsdl
    const WSDL = '';

    const LOCATIONURL = 'https://api.crmstyle.com/webapp/api/customer4/';
    
    // リクエストトレース設定（リクエストのトレースを行うか？ true時はリクエスト、レスポンスのトレースが表示されます）
    private $needTrace = false;

    // SoapClient
    private $client = null;

    public function __construct($needTrace)
    {
        if (!is_null($needTrace) && $needTrace == 'true') {
            $this->needTrace = true;
        }
        $this->client = new SoapClient(self::WSDL, array('trace' => $this->needTrace, 'cache_wsdl' => WSDL_CACHE_NONE));
        $this->client->__setLocation(self::LOCATIONURL);
    }

    /**
     * SoapClientゲッタ
     */
    public function get_Client()
    {
        return $this->client;
    }

    /**
     * リクエストトレース設定ゲッタ
     */
    public function get_NeedTrace()
    {
        return $this->needTrace;
    }

    /**
     * createリクエスト送信
     */
    public function create($request)
    {
        return $this->client->create($request);
    }

    /**
     * readリクエスト送信
     */
    public function read($request)
    {
        return $this->client->read($request);
    }

    /**
     * updateリクエスト送信
     */
    public function update($request)
    {
        return $this->client->update($request);
    }

    /**
     * deleteリクエスト送信
     */
    public function delete($request)
    {
        return $this->client->delete($request);
    }

    /**
     * countリクエスト送信
     */
    public function count($request)
    {
        return $this->client->count($request);
    }

    /**
     * upsertリクエスト送信
     */
    public function upsert($request)
    {
        return $this->client->upsert($request);
    }
}
?>
