<?php

/**
 * Description of HomeView
 *
 * @author Daniel
 */
class IndexView {
    // This is the attribute template
    private $template;
    
    /*
     * constructor
     */
    public function __construct() {
        //Constructor statement here
    }
    
    /*
     * This is the main function
     */
    public function runIndex(){
        $library = Array('title'=>'Seed Framework 0.1',
                         'keywords'=>'Seed Framework, seed, framework, ipad,os',
                          'description'=>'Seed Framework');
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
