<?php

require_once 'app/core/Mysql.php';
/**
 * Description of HomeModel
 *
 * @author Daniel Fernandez
 */
class User {
    
    /*
     * Este es el constructo de del modelo HomeModel
     */
    public function __construct() {
        
    }
    
    /*
     * Este es el metodo que verifica 
     * @return boolean si exite o no en la base de datos
     */
    public function verifyUser($user,$password){
              
       // $query = "SELECT * FROM users WHERE login='$user' AND password='$password' AND status=1";
       
       $query = "SELECT u.idUser as idUser, u.name as name, u.lastName as lastName, u.login as login, u.mail as mail, u.password as password, p.name as permissions
                        FROM users as u, permissions as p, rols as r  
                        WHERE u.login='".$user."' AND u.password='".$password."' AND (p.name='Administration' OR p.name='Partner' OR p.name='Marketing')  AND p.idUser = u.idUser AND p.idRol= r.idRol 
                                     AND (r.typeRol='All' OR r.typeRol='Partner' OR r.typeRol='Marketing')";
	   
        $this->iniSession($user, $password);
        
        $mysql = new Mysql();
		
	$users = $mysql->query($query);

        if($users[0]['u']['idUser'] != 0){
            
            
            $json_data = Array('login'=>$users[0]['u']['login'],
                
                               'password'=>$users[0]['u']['password'],
                
                               'msg'=>'ok');
 
            $_SESSION['idUser'] = $users[0]['u']['idUser'];
            
            $_SESSION['name'] = $users[0]['u']['name'];
            
            $_SESSION['lastName'] = $users[0]['u']['lastName'];
            
            $_SESSION['login'] = $users[0]['u']['login'];
            
            $_SESSION['mail'] = $users[0]['u']['mail'];
            
            $_SESSION['password'] = $users[0]['u']['password'];
            
            $_SESSION['permissions'] = $users[0]['p']['permissions'];
            
        }else{
            
            $json_data = Array('msg'=>'not exist');
           // header('Location: ?action=');
        }
        
        //$mysql->__destruct();
        
        return json_encode($json_data);
        
    }
    
    /*
     * Esta es la funcion que cierra la session
     */
    public function logout_user(){
        
        session_start();
        
        session_unset();
        
        session_destroy();
        
        header('Location: ?action=');
    }
    
    /*
     * Esta es la funcion que verifica la session del usuario
     */
    
    public function verifySession(){
        
        session_start();
        
        $res_session = false;
        
        if(isset($_SESSION['name']) && isset($_SESSION['login']) && isset($_SESSION['password'])){
            
            $res_session = true;
        }
        
        return $res_session;
    }
    
    /*
     * Esta es la funcion que crea la session
     */
    public function iniSession($user, $password){
        
        session_start();
        
        $_SESSION['user'] = $user;
        
        $_SESSION['password'] = $password;
        
    }
    
}

?>
