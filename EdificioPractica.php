<?php

/**
 * En la clase Edificio: se registra la dirección, la referencia a la colección de inmuebles que lo componen 
 * y la referencia a una instancia de la clase Persona que representa al administrador del edificio.
 */

 class EdificioPractica{
    private $direccion;
    private $colObjInmuebles;
    private $objPersonaAdmin;


    public function __construct($direccion, $colObjInmuebles, $objPersonaAdmin)
    {
        $this->direccion= $direccion;
        $this->colObjInmuebles= $colObjInmuebles;
        $this->objPersonaAdmin= $objPersonaAdmin;
    }


    //METODOS DE ACCESO

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    //_______________________________________

    
    public function getColObjInmuebles()
    {
        return $this->colObjInmuebles;
    }

    public function setColObjInmuebles($colObjInmuebles)
    {
        $this->colObjInmuebles = $colObjInmuebles;
    }
    //_______________________________________

    public function getObjPersonaAdmin()
    {
        return $this->objPersonaAdmin;
    }


    public function setObjPersonaAdmin($objPersonaAdmin)
    {
        $this->objPersonaAdmin = $objPersonaAdmin;
    }
    //_______________________________________

   
    /**
     * ---15---- Implementar el método darInmueblesDisponibles que recibe por parámetro el tipo de uso del inmueble 
     * y el costo mensual mensual máximo que se puede pagar y retorna una colección de todos 
     * los departamentos del tipo de uso  recibido (tipoUso) que se encuentran disponibles para ser alquilados 
     * y cuyo costo mensual no supera el valor recibido en el parámetro costoMaximo. 
     */

     //Ya tengo para usar el metodo estaDisponible($tipoUso, $montoMaximo ) ♻♻🔰
    //foreach pq tiene que recorrer toda la coleccion, tiene que ver todos los inmubles si son compatibles con 
    //busqueda o no

     public function darInmueblesDisponibles($tipoUso, $montoMaximo){
        $colInmueblesDisp=[];
        $colInmueblesEdificio= $this->getColObjInmuebles();
        foreach ($colInmueblesEdificio as $inmueble) {
            if($inmueble->estaDisponible($tipoUso, $montoMaximo)){
                // tambien es correcto hacerlo asi
                //$colInmueblesDisp[]= $inmueble;      funciona como un array_push segun chatgpt
                array_push($colInmueblesDisp, $inmueble);
            }
        }
        return $colInmueblesDisp;

     }


     /**
      * ------16----- Implementar el método buscarInmueble que recibe por parámetro un objeto inmueble y retorna
       *el índice de la colección donde se encuentra almacenado. Si el objeto no existe en la colección se debe 
       *retornar el valor-1
       *BUSCAR ES WHILE ‼👁‍🗨🔎🔎
      */
      //retorna el índice de la colección donde se encuentra almacenado.. QUE PIDE? $i ❔❔

      public function buscarInmueble($objImueble){
        $indice= -1;
        $encuentra=false;
        $colInmueblesEdificio= $this->getColObjInmuebles();
        $codRefInmuebleBuscado= $objImueble->getCodigoRef();
        $i=0;
        while(!$encuentra && $i < count($colInmueblesEdificio)){
            $unImueble= $colInmueblesEdificio[$i];
            $codUnInmueble= $unImueble->getCodigoRef();
            if($codRefInmuebleBuscado == $codUnInmueble){
                $encuentra=true;
                $indice= $i;
            }
            $i++;
        }
        return $indice;
        //esta bien eso?❔❓❔
      }

      /**
       * ----17Implementar el método registrarAlquilerInmueble que recibe por parámetro el tipo de uso que se requiere para
       *  el inmueble (tipoUso) , el monto máximo (montoMaximo) a pagar por mes y la referencia a la persona que  
       * desea alquilar (objPersona) elinmueble. Tener en cuenta que solo se va a poder realizar el alquiler de dicho
       *  inmueble si se verifica la política de alquiler de la empresa.  Por política de la empresa, los inmuebles
       *  de un edificio se deben ir ocupando por piso y por tipo. Es decir, hasta que todos los inmuebles de un piso
       *  y de un tipo no se encuentren ocupados, no es posible alquilar un inmueble de un piso superior.
        *El método debe retornar verdadero en caso de poder registrar el alquiler o falso en caso contrario. 
        *Recordar actualizar las estructuras correspondientes
       */

       public function registrarAlquilerInmueble($tipoUso, $montoMaximo, $objPersona){
        $puedeAlquilar=false;
        $piso=500;
        $colInmueblesDisp= $this->darInmueblesDisponibles($tipoUso, $montoMaximo);
        if($colInmueblesDisp != null){
            foreach($colInmueblesDisp as $inmueble){
                $pisoUnInmueble=$inmueble->getNroPiso();
                //$inqUnInmueble= $inmueble->getObjPersonaInq(); ya se verifica que no este alquilado con estaDisponible 
                if($pisoUnInmueble<$piso){
                    $piso= $pisoUnInmueble;
                    $inmueble->setObjPersonaInq($objPersona);
                    $puedeAlquilar=true; //esta linea esta bien aca?
                }
            }
        }
        return $puedeAlquilar;

       }



       /**
        * --18--Implementar el método calculaCostoEdificio  método que retorna el valor  correspondiente
        * a la suma de los costos de cada uno de los inmuebles que se encuentran alquilados.  
        */

        public function calculaCostoEdificio(){
            $costo=0;
            foreach ($this->getColObjInmuebles() as $unInm) {
                if($unInm->getObjPersonaInq()!= null){
                    $costo+= $unInm->getCostoMensual();
                }
            }
            return $costo;
        }


     //👀👯
     public function mostrarColInmuebles(){
        $string="";
        $colInmuebles= $this->getColObjInmuebles();
        $num= 1;
        foreach ($colInmuebles as $inmueble) {
            $string= $string.  "Inmueble ". $num. ": " . $inmueble. "\n";
            $num++;
        }
    }

    /**
     *---13---- Redefinir el método _toString  para que retorne la información de los atributos de la clase 
     * y la cantidad de inmuebles del edificio!!!!!!!!
     */

     public function __toString()
     {
        $cantInmuebles= count($this->getColObjInmuebles());
        $cadena= "Direccion del edificio: ". $this->getDireccion(). "\n".
                 "Inmuebles del edificio: ". $this->mostrarColInmuebles(). "\n".
                 "Administrador del edificio: ". $this->getObjPersonaAdmin(). "\n".
                 "Cantidad de inmuebles del edificio: ". $cantInmuebles;
        return $cadena; 
     }

 }




?>