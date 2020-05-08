<?php

class Tarea{
    public $_id;
    public $_titulo;
    public $_descripcion;
    public $_fechaLimite;
    public $_completada;
    public $_categoria_id;

    //Todos los constructores tendran el nombre por default de constructor
    public function __construct($id, $titulo, $descripcion, $fechaLimite, $completada, $categoria_id) {
        $this->_id = $id;
        $this->_titulo = $titulo;
        $this->_descripcion = $descripcion;
        $this->_fechaLimite = $fechaLimite;
        $this->_completada = $completada;
        $this->_categoria_id = $categoria_id;
    }
}

try {
    $dns = 'mysql:host=localhost;dbname=lista_tareas';
    $username = 'root';
    $password = '';
    
    $connection = new PDO($dns, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $completada = 'SI';
    $query = $connection->prepare('SELECT * FROM tareas WHERE completada = :completada');
    $query->bindParam(':completada', $completada, PDO::PARAM_STR);
    $query->execute();
    
    $tareas = array();
    
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $tarea = new Tarea($row['id'], $row['titulo'], $row['descripcion'], $row['fechaLimite'], $row['completada'], $row['categoria_id']);
        $tareas[] = $tarea;
    }

    $json = json_encode($tareas);
    var_dump($json);
}
catch(PDOExeption $e) {
    echo 'Error'. $e;
}

?>