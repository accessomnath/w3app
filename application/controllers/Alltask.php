<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Alltask (UserController)
 * User Class to control all user related operations.
 * @author : W3Industry
 * @version : 1.1
 * @since : 19 November 2019
 */
class Alltask extends BaseController
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
        $this->global['pageTitle'] = 'W3Industry : Tasks';

        $this->loadViews("alltask", $this->global, NULL , NULL);
    }
}