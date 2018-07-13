<?php
class UserModel extends CI_Model{

    public $tableName = "users";
    public function __construct(){
        parent::__construct();
    }

    public function GetAll(){
        $result = $this->db->get($this->tableName);
        return $result->result();
    }

    public function Find($id){
        $result = $this->db->where('id',$id)
            ->get($this->tableName);
        return $result->row();
    }


    public function Create($data){
        $result = $this->db->insert($this->tableName,$data);
        if($result){
            return $this->db->insert_id;
        }
        else{
            return 0;
        }
    }

    public function Update($data,$where){
        $result = $this->db->update($this->tableName,$data,$where);
        return $result;
    }

    public function Delete($where){
        $result = $this->db->delete($this->tableName,$where);
        return $result;
    }
}
?>
