<?php
/**
 * Description of ClientsView
 *
 * @author Daniel
 */
class ClientsView {
	 
    public function __construct() {
        
    }
    public function runClients(){    
        $library = Array('title'=>'SeedFramework',
                 'keywords'=>'SeedFramework, seed, framework, seed,os',
                 'description'=>'SeedFramework');
        $template = file_get_contents('app/site/clients.html');

        foreach ($library as $key => $value) {

             $template = str_replace('{'.$key.'}', $value, $template);

        }
        $header_html= file_get_contents('app/site/header.html');
        $template = str_replace('{header}', $header_html, $template);
        $list_clients = file_get_contents('app/site/ListClients.html');
        $list_clients = str_replace('{title_content}', '<h2>Clients List</h2>', $list_clients);
        $template = str_replace('{content}', $list_clients, $template);
        $footer_html= file_get_contents('app/site/footer.html');
        $template = str_replace('{footer}', $footer_html, $template);
        print($template);
    }
	 
}

?>
