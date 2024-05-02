<?php

/**
 * En la clase Persona se registra el  tipo y número de documento, nombre, apellido y teléfono de contacto.
 */

 class PersonaPractica{
    private $tipoDoc;
    private $nroDoc;
    private $nombre;
    private $apellido;
    private $telefono;


    public function __construct($tipoDoc, $nroDoc, $nombre, $apellido, $telefono)
    {
       $this->tipoDoc= $tipoDoc;
       $this->nroDoc= $nroDoc;
       $this->nombre= $nombre;
       $this->apellido= $apellido;
       $this->telefono= $telefono;
    }

   //Metodos Get y Set
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }
    public function setTipoDoc($tipoDoc)
    {
        $this->tipoDoc = $tipoDoc;
    }

    //_________________________________

   
    public function getNroDoc()
    {
        return $this->nroDoc;
    }
 
    public function setNroDoc($nroDoc)
    {
        $this->nroDoc = $nroDoc;
    }
    //_________________________________


    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }
    //_________________________________

    
    public function getApellido()
    {
        return $this->apellido;
    }
 
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

    }
    //_________________________________

   
    public function getTelefono()
    {
        return $this->telefono;
    }

  
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    //_________________________________

    public function __toString()
    {
      $cadena= "Nombre: ". $this->getNombre(). "\n".
               "Apellido: ". $this->getApellido(). "\n".
               "Tipo de documento: ". $this->getTipoDoc(). "\n".
               "Nro de documento: ". $this->getNroDoc(). "\n".
               "Telefono: " . $this->getTelefono();
      
      return $cadena;

    }

 }
   
    
    





?>