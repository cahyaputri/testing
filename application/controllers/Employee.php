<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("employee_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["dtemp"] = $this->employee_model->getAll();
        $this->load->view("pages/page/list", $data);
    }

    public function add()
    {
        $data = $this->employee_model;
        $validation = $this->form_validation;
        $validation->set_rules($data->rules());

        if ($validation->run()) {
			$data->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pages/page/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('employee');

        $dtemp = $this->employee_model;
        $validation = $this->form_validation;
        $validation->set_rules($dtemp->rules());

        if ($validation->run()) {
			$dtemp->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["dtemp"] = $dtemp->getById($id);
        if (!$data["dtemp"]) show_404();
        
        $this->load->view("pages/page/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->employee_model->delete($id)) {
            redirect(site_url('employee'));
        }
    }
}
