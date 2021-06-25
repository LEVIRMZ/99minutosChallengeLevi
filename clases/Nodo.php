<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nodo
 *
 * @author Levi
 */
class Nodo {
    private $dato;
    
    /**
     *
     * @var Nodo 
     */
    private $nodo_izquierdo;
    
    /**
     *
     * @var Nodo 
     */
    private $nodo_derecho;
    
    public $explorado;
    
    /**
     *
     * @var Nodo 
     */
    public $nodo_vecino_izquierdo;
    
    /**
     *
     * @var Nodo 
     */
    public $nodo_vecino_derecho;
    
    public function __construct($obj_dato) {
        $this->dato = $obj_dato;
    }
    
    public function getNodoIzquierdo() {
        return $this->nodo_izquierdo;
    }
    
    public function getNodoDerecho() {
        return $this->nodo_derecho;
    }
    
    public function setNodoIzquierdo($obj_nodo) {
        $this->nodo_izquierdo = $obj_nodo;
    }
    
    public function setNodoDerecho($obj_nodo) {
        return $this->nodo_derecho = $obj_nodo;
    }
    
    public function getDato() {
        return $this->dato;
    }
}
