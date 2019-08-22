<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

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
    function taskListingCount($searchText = '')
    {
//        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile, BaseTbl.createdDtm, Role.role');
//        $this->db->from('tbl_w3_task as BaseTbl');
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



    public function addNewTask($data)
    {
//        $tid = 1;
//        if ($tid == "0") {
        $this->db->trans_start();
        $this->db->insert('tbl_w3_task', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        } else {
            return $msg = "error";
        }
//        } else {
//            return $msg = "duplicate";
//        }
    }

    public function addTaskFile($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_w3_tsk_file', $data);
        $afftectedRows = $this->db->affected_rows();
        if ($afftectedRows == 1) {
            $this->db->trans_complete();
            return true;

        } else {

            return false;
        }

    }


}