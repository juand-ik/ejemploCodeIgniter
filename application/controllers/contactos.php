<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller
{
	public function index()
	{
		/*echo "xD";
		$data["nombre"] = "Juand";
		$data["nombre2"] = "Ro";*/
		$this->load->helper("url");
		$this->load->model("M_contactos");
		//$listado = $this->M_contactos->get_todos();
		$data["listado"] = $this->M_contactos->get_todos();
		/*if (empty($listado))
		{
			echo "sin contactos";
		}
		else {
			echo "conctos";
		}*/
		
		$this->load->view("view_list_contaco",$data);
	}
	public function agregar()
	{
		//echo "add";
		//uso de helpers
		$this->load->helper("form");
		$this->load->library("form_validation");
		$this->load->model("M_contactos");
		
		if ($this->input->post())
		{
			//$this->form_validation->set_rules("input_mail","Email","required|valid_email");
			$this->form_validation->set_rules("nombre","Nombre muestra Erro","required|min_length[3]");
			//$this->form_validation->set_rules("edad","Edad","required|integer");
			
			//$this->form_validation->set_rules("telefono","Telefono","trim")
			//$this->form_validation->set_rules("estatus","Status","trim")
			
			if($this->form_validation->run() == TRUE)
			{
				//echo "info ok";
				//print_r($this->input->post());
				//$this->M_contactos->add();
				$id_insertado = $this->M_contactos->add();
				echo "El id creado es : ".$id_insertado;
			}
			else
			{
				//echo "Error en validacion";
				$this->load->view("view_form_contactos");
			}
			
		}
		else
		{
			$this->load->view("view_form_contactos");
		}
	}
	public function modificar($id=NULL)
	{
		if($id == NULL OR !is_numeric($id))
		{
			echo "Falta id";
			return;
		}
		//echo "bien";
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library("form_validation");
		$this->load->model("M_contactos");
		
		
		if ($this->input->post())
		{
			$this->form_validation->set_rules("nombre","Nombre muestra Erro","required|min_length[3]");
			if ($this->form_validation->run() == TRUE)
			{
				$this->M_contactos->edit($id);
				redirect("contactos");
				
			}
			else
			{
				$this->load->view("view_form_contactos");
			}
		}
		else
		{
			$data["datos_contacto"] = $this->M_contactos->get_ById($id);
			
			if(empty($data["datos_contacto"]))
			{
				echo "El id no exite";
			}
			else
			{
				/*print_r($data["datos_contacto"]);
				echo "Pasar a la vista";*/
				$this->load->view("view_form_contactos",$data);
			}
		}
	}
	public function eliminar($id=NULL)
	{
		if($id == NULL OR !is_numeric($id))
		{
			echo "Falta id";
			return;
		}
		//echo "bien";
		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->model("M_contactos");
		
		if ($this->input->post())
		{
			$id_eliminar = $this->input->post("id");
			$this->M_contactos->elim($id_eliminar);
			redirect("contactos");
		}
		else
		{
			$data["datos_contacto"] = $this->M_contactos->get_ById($id);
			
			if(empty($data["datos_contacto"]))
			{
				echo "El id es invalido";
			}
			else
			{
				$this->load->view("view_eliminar_usuario",$data);
			}
		}
		
	}
}










