<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Addtask (Addtask controller)
 * User Class to control all user related operations.
 * @author : W3Industry
 * @version : 1.1
 * @since : 19 November 2019
 */
class Addtask extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('task_model');

        $this->isLoggedIn();
    }

    public function index()
    {
        $this->load->model('user_model');
        $total_row["user_list"] = $this->user_model->getUsers();

        $this->global['pageTitle'] = 'W3Industry : Add New Task';
        $this->global['user_list'] = $this->user_model->getUsers();;

        $this->loadViews("addtask", $this->global, NULL, NULL);
    }

    function addNewtasks()
    {
        if ($this->isLoggedIn() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('task_model');
            $this->global['pageTitle'] = 'W3Industry : Add New Task';
            $this->loadViews("addtask", $this->global, NULL);
        }
    }

    public function addNewTask()
    {
        if ($this->isLoggedIn() == TRUE) {
            $this->loadThis();
        } else {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('tt', 'Job Name', 'trim|required|max_length[128]');
            $this->form_validation->set_rules('tabout', 'Job Descriptions', 'trim|required|min_length[10]');
            $this->form_validation->set_rules('tprice', 'Job Price', 'trim|required|min_length[1]');
            $this->form_validation->set_rules('tdead', 'Job Deadline', 'trim|required|min_length[6]');

            if ($this->form_validation->run() == FALSE) {
                $this->addNewtasks();
            } else {

                $assign_ids = implode(', ', $this->input->post('taid'));

                date_default_timezone_set('Asia/Kolkata');

                $date = date("Y-m-d  H:i", time());

                $info['tt'] = ucwords(strtolower($this->security->xss_clean($this->input->post('tt'))));
                $info['taid'] = $assign_ids;
                $info['tcd'] = $date;
                $info['	tcid'] = $this->session->userdata('userId');
                $info['tabout'] = strtolower($this->security->xss_clean($this->input->post('tabout')));
                $info['tprice'] = strtolower($this->security->xss_clean($this->input->post('tprice')));
                $info['tdead'] = strtolower($this->security->xss_clean($this->input->post('tdead')));

                $flag = $this->task_model->addNewTask($info);
//                ...../
                if ($flag == "error") {
                    $this->session->set_flashdata('error_msg', 'Oops! Looks Like Something Went Wrong Please Try Again.');
                } elseif ($flag == "duplicate") {
                    $this->session->set_flashdata('error_msg', 'Oops! Looks Like Task Already Exists Please Try Again.');
                } else {
                    $this->session->set_flashdata('success', 'Successfully Added Task Details');
                    $this->load->library('upload');
                    $dataInfo = array();
                    $files = $_FILES;

                    $cpt = count($_FILES['userfile']['name']);
                    for ($i = 0; $i < $cpt; $i++) {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];

                        $this->upload->initialize($this->set_upload_options());

                        $this->upload->do_upload();
                        $dataInfo[] = $this->upload->data();

                    }
                    $format = array('.zip', '.doc', '.pdf');
                    // die;
                    foreach ($dataInfo as $in) {
                        if (in_array($in['file_ext'], $format)) {
                            $data = array(

                                'file' => $in['file_name'],
                                'tsk_id' => $flag,
                                'usr_id' => $this->session->userdata('userId'));
                            $img_res = $this->task_model->addTaskFile($data);
                            if ($img_res != true) {
                                $this->session->set_flashdata('error_msg_img', 'Oops! Looks Like Something Went Wronfg Please Try Again.');
                            } else {
                                $this->session->set_flashdata('success_img', 'All Files Were Added Successfully');
                            }
                        }
                    }
//                    redirect(site_url('edit_aircraft/index/'.$flag));


                }
                $this->load->library('user_agent');
                $refer = $this->agent->referrer();
                redirect($refer);


            }

        }

    }

    private function set_upload_options()
    {
        //upload an files options
        $config = array();
        $config['upload_path'] = './assets/upload/';
        $config['allowed_types'] = 'zip|doc|pdf|docx';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;

        return $config;
    }
}
