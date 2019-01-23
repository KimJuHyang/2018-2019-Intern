<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $menu_code = 'A001000';
	private $mode_type = 'l';

    private $id = 0;
    private $url_parameter = "";

	private $current_page = 1;
    private $search_type = "";
    private $search_word = "";
    private $search_admin_id = "";

	public function __construct()
	{
		parent::__construct();
		$this->admin_lib->check_permission();

		$this->load->library('form_validation');
		//$this->load->model('file_model');

        $mode_type = $this->input->get("mode");
        if(preg_match("/^(l|w|v|e)$/i", $mode_type)) //list, write, view, edit
            $this->mode_type = $mode_type;

		$id = (int)$this->input->get("id");
        if($id > 0)
            $this->id = $id;

        $current_page = (int)$this->input->get("page");
        if($current_page > 0)
            $this->current_page = $current_page;

        $search_type = $this->input->get("stype");
        if($search_type == "")
            $this->search_type = "title"; //나중에 타입 받을 수 있도록 수정해줘야함!!
        else
            $this->search_type = $search_type;

        $this->search_word = $this->input->get("sword");

        $this->url_parameter = '?sword='.$this->search_word.'&stype='.$this->search_type;
	}

	public function index()
	{
			$this->lists();
	}

	public function lists() {

			$this->load->model('admin_model');

			 if(isset($_POST["search"])) {
           		 $result = $_POST["search"];
        	} else {
            	$result = "부서명";
        	}

        $data['result'] = $result;
        $data['list'] = $this->admin_model->view($result);


		$data['html'] = new Html_lib();
		$this->load->view('admin/index', $data);
	}

     public function detail() {
        $this->load->model('admin_model');

        $id = $_GET['ID'];
        $list = $this->admin_model->detail(array($id));
        $data['list'] = $list;

        $data['html'] = new Html_lib();
        $this->load->view('admin/detail', $data);
    }

    public function write() {
// USERID (VARCHAR30) NAME(VARCHAR30) PASSWORD(VARCHAR 100) DEPARTMENT(VARCHAR) 
        // RANK(SMALLINT 5) EMAIL (VARCHAR255)  ACCOUNT_TYPE (TINYINT 2)
        
        $data['html'] = new Html_lib();
        $user = $_REQUEST['user'];

        if ($user == 't') {

            $data['user'] = $user;
            $data['USERID'] = '';
            $data['NAME'] = '';
            $data['PASSWORD'] = '';
            $data['DEPARTMENT'] = '----';
            $data['EMAIL'] = '';
            $data['ACCOUNT_TYPE'] = '3';


            $data['buttonName'] = '등록하기';
            $this -> load -> view('admin/write',$data);

        } else {

           
            $this->load->model('admin_model');

            $id = $_GET['ID'];
            $temp = $this->admin_model->detail($id);

            $data['ID'] = $id;
            $data['user'] = $user;
            $data['USERID'] = $temp->USERID;
            $data['NAME'] = $temp->NAME;
            $data['PASSWORD'] = $temp->PASSWORD;
            $data['DEPARTMENT'] = $temp->DEPARTMENT;
            $data['EMAIL'] = $temp->EMAIL;
            $data['ACCOUNT_TYPE'] = $temp->ACCOUNT_TYPE;


            $data['buttonName'] = '수정하기';
            $this -> load -> view('admin/write',$data);
        }

    }

    public function write_ok(){
        $this->load->model('admin_model');
        $user = $_REQUEST['user'];

        if ($user == 't') { //등록

            if($_POST) {

                $data['USERID'] = $_POST["USERID"];
                $data['NAME'] = $_POST["NAME"];
                $data['PASSWORD'] = $_POST["PASSWORD"];
                $data['DEPARTMENT'] = $_POST["DEPARTMENT"];
                $data['EMAIL'] = $_POST["EMAIL"];
                $data['ACCOUNT_TYPE'] = $_POST["ACCOUNT_TYPE"];

                $this->admin_model->insert($data);
            }
        } else {
                
                $data['ID'] = $_POST["ID"];
                $data['NAME'] = $_POST["NAME"];
                $data['PASSWORD'] = $_POST["PASSWORD"];
                $data['DEPARTMENT'] = $_POST["DEPARTMENT"];
                $data['EMAIL'] = $_POST["EMAIL"];
                $data['ACCOUNT_TYPE'] = $_POST["ACCOUNT_TYPE"];

                $this->admin_model->update($data);

        }

        $data['html'] = new Html_lib();
        $this->load->view('admin/write_ok', $data);
    }

    public function delete() {

        $this->load->model('admin_model');

        $data['html'] = new Html_lib();
        $this->admin_model->drop($_POST["ID"]);

        redirect('/admin');
    }
}
