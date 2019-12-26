$(document).ready(function()
{
	var direccionImagen = $('#user-img1').attr('src');
	var entradaImgNueva = $('#user-img-file');
	var nuevaImagen= $('#user-img');
	var borradoImgNueva = $('#borrar');
	var entradaImgActualizar = $('#user-img-file1');
	var actualizarImagen = $('#user-img1');
	var borradoImgActualizar = $('#borrar1');
	
	
	entradaImgNueva.change(function(){
        readURL(this);        
    });

    entradaImgActualizar.change(function(){
        readURL(this);        
    });
    
    borradoImgNueva.click(function(){
    	nuevaImagen.attr('src', '');
    	$("#error_img").html('');
    });
    
    borradoImgActualizar.click(function(){
    	actualizarImagen.attr('src', direccionImagen);
    	$("#error_img1").html('');
    });
    
    //Funcion para validar y cargar una imagen de persona y empresa
    function readURL(input) {
               
        var flag =true;        
        var idEntrada = input.id;
        var fileSize = input.files[0].size;

        if(fileSize>2000000 && idEntrada=="user-img-file"){
            $("#error_img").html("El Tamaño de la imagen es superior a 2MB<br>Vuelva a intentarlo con una imagen de tamaño inferior a 2MB").css("color","red");
            flag=false;
        }
        else if(fileSize>2000000 && idEntrada=="user-img-file1"){
            $("#error_img1").html("El Tamaño de la imagen es superior a 2MB<br>Vuelva a intentarlo con una imagen de tamaño inferior a 2MB").css("color","red");
            flag=false;
        }
        else{
            $("#error_img").html("");
            $("#error_img1").html("");
        }
        
        if (input.files && input.files[0]){            
           
            //El objeto "FileReader()" permite que las aplicaciones web lean ficheros (o información en buffer)
            //almacenados en el cliente de forma asíncrona, usando los objetos File o Blob dependiendo de los 
            //datos que se pretenden leer.
            var reader = new FileReader();

            //La propiedad FileReader.onload contiene un controlador de evento ejecutado cuando load es ejecutado
            reader.onload = function(e){

                if(flag && idEntrada=='user-img-file')
                    nuevaImagen.attr('src', e.target.result);
                else if(flag && idEntrada=='user-img-file1')
                    actualizarImagen.attr('src', e.target.result);
                else{
                    nuevaImagen.attr('src', "");
                    actualizarImagen.attr('src', direccionImagen);                    
                }

            }

        //El método "readAsDataURL()" es usado para leer el contenido del especificado
        //Blob o File.Cuando la operación de lectura es terminada
        reader.readAsDataURL(input.files[0]);
        }        
    } 
});