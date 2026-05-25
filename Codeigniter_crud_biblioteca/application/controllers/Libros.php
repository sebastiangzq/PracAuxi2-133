<?php 

defined('BASEPATH') or exit('No acceso al codigo');

class Libros extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Libros_model');
        $this->load->library('form_validation');
    }

    //READ
    public function index(){
        $data['libros'] = $this->Libros_model->get_all();
        $this->load->view('/libros/index',$data);
    }

    //CREATE - MOSTRAR FORMULARIO
    public function crear(){
        $this->load->view('libros/form');
    }

    //CREATE - GUARDAR EN LA BD
    public function guardar(){
        //validacion
        $this->form_validation->set_rules('titulo','Titulo','required');
        $this->form_validation->set_rules('autor','Autor','required');
        $this->form_validation->set_rules('isbn','Isbn','required|numeric');
        $this->form_validation->set_rules('estado_prestamo','Estado_prestamo','required');

        if($this->form_validation->run() == FALSE){
            $this->load->view('libros/form');
        }
        else{
            $data = [
                'titulo' => $this->input->post('titulo'),
                'autor' => $this->input->post('autor'),
                'isbn' => $this->input->post('isbn'),
                'estado_prestamo' => $this->input->post('estado_prestamo'),
            ];
            $this->Libros_model->crear($data);
            redirect('libros');
        }
    }
    //UPDATE - mostrar formulario
    public function editar($id){
        $data['libro'] = $this->Libros_model->get_by_id($id);
        $this->load->view('libros/form',$data);
    }
    //UPDATE - con la bd
    public function actualizar($id){
        $this->form_validation->set_rules('titulo','Titulo','required');
        $this->form_validation->set_rules('autor','Autor','required');
        $this->form_validation->set_rules('isbn','Isbn','required|numeric');
        $this->form_validation->set_rules('estado_prestamo','Estado_prestamo','required');

        if ($this->form_validation->run() == FALSE){
            $data['libro'] = $this->Libros_model->get_by_id($id);
            $this->load->view('libros/form',$data);
        }
        else{
            $data = [
                'titulo' => $this->input->post('titulo'),
                'autor' => $this->input->post('autor'),
                'isbn' => $this->input->post('isbn'),
                'estado_prestamo' => $this->input->post('estado_prestamo'),
            ];
            $this->Libros_model->actualizar($id, $data);
            redirect('libros');
        }
    }
    //ELIMINAR
    public function eliminar($id){
        $this->Libros_model->eliminar($id);
        redirect('libros');
    }
}
?>