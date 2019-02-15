<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy_board extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('buy_board_model');

        //$this->$action();
    }


    public function index(){

        $this->lists();
        //$this->write();
    }

    //수정


    //목록
    public function lists() {
        $this->load->model('buy_board_model');
        $data['html'] = new Html_lib("하이루에 오신것을 환영합니다.");
        $data['list'] =  $this->buy_board_model->lists();


        //tender 분류
        if(isset($_POST["search"])) {
            $result = $_POST["search"];
        } else {
            $result = "전체보기";
        }

        $data['result'] = $result;
        $data['tenderList'] =  $this->buy_board_model->Tenderlists($result);


        //POST 말고, 밸류값 각자 줘서 밸류값 대로 어디다 넣을지, 수정할지 등 구분해줘도 가능 할듯
        if (isset($_REQUEST['type'])) {

            $type = $_REQUEST['type'];

            if($type == 'insert' || $type == 'modiF') {
                $this->ann_insert();
            } else if ($type == 'del') {
                $this->delete();
            } else if ($type == 're') {

                $this->reoffers();
            } else if ($type == 'back') {

                $this->reoffer_back();
            }

        }


        $this->load->view('resteel/buy/board',$data);
    }


    public function ann_insert() {

        $this->load->model('buy_board_model');

        //idx (int), class(varchar45), count(int), price(int), inStartDate(date), inEndDate(date), subject(varchar45),
        //delivery(varchar45), delivery_D(var45), manager(var45), phone(int), nego(tinyint)

        $type = $_REQUEST['type'];




        if($type == 'insert') {
            $data['class'] = $_POST["class"];
            $data['count'] = $_POST["count"];
            $data['price'] = $_POST["price"];
            $data['startDate'] = $_POST["startDate"];
            $data['endDate'] = $_POST["endDate"];
            $data['subject'] = $_POST["subject"];
            $data['deli'] = $_POST["deli"];
            $data['manager'] = $_POST["manager"];
            $data['phone'] = $_POST["phone"];
            $data['nego'] = $_REQUEST['nego'];

            $this->buy_board_model->ann_insert($data);
        } else {

            $data['idx'] = $_POST["idx"];
            $data['class'] = $_POST["class"];
            $data['count'] = $_POST["count"];
            $data['price'] = $_POST["price"];
            $data['startDate_M'] = $_POST["startDate_M"];
            $data['endDate_M'] = $_POST["endDate_M"];
            $data['subject'] = $_POST["subject"];
            $data['deli'] = $_POST["deli"];
            $data['manager'] = $_POST["manager"];
            $data['phone'] = $_POST["phone"];
            $data['nego_M'] = $_REQUEST['nego_M'];

            $this->buy_board_model->update($data);

        }

       redirect('/buy_board');
    }

    public function delete() {

        $this->load->model('buy_board_model');

        $idx = $_REQUEST['idx'];
        $this->buy_board_model->drop($idx);

        redirect('/buy_board');
    }

    public function reoffers() {

        $this->load->model('buy_board_model');


        $data['idx'] = $_REQUEST['idx'];
        $data['price'] = $_POST["price"];
        $data['d_startDate'] = $_POST["d_startDate"];
        $data['d_endDate'] = $_POST["d_endDate"];
        $data['class'] = $_POST["class"];
        $data['messege'] = $_POST["messege"];

        $this->buy_board_model->reoffer($data);

        redirect('/buy_board');
    }

    public function reoffer_back() {

        $this->load->model('buy_board_model');


        $data['idx'] = $_REQUEST['idx'];
        $data['price'] = '';
        $data['d_startDate'] = '';
        $data['d_endDate'] = '';
        $data['class'] = '';
        $data['messege'] = '';

        $this->buy_board_model->reoffer_back($data);

        redirect('/buy_board');
    }

}
