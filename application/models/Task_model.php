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
        $this->db->select('BaseTbl.tid, BaseTbl.tt, BaseTbl.taid, BaseTbl.tcid, BaseTbl.tdead, File.file');
        $this->db->from('tbl_w3_task as BaseTbl');
        $this->db->join('tbl_w3_tsk_file as File', 'File.tsk_id = BaseTbl.tid','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tid  LIKE '%".$searchText."%'
                            OR  BaseTbl.tt  LIKE '%".$searchText."%'
                            OR  BaseTbl.tcid  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
//        $this->db->where('BaseTbl.isDeleted', 0);
//        $this->db->where('BaseTbl.roleId !=', 1);
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function taskListing($searchText = '', $page, $segment)
    {

        $this->db->select('BaseTbl.tid, BaseTbl.tt, BaseTbl.taid, BaseTbl.tcid, BaseTbl.tcd, BaseTbl.tdead, BaseTbl.tprice, File.file, Usern.name');
        $this->db->from('tbl_w3_task as BaseTbl');
        $this->db->join('tbl_w3_tsk_file as File', 'File.tsk_id = BaseTbl.tid','left');
        $this->db->join('tbl_users as Usern', 'Usern.userId = BaseTbl.tcid','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tid  LIKE '%".$searchText."%'
                            OR  BaseTbl.tt  LIKE '%".$searchText."%'
                            OR  BaseTbl.tcid  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('BaseTbl.tid', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    function mytaskListingCount($searchText = '')
    {
//        $userId = $userInfo->userId;
        $userId = $this->session->userdata('userId');
        $this->db->select('BaseTbl.tid, BaseTbl.tt, BaseTbl.taid, BaseTbl.tcid, BaseTbl.tdead, File.file');
        $this->db->from('tbl_w3_task as BaseTbl');
        $this->db->join('tbl_w3_tsk_file as File', 'File.tsk_id = BaseTbl.tid','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tid  LIKE '%".$searchText."%'
                            OR  BaseTbl.tt  LIKE '%".$searchText."%'
                            OR  BaseTbl.tcid  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
//        $this->db->where('BaseTbl.tcid = ' . $userId , 0);
        $this->db->where('BaseTbl.tcid =', $userId);
        $query = $this->db->get();

        return $query->num_rows();
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function mytaskListing($searchText = '', $page, $segment)
    {
        $userId = $this->session->userdata('userId');
        $this->db->select('BaseTbl.tid, BaseTbl.tt, BaseTbl.taid, BaseTbl.tcid, BaseTbl.tcd, BaseTbl.tdead, BaseTbl.tprice, File.file, Usern.name');
        $this->db->from('tbl_w3_task as BaseTbl');
        $this->db->join('tbl_w3_tsk_file as File', 'File.tsk_id = BaseTbl.tid','left');
        $this->db->join('tbl_users as Usern', 'Usern.userId = BaseTbl.tcid','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.tid  LIKE '%".$searchText."%'
                            OR  BaseTbl.tt  LIKE '%".$searchText."%'
                            OR  BaseTbl.tcid  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.tcid =', $userId);
        $this->db->order_by('BaseTbl.tid', 'DESC');
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
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