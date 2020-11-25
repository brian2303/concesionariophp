<?php

function getUrlControllerMethod($controller, $method){
    return CONTEXT_APP . "/$controller/$method";
}

function getResource($ruta){
    return RESOURCES . $ruta;
}
