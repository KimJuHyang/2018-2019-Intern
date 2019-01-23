<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('event_model');
    }


    public function index(){

        $this->lists();

    }

    //목록
    public function lists() {
        $this->load->model('event_model');
        $data['html'] = new Html_lib("하이루에 오신것을 환영합니다.");

        if(isset($_POST["search"])) {
            $result = $_POST["search"];
        } else {
            $result = "전체보기";
        }

        $data['result'] = $result;
        $data['list'] =  $this->event_model->lists($result);
        $this->load->view('board/event/index',$data);
    }

    // 보기
    public function detail() {
        $data['html'] = new Html_lib("하이루에 오신것을 환영합니다.");


        $id = $_GET['idx'];
        $list = $this->event_model->view(array($id));
        $data['list'] = $list;

        $this->load->view('board/event/detail', $data);
    }

    // 등록
    public function write()
    {
        $data['html'] = new Html_lib("하이루에 오신것을 환영합니다.");

        $user = $_REQUEST['user'];

        if ($user == 't') {

            $data['user'] = $user;
            $data['startDate'] = '';
            $data['endDate'] = '';
            $data['title'] = '';
            $data['content'] = '';
            $data['buttonName'] = '등록하기';
            $data['insert_img'] = '';

            $this -> load -> view('board/event/write',$data);

        } else {
            $this->load->model('event_model');
            $id = $_GET['idx'];
            $temp = $this->event_model->view($id);

                $data['user'] = $user;
                $data['startDate'] = $temp->startDate;
                $data['endDate'] = $temp->endDate;
                $data['title'] = $temp->title;
                $data['content'] = $temp->content;
                $data['insert_img'] = $temp->insert_img;


            $data['buttonName'] = '수정하기';
            $this -> load -> view('board/event/write',$data);
        }

    }


    // 등록 완료
    public function write_ok(){

        $this->load->model('event_model');

        $user = $_REQUEST['user'];


        $tmpfile =  $_FILES['insert_img']['tmp_name'];
        $o_name = $_FILES['insert_img']['name'];
        $filename = iconv("UTF-8", "EUC-KR",$_FILES['insert_img']['name']);

        $folder = "images/";
        $folder = $folder . basename($_FILES['insert_img']['name']);

        move_uploaded_file($_FILES['insert_img']['tmp_name'],$folder);

        if ($user == 't') {

            if($_POST) {
                $data['startDate'] = $_POST["startDate"];
                $data['endDate'] = $_POST["endDate"];
                $data['title'] = $_POST["title"];
                $data['content'] = $_POST["content"];
                $data["insert_img"] = $_FILES['insert_img']['name'];

                $this->event_model->insert($data);
            }
        } else {
            $data['idx'] = $_POST["idx"];
            $data['startDate'] = $_POST["startDate"];
            $data['endDate'] = $_POST["endDate"];
            $data['title'] = $_POST["title"];
            $data['content'] = $_POST["content"];
            $data["insert_img"] = $_FILES['insert_img']['name'];

            $this->event_model->update($data);

        }

        $data['html'] = new Html_lib("하이루에 오신것을 환영합니다.");
        $this->load->view('board/event/write_ok', $data);
    }



    public function delete() {

        $this->load->model('event_model');
        $data['html'] = new Html_lib("하이루에 오신것을 환영합니다.");
        $this->event_model->drop($_POST["idx"]);
        
        if(is_file($file))
        {

            if(unlink($file)) {
                echo "삭제성공";
            }

        }

        redirect('/event');
    }
}
