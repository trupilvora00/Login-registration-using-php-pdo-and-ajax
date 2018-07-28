$(function(){

    $(".form").on("submit", function(e){
        
        e.preventDefault();

        
        // $form = $(this).serialize();
        $form = new FormData(this);
        console.log($form);
        
        $footer = $(this).parent(".modal-body").next(".modal-footer");

        
        $footer.html('<img src="images/loader1.gif">');
        

        // submitForm($form);
        $.ajax({
        
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this),
            cache:false,
            contentType:false,
            processData:false,
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



