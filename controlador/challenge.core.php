<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of challenge
 *
 * @author Levi
 */
class ChallengeCore {

    private $toTree = [1, 2, 3, 4, 5, 6, 7, 8];

    public static function obtenerHeightOfBinaryList() {
        // Prueba de que llega hasta el controlador
        return 3;

        //$nodo_raiz->obtenerHeight();
    }

    public static function obtenerNeighbors($intNodo) {
        //CREAR ARBOL Y REGRESAR VECINOS
        $nodo_raiz = new Nodo($this->toTree[0]);

        $nodo2 = new Nodo($this->toTree[1]);
        $nodo3 = new Nodo($this->toTree[2]);

        $nodo4 = new Nodo($this->toTree[3]);
        $nodo5 = new Nodo($this->toTree[4]);

        $nodo6 = new Nodo($this->toTree[5]);
        $nodo7 = new Nodo($this->toTree[6]);

        $nodo2->setNodoDerecho($nodo4);
        $nodo2->setNodoIzquierdo($nodo5);

        $nodo3->setNodoDerecho($nodo6);
        $nodo3->setNodoIzquierdo($nodo7);

        $nodo_raiz->setNodoDerecho($nodo2);
        $nodo_raiz->setNodoIzquierdo($nodo3);

        //ARBOL ARMADO
        $vecinos = self::getNeighborNodes($nodoRaiz, $intNodo);
        //Se regresa esta cadena por que en la llamada a la API ya contiene la estructura
        //del JSON que se va a mostrar
        return '"left": "' . $vecinos[0] . '", "right":"' . $vecinos[1] . '" ';
    }

    /**
     * 
     * @param Nodo $obj_nodo_raiz
     * @param int $int_nodo
     * @return type
     */
    public static function getNeighborNodes($obj_nodo_raiz, $int_nodo) {
        $datos = [NULL, NULL];
        if ($obj_nodo_raiz != NULL) {
            //TODO: Hacer recursividad para encontrar los vecinos del nodo dado
        }

        return $datos;
    }

    public static function getBreadthFirstSearch($arr_arbol_search) {
        
    }

}
