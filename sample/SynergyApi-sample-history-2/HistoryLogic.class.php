<?php
require "SynergyHistoryApiClient.class.php";

class HistoryLogic {

    public function read_by_synergyid($id,$limit,$offset){
    
        $soap_client = new SynergyHistoryApiClient();
            
        $readResponse = $soap_client->read_search_by_text('synergyid',$id,$limit,$offset);
        
        return $readResponse;

    }

    public function read_by_historyid($id){
    
        $soap_client = new SynergyHistoryApiClient();
            
        $readResponse = $soap_client->read_search_by_text('historyid',$id,1,0);
        
        return $readResponse;

    }

    public function delete_by_historyid($id){
    
        $soap_client = new SynergyHistoryApiClient();
            
        $count = $soap_client->delete_by_historyid('historyid',$id);
        
        return $count;
    }

    public function create_by_synergyid($synergyid,$synergyHistory){
    
        $soap_client = new SynergyHistoryApiClient();
            
        $historyid = $soap_client->create_by_synergyid($synergyid,$synergyHistory);
        
        return $historyid;
    }

    public function update_by_historyid($id,$synergyHistory){
    
        $soap_client = new SynergyHistoryApiClient();
            
        $readResponse = $soap_client->update_search_by_text('historyid',$id,$synergyHistory);
        
        return $readResponse;

    }

    public function count_by_synergyid($synergyid){
    
        $soap_client = new SynergyHistoryApiClient();
            
        $count = $soap_client->count_search_by_text('synergyid',$synergyid);

        return $count->count;
    }

}
?>