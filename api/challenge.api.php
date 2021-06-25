<?php
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-type, Content-Length, Accept-Encoding');
header('Access-Control-Allow-Origin: *');
date_default_timezone_set('America/Mexico_City');

include_once '../clases/Nodo.php';
include_once '../controlador/challenge.core.php';

/**
 * Description of challenge
 *
 * @author Levi
 */
class ChallengeaPI {
    //put your code here
    
    public static function printAdvertencia($str_mensaje) {
        echo $str_mensaje;
    }
    
    public function obtenerHeightOfBinaryList() {
        //PASAR PARÁMETRO DE TIPO STRING Y CONVERTIR A ARRAY
        $array_convertido = [1, 2, 3, 4, 5, 6, 7, 8];
        $height = ChallengeCore::obtenerHeightOfBinaryList($array_convertido);
        echo '{"height": '.$height.'}';
    }
    
    public function obtenerNeighbors($intNodo) {
        $data = ChallengeCore::obtenerNeighbors($intNodo);
        echo '{"neighbors": ['.$data.']}';
    }
    
    public function getBreadthFirstSearch() {
        $bfs = ChallengeCore::getBreadthFirstSearch();
        echo '{"bfs": '.$bfs.'}';
    }
}


$data_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

//obtener códigos de peticiones
$request_post_code = isset($data_post['request_code']) ? $data_post['request_code'] : '';

if (isset($request_post_code) && $request_post_code != '') {
    switch ($request_post_code) {
        case 'GETBYN453':
            $api = new ChallengeaPI();
            $api->obtenerHeightOfBinaryList();
            break;
        
        case 'GETNeighbor':
            $api = new ChallengeaPI();
            $nodo = isset($data_post['nodo']) && !empty($data_post['nodo']) ? $data_post['nodo'] : 0;
            $api->obtenerNeighbors($nodo);
            break;
        
        case 'GETBFS':
            //Recibir parámetros y llamar clase API/CONTROLADOR
            $api = new ChallengeaPI();
            $api->getBreadthFirstSearch([-3, -4, 1]);
            break;
        default:
            ChallengeaPI::printAdvertencia('El código enviado no existe registrado');
            break;
    }
} else {
    ChallengeaPI::printAdvertencia('Debes de enviar un código de solicitud válido');
}