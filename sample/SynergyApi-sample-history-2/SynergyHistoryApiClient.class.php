<?php
class SynergyHistoryApiClient {

    // Synergy!API-KEY
    private static $API_KEY = "";

    // Synergy!History-HistoryKey
    private static $HISTORY_API_KEY = "";

    private static $soap = null;

    public function __construct(){
       self::$soap = new SoapClient("");
       self::$soap->__setLocation("https://api.crmstyle.com/webapp/api/history/");
    }
    
    public function getLastRequestHeaders(){
       self::$soap->__getLastRequestHeaders();
    }
    
    private function error_detail($code,$messag){
        echo '<div style="color:red">';
        echo $code;
        echo '<br>';
        echo $messag;
        echo '</div>';
    }
    
    private function read($readRequest){
        try{
             return self::$soap->read($readRequest);
             
        }catch (SoapFault $read_fault) {
             $errorcode = $read_fault->detail->fault->errorCode;
             $errormessage = $read_fault->detail->fault->errorMessage;
             self::error_detail($errorcode,$errormessage);
        }
    }
    
    private function delete($readRequest){
        try{
             return self::$soap->delete($readRequest);
      }catch (SoapFault $read_fault) {
             $errorcode = $read_fault->detail->fault->errorCode;
             $errormessage = $read_fault->detail->fault->errorMessage;
             self::error_detail($errorcode,$errormessage);
        }
    }
    private function create($readRequest){
        try{
             return self::$soap->create($readRequest);
        }catch (SoapFault $read_fault) {
             $errorcode = $read_fault->detail->fault->errorCode;
             $errormessage = $read_fault->detail->fault->errorMessage;
             self::error_detail($errorcode,$errormessage);
             
        }
    }

    private function update($readRequest){
        try{
             return self::$soap->update($readRequest);
        }catch (SoapFault $read_fault) {
             $errorcode = $read_fault->detail->fault->errorCode;
             $errormessage = $read_fault->detail->fault->errorMessage;
             self::error_detail($errorcode,$errormessage);
        }
    }
    
    private function count($readRequest){
        try{
             return self::$soap->count($readRequest);
        }catch (SoapFault $read_fault) {
             $errorcode = $read_fault->detail->fault->errorCode;
             $errormessage = $read_fault->detail->fault->errorMessage;
             self::error_detail($errorcode,$errormessage);
        }
    }

    public function read_search_by_text($column,$cond,$limit,$offset){

        $synergyComplexData = array('textData' => $cond);

        $readRequest = array(
            'key'          => self::$API_KEY,
            'historykey'   => self::$HISTORY_API_KEY,
            'column'       => $column,   
            'condition'    => $synergyComplexData,
            'limit'        => $limit,
            'offset'       => $offset,
            'isDesc'       => '',
            'sortcolumn'   => ''
            );
            
        return self::read($readRequest);

    }

    public function delete_by_historyid($column,$id){

        $synergyComplexData = array('textData' => $id);

        $readRequest = array(
            'key'          => self::$API_KEY,
            'historykey'   => self::$HISTORY_API_KEY,
            'column'       => $column,   
            'condition'    => $synergyComplexData,
            );
            
        return self::delete($readRequest);
    
    }

    public function create_by_synergyid($synergyid,$synergyHistory){

        $readRequest = array(
            'key'          => self::$API_KEY,
            'historykey'   => self::$HISTORY_API_KEY,
            'synergyid'       => $synergyid,   
            'synergyHistory'    => $synergyHistory
            );

        return self::create($readRequest);
    
    }

    public function update_search_by_text($column,$cond,$synergyHistory){

        $synergyComplexData = array('textData' => $cond);

        $readRequest = array(
            'key'            => self::$API_KEY,
            'historykey'     => self::$HISTORY_API_KEY,
            'column'         => $column,   
            'condition'      => $synergyComplexData,
            'synergyHistory' => $synergyHistory
            );
            
        return self::update($readRequest);
    
    }

    public function count_search_by_text($column,$cond){

        $synergyComplexData = array('textData' => $cond);

        $readRequest = array(
            'key'          => self::$API_KEY,
            'historykey'   => self::$HISTORY_API_KEY,
            'column'       => $column,   
            'condition'    => $synergyComplexData,
            );
            
        return self::count($readRequest);
    
    }

}
?>
