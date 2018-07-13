<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper('form');
    }

    public function index(){
        $users= $this->UserModel->GetAll();
        $data =[
            'title'=> 'All Users',
            'users'=> $users,
            'viewName' =>'user/index'
        ];
        $this->load->view('templates/master',$data);
    }

    public function create(){
        $data =[
            'viewName'=> 'user/create',
            'title'=>'Create New User',
        ];
        $this->load->view('templates/master',$data);
    }
    public function save(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10;
        $config['file_name']            = "avatar_".time();

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error',$error);
            redirect('user/create');
        }
        else
        {
            $data =  $this->upload->data();
            $image = $data['file_name'];
        }
        $data =[
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'dept' => $this->input->post('dept'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'image' => $image,
            'is_active' => $this->input->post('active') ?? 0
        ];
        $this->UserModel->Create($data);
        redirect('user/index');
    }

    public function edit($id){
        //$id= $this->uri->segemnt(3);
        $user = $this->UserModel->Find($id);
        if(!$user){
            redirect('user/index');
        }
        $data=[
            'user'=>$user,
            'title' => "Edit User",
            'viewName' => 'user/edit'
        ];
        $this->load->view('templates/master',$data);

    }

    public function update(){
        $id = $this->input->post('id');
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10;
        $config['file_name']            = "avatar_".time();

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('image'))
        {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error',$error);
            redirect('user/edit/'.$id);
        }
        else
        {
            $data =  $this->upload->data();
            $image = $data['file_name'];
        }
        $data =[
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'dept' => $this->input->post('dept'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'image' => $image,
            'is_active' => $this->input->post('active') ?? 0
        ];
        $this->UserModel->Update($data,['id'=>$id]);
        redirect('user/index');
    }

    public function delete(){

    }

}
