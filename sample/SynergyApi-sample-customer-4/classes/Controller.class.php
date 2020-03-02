<?php
require_once 'RequestConstructor.class.php';
require_once 'SynergyApiClient.class.php';
require_once 'Utils.class.php';
/**
 * コントローラクラス
 *
 * RequestConstructorにてクエリ文字列よりリクエストオブジェクト（連想配列）を生成し
 * SynergyApiClientにリクエスト処理を依頼するクラス
 */
class Controller
{
    // SynergyApiClient
    private $synergyApiClient = null;

    /**
     * SoapClientゲッタ
     */
    public function get_Client()
    {
        return $this->synergyApiClient->get_Client();
    }

    /**
     * リクエストトレース設定ゲッタ
     */
    public function get_NeedTrace()
    {
        return $this->synergyApiClient->get_NeedTrace();
    }

    /**
     * createリクエスト処理
     */
    public function create()
    {
        // createRequest作成
        $request = RequestConstructor::createCreateRequest(SynergyApiClient::API_KEY);

        // create処理
        $this->synergyApiClient = new SynergyApiClient(Utils::getParam('needtrace'));
        return $this->synergyApiClient->create($request);
    }

    /**
     * readリクエスト処理
     */
    public function read()
    {
        // readRequest作成
        $request = RequestConstructor::createReadRequest(SynergyApiClient::API_KEY);

        // read処理
        $this->synergyApiClient = new SynergyApiClient(Utils::getParam('needtrace'));
        return $this->synergyApiClient->read($request);
    }

    /**
     * updateリクエスト処理
     */
    public function update()
    {
        // updateRequest作成
        $request = RequestConstructor::createUpdateRequest(SynergyApiClient::API_KEY);

        // create処理
        $this->synergyApiClient = new SynergyApiClient(Utils::getParam('needtrace'));
        return $this->synergyApiClient->update($request);
    }
    
    /**
     * deleteリクエスト処理
     */
    public function delete()
    {
        // deleteRequest作成
        $request = RequestConstructor::createDeleteRequest(SynergyApiClient::API_KEY);

        // create処理
        $this->synergyApiClient = new SynergyApiClient(Utils::getParam('needtrace'));
        return $this->synergyApiClient->delete($request);
    }

    /**
     * countリクエスト処理
     */
    public function count()
    {
        // countRequest作成
        $request = RequestConstructor::createCountRequest(SynergyApiClient::API_KEY);

        // count処理
        $this->synergyApiClient = new SynergyApiClient(Utils::getParam('needtrace'));
        return $this->synergyApiClient->count($request);
    }

    /**
     * upsertリクエスト処理
     */
    public function upsert()
    {
        // upsertRequest作成
        $request = RequestConstructor::createUpsertRequest(SynergyApiClient::API_KEY);

        // create処理
        $this->synergyApiClient = new SynergyApiClient(Utils::getParam('needtrace'));
        return $this->synergyApiClient->upsert($request);
    }
}
?>