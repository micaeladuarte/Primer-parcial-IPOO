<?php

include_once "PersonaPractica.php";
include_once "InmueblePractica.php";
include_once "EdificioPractica.php";

/**
 *--19--- Se crea un objeto Edificio con los siguientes datos: Direccion= Juab B. Justo 3456 y 
 *responsable (DNI, 27432561, Carlos,Martinez,154321233) .
 */
$objResponsable= new PersonaPractica("DNI", 27432561, "Carlos", "Martinez", 154321233);
$objEdificio= new EdificioPractica("Juan B. Justo 3456", [], $objResponsable); //le paso una coleccion VACIA


/**
 * ---20---Crear 5 objetos inmuebles con la información de la tabla:
 */
$objInm1= new InmueblePractica("I1", 1, "local comercial", 50000, new PersonaPractica("DNI", 12333456, "Pepe", "Suarez", 4456722));
$objInm2= new InmueblePractica("I2", 1, "local comercial", 50000, null);
$objInm3= new InmueblePractica("I3", 2, "departamento", 35000, new PersonaPractica("DNI", 12333422, "Pedro", "Suarez", 446678));
$objInm4= new InmueblePractica("I4", 2, "departamento", 35000, null);
$objInm5= new InmueblePractica("I5", 3, "departamento", 35000, null);


/**
 * --21-- Implementar que el objeto Edificio que tiene los departmentos y los inquilinos creados en (1) y (2).
 */
$colInmuebles= [$objInm1, $objInm2, $objInm3, $objInm4, $objInm5];
$objEdificio->setColObjInmuebles($colInmuebles);


/**
 * --22-- Invocar al método darInmueblesDisponiblesParaAlquiler con parámetros Tipo Uso igual a “departamento” y 
 * monto Máximo igual a 550000.  Visualizar el resultado.
 * OJO PQ TIENE QUE MOSTRAR UNA COLECCION DE OBJETOS 👀👀👀👀👀👀👀👀👀
 */
 echo "Los inmuebles disponibles son: \n";
 $colInmueblesDisp= $objEdificio->darInmueblesDisponibles("departamento", 50000);
 foreach ($colInmueblesDisp as $inmueble) {
    echo "Inmueble: " . $inmueble. "\n";
 }

 /**
  *--23-- Invocar al método registrarAlquilerInmueble donde tipoUso = “departamento” y costoMaximo es 550000
  * y objPersona es una referencia a una instancia de la clase Persona con los  siguientes 
  *datos (DNI, 28765436, Mariela,Suarez,25543562). Visualizar un mensaje que represente 
  *si la acción pudo o no ser concretada.
  */

  $objPersonaMariela= new PersonaPractica("DNI", 28765436, "Mariela", "Suarez", 25543562);

  if($objEdificio->registrarAlquilerInmueble("departamento", 55000, $objPersonaMariela)) {
    echo "Se pudo alquilar. \n";
  } else {
    echo "No se pudo concretar el alquiler \n";
  }



  /**
   * --24--Invocar al método calculaCostoEdificio() y visualizar su resultado.
   */
  echo "Costo de todos los inmuebles alquilados: ". $objEdificio->calculaCostoEdificio() . "\n\n";


  /**
   * --25-- Realizar un echo del objeto Edificio creado en el punto 1
   */

   echo "------Datos del edificio------\n" .  $objEdificio;













?>