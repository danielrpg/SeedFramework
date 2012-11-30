<?php

/**
 * Description of HomeView
 *
 * @author Daniel
 */
class HomeView {
    // Este es el atributo que crea el template de la vista
    private $template;
    
    /*
     * Este es el metodo constructor de la clase HomeView
     */
    public function __construct() {
        // Aqui todo lo que se define para este constructor
    }
    
    /*
     * Este es el metodo que ejecuta el template de la vista
     */
    public function runIndex(){

        $library = Array('title'=>'Michael Vergason',
                         'keywords'=>'Michael, Vergason, vergason, ipad,os',
                          'description'=>'Michael Vergason');
        $template = file_get_contents('app/site/index.html');
        foreach ($library as $key => $value) {
             $template = str_replace('{'.$key.'}', $value, $template);
        }
        $template = str_replace('{clasejs}', 'app/site/js/Home.js', $template);
        $header = file_get_contents('app/site/header.html');
        $template = str_replace('{header}', $header, $template); 
        $login = file_get_contents('app/site/login.html');
        $template = str_replace('{content}', $login, $template);
        $footer = file_get_contents('app/site/footer.html');
        $template = str_replace('{footer}', $footer, $template);
        print($template);
    }
    
}

?>
