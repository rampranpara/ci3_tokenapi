<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercreate extends CI_Controller {

	public function register()
	{   
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('email','Email', 'required|trim|valid_email|is_unique[users.email]')
            ->set_rules('first_name','First name', 'required|trim|min_length[2]|max_length[50]')
            ->set_rules('last_name','Last name', 'required|trim|min_length[2]|max_length[50]')
            ->set_rules('password','Password', 'required|trim|min_length[4]|max_length[50]')
			->set_rules('passconf','Password Confirm', 'required|matches[password]')
			->set_rules('mobile','Mobile', 'required|trim|min_length[4]|max_length[50]');
            
            if ($this->form_validation->run())
            {
                    $Data = [
                        'email'         => $this->input->post('email'),
                        'first_name'    => $this->input->post('first_name'),
                        'last_name'     => $this->input->post('last_name'),
						'password'      => md5(sha1($this->input->post('password'))),
						'mobile'        => $this->input->post('mobile')
                    ];
                    $insert = $this->db->insert('users', $Data);
                    if($insert){
                        $Data=array('status_code'=>200,
                        'message'=>'Data insertion  success');
                        header('Content-Type: application/json');
                        echo json_encode($Data);
                    } else {
                        $Data=array('status_code'=>404,
                        'message'=>'Data is not inserted successfully');
                        header('Content-Type: application/json');
                        echo json_encode($Data);
                    }
                    
            } else {
                $Data=array('status_code'=>404,
                'message'=>'Data is not valid');
                header('Content-Type: application/json');
                echo json_encode($Data);
            }

    }

    
    public function userupdate()
	{   
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation
            ->set_rules('email','Email', 'required|trim|valid_email|is_unique[users.email]')
            ->set_rules('first_name','First name', 'required|trim|min_length[2]|max_length[50]')
            ->set_rules('last_name','Last name', 'required|trim|min_length[2]|max_length[50]')
            ->set_rules('password','Password', 'required|trim|min_length[4]|max_length[50]')
			->set_rules('passconf','Password Confirm', 'required|matches[password]')
			->set_rules('mobile','Mobile', 'required|trim|min_length[4]|max_length[50]');
            
            if ($this->form_validation->run())
            {   
                    $id = $this->input->post('id');
                    $updateData = [
                        'email'         => $this->input->post('email'),
                        'first_name'    => $this->input->post('first_name'),
                        'last_name'     => $this->input->post('last_name'),
						'password'      => md5(sha1($this->input->post('password'))),
						'mobile'        => $this->input->post('mobile')
                    ];
               
                    $this->db->set($updateData);
                    $this->db->where('id', $id);
                    $this->db->update('users');

                    if($this->db->affected_rows() > 0){
                        $Data=array('status_code'=>200,
                        'message'=>'User updated successfully');
                        header('Content-Type: application/json');
                        echo json_encode($Data);
                    } else {
                        $Data=array('status_code'=>404,
                        'message'=>'User is not updated successfully');
                        header('Content-Type: application/json');
                        echo json_encode($Data);
                    }
                   
            } else {
                $Data=array('status_code'=>404,
                'message'=>'Data is not valid');
                header('Content-Type: application/json');
                echo json_encode($Data);
            }

    }

    public function userdelete()
	{   
        $id = $this->input->post('id');
       
        $query = $this->db->where('id', $id)->get('users');
      
        if($query->num_rows() > 0){
            
            $query = $this->db->where('id', $id)->delete('users');
        
            $Data=array('status_code'=>200,
            'message'=>'User deleted from record');
            header('Content-Type: application/json');
            echo json_encode($Data);
        } else {
            $Data=array('status_code'=>404,
            'message'=>'user is not exist');
            header('Content-Type: application/json');
            echo json_encode($Data);
        }
        
    }

}
