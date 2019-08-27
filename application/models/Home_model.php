<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Home_model (Login Model)
 * Login model class to get to authenticate user credentials
 * @author : W3Industry
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home_model extends CI_Model
{

    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function addNewclient($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_w3_clients', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        } else {
            return $msg = "error";
        }
    }
}