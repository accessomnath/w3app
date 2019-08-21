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
        $this->global['pageTitle'] = 'W3Industry : Add New Task';

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

            if ($this->form_validation->run() == FALSE) {
                $this->addNewtasks();
            } else {
                $taskTitle = ucwords(strtolower($this->security->xss_clean($this->input->post('tt'))));
                $taskAbout = strtolower($this->security->xss_clean($this->input->post('tabout')));

//                var_dump($taskTitle);
//                var_dump($taskAbout);


            }

        }

    }
}
