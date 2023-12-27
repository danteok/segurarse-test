<?php 

Class GestorEmpleados {

	/**
	 * crea un nuevo empleado con los datos a traves de un array()
	 */
	public static function agregar($data) {
		$jsonData = $data;
	 	$empleado = new Empleado();

	    $empleado->nombre = $jsonData['nombre'];
	    $empleado->apellido = $jsonData['apellido'];
	    $empleado->fecha_ingreso = $jsonData['fecha_ingreso'];
	    $empleado->puesto_trabajo = $jsonData['puesto_trabajo'];
	    $empleado->salario = $jsonData['salario'];

	    $result = $empleado->save();

	    return array('status'=>'ok');
	}

	public static function listar(){
		return Empleado::all();
	}

	public function obtenerSalarioPromedio(){

	}

	public function incrementarSalarios(){

	}

	public function visualizarSalarioTodosEmpleados(){

	}

}
