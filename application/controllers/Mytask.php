<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Mytask (UserController)
 * User Class to control all user related operations.
 * @author : W3Industry
 * @version : 1.1
 * @since : 19 November 2019
 */
class Mytask extends BaseController
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
        $this->global['pageTitle'] = 'W3Industry : My Tasks';

//        $this->loadViews("alltask", $this->global, NULL , NULL);
        if($this->isclient() == FALSE && $this->isemployee() == FALSE )
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->task_model->mytaskListingCount($searchText);

            $returns = $this->paginationCompress ( "taskListing/", $count, 10 );

            $data['taskRecords'] = $this->task_model->mytaskListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'W3Industry : Task Listing';

            $this->loadViews("alltask", $this->global, $data, NULL);
        }



    }
    function taskListing()
    {
        if($this->isclient() == TRUE && $this->isemployee() == FALSE )
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->task_model->taskListingCount($searchText);

            $returns = $this->paginationCompress ( "taskListing/", $count, 10 );

            $data['taskRecords'] = $this->task_model->taskListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'W3Industry : Task Listing';

            $this->loadViews("alltask", $this->global, $data, NULL);
        }
    }
}