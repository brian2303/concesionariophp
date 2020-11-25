$(function() {
    $("#tipoAuto").change(function() {
        if ($(this).val() === "automovil") {
            $("#cantidadPuertas").show();
            $("#capacidadCarga").hide();
            $("#cantidadPasajeros").hide();
        }else if($(this).val() === "furgoneta") {
            $("#capacidadCarga").show();
            $("#cantidadPasajeros").hide();
            $("#cantidadPuertas").hide();
        }else{
            $("#cantidadPasajeros").show();
            $("#cantidadPuertas").hide();
            $("#capacidadCarga").hide();
        }
    });
});