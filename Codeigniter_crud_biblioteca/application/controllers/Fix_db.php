<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fix_db extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Uso: /index.php/fix_db/fix_libros?token=dev_fix_token_2026
    public function fix_libros(){
        if (ENVIRONMENT !== 'development'){
            show_error('Acción permitida solo en entorno development', 403);
        }

        $token = $this->input->get('token');
        $expected = 'dev_fix_token_2026';
        if ($token !== $expected){
            show_error('Token inválido', 403);
        }

        $this->output->set_content_type('text/plain');

        // Comprueba que la tabla exista
        $table_exists = $this->db->query("SHOW TABLES LIKE 'libros'")->num_rows() > 0;
        if (!$table_exists){
            echo "Tabla 'libros' no encontrada.\n";
            return;
        }

        echo "Iniciando reparación de la tabla 'libros'...\n";

        // Crear tabla nueva a partir de la estructura actual
        $ok = $this->db->query("CREATE TABLE IF NOT EXISTS libros_new LIKE libros");
        if (!$ok){ echo "Error creando libros_new\n"; return; }

        // Forzar AUTO_INCREMENT en la nueva tabla
        $ok = $this->db->query("ALTER TABLE libros_new MODIFY id INT NOT NULL AUTO_INCREMENT");
        if (!$ok){ echo "Error aplicando AUTO_INCREMENT en libros_new\n"; return; }

        // Vaciar libros_new por si acaso y copiar datos sin incluir id (para reasignar ids)
        $this->db->query("TRUNCATE TABLE libros_new");
        $ok = $this->db->query("INSERT INTO libros_new (titulo,autor,isbn,estado_prestamo) SELECT titulo,autor,isbn,estado_prestamo FROM libros");
        if (!$ok){ echo "Error copiando datos a libros_new\n"; return; }

        // Renombrar tablas: respaldo y nueva
        $ok = $this->db->query("RENAME TABLE libros TO libros_backup, libros_new TO libros");
        if (!$ok){ echo "Error renombrando tablas\n"; return; }

        echo "Reparación completada. Se creó 'libros' con AUTO_INCREMENT y los datos fueron copiados.\n";
        echo "Se conserva un respaldo en la tabla 'libros_backup'. Revísala antes de eliminarla.\n";
    }
}
