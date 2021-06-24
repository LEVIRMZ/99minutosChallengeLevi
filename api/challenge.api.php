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
        //Se supone que llega un arreglo en $arr_valores
        //verificar y ver si se envía un string para parsearlo con json y que sea una
        //variable de tipo arreglo lo que se pase al método obtenerHeightOfBinaryList
        $height = ChallengeCore::obtenerHeightOfBinaryList();
        echo '{"height": '.$height.'}';
    }
    
    public function obtenerNeighbors($intNodo) {
        $data = ChallengeCore::obtenerNeighbors($intNodo);
        echo '{"neighbors": ['.$data.']}';
    }
    
    public function getBreadthFirstSearch($arr_bfs_search) {
        //verificar que tipo mandamos en el parámetro $arr_bfs_search 
        //para saber si convertirlo a array o no
        $bfs = ChallengeCore::getBreadthFirstSearch($arr_bfs_search);
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
        
        case 'GETNeighbor ':
            $api = new ChallengeaPI();
            $nodo = isset($data_pos['nodo']) && !empty($data_pos['nodo']) ? $data_pos['nodo'] : [];
            $api->obtenerNeighbors($nodo);
            break;
        
        case 'GETBFS':
            //Recibir parámetros y llamar clase API/CONTROLADOR
            break;
        default:
            ChallengeaPI::printAdvertencia('El código enviado no existe registrado');
            break;
    }
} else {
    ChallengeaPI::printAdvertencia('Debes de enviar un código de solicitud válido');
}