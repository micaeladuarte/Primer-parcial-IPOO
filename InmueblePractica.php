<?php

/**
 * En la clase Inmueble se registra la siguiente información: 
 * código de referencia, el número de piso en el que se encuentra dentro del edificio, 
 * el tipo de uso  (comercial o departamento), costo mensual y una referencia al inquilino si se encuentra alquilado.
 */

 class InmueblePractica {
    private $codigoRef;
    private $nroPiso;
    private $tipoUso;
    private $costoMensual;
    private $objPersonaInq;


    public function __construct($codigoRef, $nroPiso, $tipoUso, $costoMensual, $objPersonaInq)
    {
        $this->codigoRef= $codigoRef;
        $this->nroPiso= $nroPiso;
        $this->tipoUso= $tipoUso;
        $this->costoMensual= $costoMensual;
        $this->objPersonaInq= $objPersonaInq;
    }

    //METODOS DE ACCESO GET Y SET
    public function getCodigoRef()
    {
        return $this->codigoRef;
    }

    public function setCodigoRef($codigoRef)
    {
        $this->codigoRef = $codigoRef;
    }

    //______________________________________

    public function getNroPiso()
    {
        return $this->nroPiso;
    }

    public function setNroPiso($nroPiso)
    {
        $this->nroPiso = $nroPiso;
    }
    //______________________________________


    public function getTipoUso()
    {
        return $this->tipoUso;
    }

    public function setTipoUso($tipoUso)
    {
        $this->tipoUso = $tipoUso;
    }
    //______________________________________
    
    public function getCostoMensual()
    {
        return $this->costoMensual;
    }

    public function setCostoMensual($costoMensual)
    {
        $this->costoMensual = $costoMensual;
    }
    //______________________________________


    public function getObjPersonaInq()
    {
        return $this->objPersonaInq;
    }

    public function setObjPersonaInq($objPersonaInq)
    {
        $this->objPersonaInq = $objPersonaInq;

    }
    //______________________________________



    /**
     *---9---- Implementar el método estaDisponible el cual recibe como parámetro el tipo  de uso que se requiere 
     * y el monto máximo disponible para alquilar y determine si el inmueble está disponible o no. 
     * Tener en cuenta que un inmueble sólo puede ser alquilado si no se encuentra alquilado en ese momento. 
     * Ingrese una implementación posible para el método
     */
    //return true o false

    //no entiendo bien con que compara? con un objeto de esta clase?
     public function estaDisponible ($tipoDeUso, $montoMaximo){
        $disponible=false;
        if($this->getObjPersonaInq()== null){
            if($tipoDeUso== $this->getTipoUso() && $montoMaximo<= $this->getCostoMensual()){
                $disponible=true;
            }
        }
        return $disponible;
     }




    public function __toString()
    {
        $cadena= "---Datos del inmueble---\n".
                 "Codigo de referencia: " . $this->getCodigoRef(). "\n".
                 "Tipo de uso: ". $this->getTipoUso(). "\n".
                 "Costo mensual del inmueble: ". "\n".
                 "Inqulino que alquila: ". "\n";
        return $cadena; 
    }


 }




?>