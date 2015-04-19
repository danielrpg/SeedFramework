 /*
 * Ejecutamos el objeto con jquery
 */

$(document).ready(function(){
       
       var home = new Home();

       home.init();
               
});

function Home(){
   this.init=function(){
       
         var x=$('#login');

         x.dialog({

                height:305,

                width:300,

                closeText: 'hide',

                closeOnEscape: false,

                draggable: false,

                disabled: true,

                resizable: false,

                open: function(event, ui) {

                    $(".ui-dialog-titlebar-close").hide(); 
                }

         });
       
        $('#btn_enviar').button();
        
        $('#pass_id').keypress(function(event){
 
			var keycode = (event.keyCode ? event.keyCode : event.which);
			
			if(keycode == '13'){
				//alert('You pressed a "enter" key in textbox');
				new Home().verifyUser();	
			}
		 
		});
        
       /*$('#btn_enviar').click(this.notIn);*/
   }



    this.notIn = function(){
    
        $('#login').effect('shake');
    
    }

    this.enterSystem = function(){
        
        
        var md5_pass = MD5($('#pass_id').val());
        
        $.ajax({
                type: "POST",
                
                url: "?view=index&action=createSession",
                
                data: "user="+$('#user_id').val()+"&password="+md5_pass,
                
                success: function(datos){
                    
                    document.location="?view=client&action=inSystem";
                    
                }
        });
        
        
        
        
       // document.location="?action=inSystem";
    }
    
  

    
}



