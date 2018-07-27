$(function(){

    $(".form").on("submit", function(e){
        
        e.preventDefault();

        
        $form = $(this).serialize();
        
        $footer = $(this).parent(".modal-body").next(".modal-footer");

        
        $footer.html('<img src="images/loader1.gif">');
        
        // console.log($form);

        // submitForm($form);
        $.ajax({
        
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data:$(this).serialize(),
            success: function(response){
        
                response = $.parseJSON( response ); 

                // console.log("hi");
                if(response.success){

                    if(!response.signout){
                        setTimeout(function(){
                            $footer.html( response.message );
                            window.location = response.url;
                        },2000);
                    }

                    $footer.html( response.message );
                }
                else if( response.error ){
                    $footer.html( response.message );
                }

                
                
            }
        
        
        });

    });

});



