<?php
include_once "AccesoDatos.php";
class vehiculo
{
    public $_patente;
    public $_color;
    public  $_marca;
    public $_fechaIng;

    public function __construct($patente= NULL,$color=NULL,$marca=NULL)
    {
        if($patente !==NULL && $color !==NULL && $marca !==NULL){
        $this->_patente = $patente;
        $this->_color = $color;
        $this->_marca = $marca;
        $this->_fechaIng = date("Y-m-d H:i:s");
        }
        
    }

    public function GuardarVehiculo()
	{
            $ahora = date("Y-m-d H:i:s");
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            $cadenaConsulta = "INSERT into estacionados (patente,color,marca,fecha_hora_ing)values('".$_POST["patente"]."','".$_POST["color"]."','".$_POST["marca"]."','".$ahora."')";
			$consulta =$objetoAccesoDato->RetornarConsulta($cadenaConsulta);
			$consulta->execute();	
			return $consulta->fetchAll(PDO::FETCH_CLASS, "vehiculo");	
    }

}





?>