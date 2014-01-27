
                $(document).ready(function() { 
                    
                    $("#popust").blur(function () { 


                        var popust=$('#popust').val(); 
                        var cijena=$('#cijena').val(); 
                        var iznos=cijena-(cijena*popust/100); 
                        

                        
                        $('#iznos').val(iznos); 

                    }); 

                });  

