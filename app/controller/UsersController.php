<?php
// Estas son las librerias que se necesita para poder ejecutar el home
require_once 'app/model/User.php';
require_once 'app/view/HomeView.php';

// Este es el modelo de la lista de usuarios
require_once 'app/model/Client.php';
require_once 'app/view/ClientsView.php';


/**
 * Description of Router
 *
 * @author Daniel Fernandez
 */
class UsersController {
    
    private $action;
    /*
     * Este es el metodo constructor para el proyecto
     */
    public function __construct() {
        
    }
    
    /*
     * Esta es la funcion que ejecuta y redirecciona la solicitud  que se haga
     */
    public function runIndex(){
        
        $action = $_GET['action'];
        
        switch ($action) {
            
            case "login":
                
                $user = new User();
                
                $json_data = $user->verifyUser($_GET['user'],$_GET['password']);
                
                if($json_data === 'null'){
                
                    header('Location: ?action=');
                    
                }else{
                    
                  echo $json_data;
                }
               
                break;
            
            case "createSession":
                
                $user = new User();
                
                $user->iniSession($_POST['user'],$_POST['password']);
                
                break;
            
            case "inSystem":
                
                $client = new ClientsView();
                
                $client->runClients();

                break;
            
            case "logout":
                
                $user = new User();
                
                $user->logout_user();
                
                break;
    
        }
    }
}

?>
