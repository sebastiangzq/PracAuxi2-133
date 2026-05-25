<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_status extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // Uso: /index.php/db_status/check?token=dev_fix_token_2026
    public function check(){
        if (ENVIRONMENT !== 'development'){
            show_error('Acción permitida solo en entorno development', 403);
        }
        $token = $this->input->get('token');
        $expected = 'dev_fix_token_2026';
        if ($token !== $expected){
            show_error('Token inválido', 403);
        }

        $this->output->set_content_type('text/plain');

        echo "-- Conteo de filas con id=0 --\n";
        $q = $this->db->query("SELECT COUNT(*) AS c FROM libros WHERE id = 0");
        $r = $q->row_array();
        echo "filas_con_id_0: " . ($r['c'] ?? 0) . "\n\n";

        echo "-- Ejemplo de filas con id=0 (hasta 10) --\n";
        $q = $this->db->query("SELECT * FROM libros WHERE id = 0 LIMIT 10");
        foreach ($q->result_array() as $row){
            echo json_encode($row) . "\n";
        }
        echo "\n";

        echo "-- MAX(id) actual --\n";
        $q = $this->db->query("SELECT MAX(id) AS m FROM libros");
        $r = $q->row_array();
        echo "max_id: " . ($r['m'] ?? 'NULL') . "\n\n";

        echo "-- SHOW CREATE TABLE libros --\n";
        $q = $this->db->query("SHOW CREATE TABLE libros");
        if ($q->num_rows()){
            $row = $q->row_array();
            // The result has keys: 'Table' and 'Create Table'
            $create = isset($row['Create Table']) ? $row['Create Table'] : array_values($row)[1];
            echo $create . "\n\n";
        }

        echo "-- SHOW TABLE STATUS LIKE 'libros' --\n";
        $q = $this->db->query("SHOW TABLE STATUS LIKE 'libros'");
        foreach ($q->result_array() as $row){
            echo json_encode($row) . "\n";
        }
    }
}
