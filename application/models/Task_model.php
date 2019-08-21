<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Task_model (User Model)
 * User model class to get to handle user related data
 * @author : W3Industry
 * @version : 1.1
 * @since : 15 November 2016
 */
class Task_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userListingCount($searchText = '')
    {
//        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
//        $this->db->from('tbl_users as BaseTbl');
//        $this->db->join('tbl_roles as Role', 'Role.roleId = BaseTbl.roleId','left');
//        if(!empty($searchText)) {
//            $likeCriteria = "(BaseTbl.email  LIKE '%".$searchText."%'
//                            OR  BaseTbl.name  LIKE '%".$searchText."%'
//                            OR  BaseTbl.mobile  LIKE '%".$searchText."%')";
//            $this->db->where($likeCriteria);
//        }
//        $this->db->where('BaseTbl.isDeleted', 0);
//        $this->db->where('BaseTbl.roleId !=', 1);
//        $query = $this->db->get();
//
//        return $query->num_rows();
    }

    function addNewTask($tasknfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_w3_task', $tasknfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }
}