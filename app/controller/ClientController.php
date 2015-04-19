<?php
require_once 'app/view/ClientsView.php';
/**
 * Description of Router
 *
 * @author Daniel Fernandez
 */
class ClientController {
    
    private $action;
    public function __construct() {
        
    }

    public function runIndex(){
        $action = $_GET['action'];
        switch ($action) {
            case "clients": // this is for demo
                $client = new ClientsView();
                $client->runClients();
                break;
            
          
    
        }
    }
}

?>
