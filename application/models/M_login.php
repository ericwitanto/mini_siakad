<?php 
 
class M_login extends CI_Model{	
	public function get_user_role($username){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('roles','users.user_role_id = roles.role_id');
        $this->db->where('user_code = ' . $username);

        $query = $this->db->get()->row_array();
        return $query;
    }
}
?>