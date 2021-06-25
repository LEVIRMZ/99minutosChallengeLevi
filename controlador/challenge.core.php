<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ChallengeCore {

    private static function obtener_arbol_array($array) {
        //REFACTORIZAR PARA HACER EL ÁRBOL DINAMICO SEGÚN EL ARRAY
        $nodo_raiz = new Nodo($array[0]);

        $nodo2 = new Nodo($array[1]);
        $nodo3 = new Nodo($array[2]);

        $nodo4 = new Nodo($array[3]);
        $nodo5 = new Nodo($array[4]);

        $nodo6 = new Nodo($array[5]);
        $nodo7 = new Nodo($array[6]);

        $nodo8 = new Nodo($array[7]);

        $nodo3->setNodoIzquierdo($nodo6);
        $nodo3->setNodoDerecho($nodo7);

        $nodo4->setNodoIzquierdo($nodo8);

        $nodo2->setNodoIzquierdo($nodo4);
        $nodo2->setNodoDerecho($nodo5);

        $nodo_raiz->setNodoIzquierdo($nodo2);
        $nodo_raiz->setNodoDerecho($nodo3);

        return $nodo_raiz;
    }

    public static function obtenerHeightOfBinaryList($array) {
        $arbol = self::obtener_arbol_array($array);
        $height = 0;
        //tiene que existir un nodo al menos
        if ($arbol != NULL) {
            //Se crea un array vacio para ordenar transversalmente
            $queue = [];

            //Agregamos el arbol al array contador e inicializamos $height
            array_push($queue, $arbol);
            $height = 0;

            while (1 == 1) {
                //Indica el número de nodos
                $contador_nodos = count($queue);
                if ($contador_nodos == 0)
                    return $height;
                $height++;

                //Quitamos todos los nodos del nivel actual y encolamos todos los nodos del siguiente nivel
                while ($contador_nodos > 0) {
                    $nuevonodo = array_shift($queue);
                    if ($nuevonodo->getNodoIzquierdo() != NULL) {
                        array_push($queue, $nuevonodo->getNodoIzquierdo());
                    }

                    if ($nuevonodo->getNodoDerecho() != NULL) {
                        array_push($queue, $nuevonodo->getNodoDerecho());
                    }

                    $contador_nodos--;
                }
            }
        }

        return $height;
    }

    public static function obtenerNeighbors($intNodo) {
        //CREAR ARBOL Y REGRESAR VECINOS --- al parece que estoy sacando los hijos de un NODO no los vecinos
        $arbol = self::obtener_arbol_array([1, 2, 3, 4, 5, 6, 7, 8]);
        $nodo_encontrado = self::buscarNodo($arbol, $intNodo);
        $izquierdo = $nodo_encontrado != NULL && $nodo_encontrado->getNodoIzquierdo() != NULL ? $nodo_encontrado->getNodoIzquierdo()->getDato() : 'null';
        $derecho = $nodo_encontrado != NULL && $nodo_encontrado->getNodoDerecho() != NULL ? $nodo_encontrado->getNodoDerecho()->getDato() : 'null';
        //Se regresa esta cadena por que en la llamada a la API ya contiene la estructura
        //del JSON que se va a mostrar
        return '"left": "' . $izquierdo . '", "right":"' . $derecho . '" ';
    }

    /**
     * @param Nodo $obj_nodo
     * @param int $int_valor
     */
    public static function buscarNodo($obj_nodo, $int_valor) {
        if ($obj_nodo == NULL || ($obj_nodo != NULL && $obj_nodo->getDato() == $int_valor)) {
            return $obj_nodo;
        } else {
            if ($int_valor > $obj_nodo->getDato())
                return self::buscarNodo($obj_nodo->getNodoIzquierdo(), $int_valor);
            return self::buscarNodo($obj_nodo->getNodoDerecho(), $int_valor);
        }//End else
    }

    public static function getBreadthFirstSearch() {
        //Crear el arbol
        $nodo_root = new Nodo(1);
        $nodo_4 = new Nodo(-4);
        $nodo_1 = new Nodo(-3);
        $nodo_root->setNodoIzquierdo($nodo_4);
        $nodo_root->setNodoDerecho($nodo_1);

        //Hacer la búsqueda
        $result = self::bfs($nodo_root);
        $keys = array_keys($result);
        arsort($keys);
        $final = '';
        foreach ($keys as $index => $key) { //Recorrer los elementos encontrados/ordenados y concatenarlos para el resultado
            $final .= implode(' ', $result[$key]) . (($index + 1) < count($keys) ? ',' : '');
        }

        return '[' . $final . ']';
    }

    /**
     * 
     * @param Nodo $node
     * @return type
     */
    public static function bfs($node) {
        $queue = array($node);
        $node->explorado = 0;
        $output = array();
        while (count($queue) > 0) {
            $current_node = array_shift($queue);
            $output[$current_node->explorado][] = $current_node->getDato();
            if ($current_node->getNodoIzquierdo() != null) {
                $current_node->getNodoIzquierdo()->explorado = $current_node->explorado + 1;
                array_push($queue, $current_node->getNodoIzquierdo());
            }
            if ($current_node->getNodoDerecho() != NULL) {
                $current_node->getNodoDerecho()->explorado = $current_node->explorado - 1;
                array_push($queue, $current_node->getNodoDerecho());
            }
        }

        return $output;
    }

}
