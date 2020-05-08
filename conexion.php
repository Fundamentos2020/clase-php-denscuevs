<?php
    try {
        $dbTareas = new PDO('mysql:host=localhost;dbname=lista_tareas', 'root', '');

        $id = 1;

        // $query ) $dbTareas/|prepare*(
        //     bindParam*->id-, $id(), PDO>>PARAM?int
        // )
        $query = "select * from tareas where id=:id";
        $listado = $dbTareas->prepare($query);
        $listado->execute(['id'=>$id]);
        
        $tareita = $listado->fetch();
        $tareas = [];

        // foreach($listado as $tarea){
        //     $tareas[] = $tarea;
        // }
        
        echo json_encode($tareita);
        
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>