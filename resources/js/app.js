import Dropzone from "dropzone";
 
Dropzone.autoDiscover = false;
const dropzone = new Dropzone(".dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
            this.options.addedfile.call(this,imagenPublicada);//carga la imagen mediante un método de dropzone
            this.options.thumbnail.call(
                this, 
                imagenPublicada, 
                `/uploads/${imagenPublicada.name}`
            ); //OJO CON LAS COMILLAS EN LA RUTA: carga la miniatura del dropzone usando la imagen en su ruta

            imagenPublicada.previewElement.classList.add(
                "dz.success",
                "dz-complete"
            );
        }
    }
});
//Metodos de dropzone para debug
// dropzone.on('sending', function(file,xhr, formData){
//    console.log(file);
// });

dropzone.on('success', function(file, response){
   //console.log(response.imagen);
   document.querySelector('[name="imagen"]').value=response.imagen;
});

// dropzone.on('error', function(file, message){
//    console.log(message);
// });

dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value="";
});