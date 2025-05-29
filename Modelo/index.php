<?php 
class Modelo { 
    // Atributos de la clase 
    private $Modelo; 
    private $db; 
    private $datos; 
    
    // Constructor de la clase
    public function __construct() { 
        $this->Modelo = array(); 
        $this->db = new PDO('mysql:host=localhost; dbname=BDProductos', "root", "12345678"); 
    } 

    // Método para insertar datos en la base de datos
    public function insertar($tabla, $data) { 
        $consulta = "INSERT INTO " . $tabla . " VALUES (NULL, " . $data . ")"; 
        $resultado = $this->db->query($consulta); 
        
        if ($resultado) { 
            return true; 
        } else { 
            return false; 
        } 
    } 

    // Método para mostrar datos de la base de datos con una condición
    public function mostrar($tabla, $condicion) { 
        $consulta = "SELECT * FROM " . $tabla . " WHERE " . $condicion; 
        $res = $this->db->query($consulta); 
        
        $this->datos = array(); // Reiniciar el array de datos para evitar resultados anteriores
        
        while ($filas = $res->FETCHALL(PDO::FETCH_ASSOC)) { 
            $this->datos[] = $filas; 
        } 
        
        return $this->datos; 
    }

    // Método para actualizar datos en la base de datos
    public function actualizar($tabla, $data, $condicion) { 
        $consulta = "UPDATE " . $tabla . " SET " . $data . " WHERE " . $condicion; 
        $resultado = $this->db->query($consulta); 
        
        if ($resultado) { 
            return true; 
        } else { 
            return false; 
        } 
    } 

    // Método para eliminar datos de la base de datos
    public function eliminar($tabla, $condicion) { 
        $consulta = "DELETE FROM " . $tabla . " WHERE " . $condicion; 
        $res = $this->db->query($consulta); 
        
        if ($res) { 
            return true; 
        } else { 
            return false; 
        } 
    } 
} 
?>
