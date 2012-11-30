<?php
ob_start();
//require_once 'app/controller/UsersController.php';
require_once 'app/view/IndexView.php';
/**
 * Description of index
 *
 * @author Daniel Fernandez
 */
class Index {
    /*
     * Este es el metodo que ejecuta la aplicación
     */
    public function run($page){
  	  switch ($page) {
  		  case 'index':
  			  $users = new UsersController();
         	$users->runIndex();
  			  break;
  		  default:
          $home_view = new HomeView();
          $home_view->runIndex();  
          break;
  	  }   
    }
}
$index = new Index();
$index->run($_GET['view']);
ob_end_flush();
?>
