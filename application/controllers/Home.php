<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Home (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : W3Industry
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('home');
        }
        else
        {
            redirect('/dashboard');
        }
    }
    function subscriptions()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');


        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('home');
        }
        else {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('name'))));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));

            $userInfo = array('ClientEmail'=>$email, 'ClientName'=> $name, 'createdDtm'=>date('Y-m-d H:i:s'));

            $this->load->model('home_model');

            $result = $this->home_model->addNewclient($userInfo);

            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Your free subscription created successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Subscription creation failed');
            }
            redirect('/');
        }

    }


}

?>