<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buy_board_model extends CI_Model {
    function __construct(){
        parent::__construct();
        //$this->db->initialize();
    }

    //이벤트 리스트

    // 전체를 보여줘야함
    public function lists() {

        try {
            // var
            $sql = 'CALL `usp_shop_resteel_ann_list` ();';
            $query = $this->db->query($sql);

            if ($query->num_rows() > 0)
                return $query->result();	// ID, TITLE, REG_DATE
            else
                return null;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return null;
        }


    }

    public function Tenderlists($data) {

        try {
            // var
            $sql = 'CALL `usp_shop_resteel_tender_list` (?);';
            $query = $this->db->query($sql, $data);

            if ($query->num_rows() > 0)
                return $query->result();	// ID, TITLE, REG_DATE
            else
                return null;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return null;
        }


    }

    // 공고 등록
    public function ann_insert($data){

//        $data['class'] = $_POST["class"];
//        $data['count'] = $_POST["count"];
//        $data['price'] = $_POST["price"];
//        $data['startDate'] = $_POST["startDate"];
//        $data['endDate'] = $_POST["endDate"];
//        $data['subject'] = $_POST["subject"];
//        $data['deli'] = $_POST["deli"];
//        $data['deli_D'] = $_POST["deli_D"];
//        $data['manager'] = $_POST["manager"];
//        $data['phone'] = $_POST["phone"];

        try {
            $sql = 'CALL `usp_shop_resteel_ann_insert` (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);';
            $query = $this->db->query($sql, $data);

            if($query)
                return true;
            else
                return false;
        }
        catch (Exception $e) {
            return false;
        }

    }

    public function update($data){

        //resteelAnnouncement

        try {
            $sql = 'CALL `usp_shop_resteel_ann_update`(?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $query = $this->db->query($sql, $data);

            if($query)
                return true;
            else
                return false;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }

    }


//    공고 상세보기
    public function view($data){

        //idx (int)
        try {
            // pCommunityID int
            $sql = 'CALL `usp_shop_resteel_ann_detail`(?)';
            $query = $this->db->query($sql, $data);

            if ($query->num_rows() > 0)
                return $query->row();
            else
                return null;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return null;
        }
    }


    // 입찰 리스트 상세보기
    public function  tender_detail($data){

        //idx (int)

        try {
            // pCommunityID int
            $sql = 'CALL `usp_shop_resteel_tender_detail`(?)';
            $query = $this->db->query($sql, $data);

            if ($query->num_rows() > 0)
                return $query->row();
            else
                return null;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return null;
        }
    }



    // 재오퍼
    public function reoffer($data){

        //idx(int), Ann_idx(int), tender_idx(int), reason(var45), price(int), contractDate(date), inStartDate(date), messege(var255)

        try {
            $sql = 'CALL `usp_shop_resteel_reoffer`(?, ?, ?, ?, ?, ?)';
            $query = $this->db->query($sql, $data);

            if($query)
                return true;
            else
                return false;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function reoffer_back($data){

        //idx(int), Ann_idx(int), tender_idx(int), reason(var45), price(int), contractDate(date), inStartDate(date), messege(var255)

        try {
            $sql = 'CALL `usp_shop_resteel_reoffer_back`(?, ?, ?, ?, ?, ?)';
            $query = $this->db->query($sql, $data);

            if($query)
                return true;
            else
                return false;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    // 공고 삭제
    public function drop($data){

        //resteelAnnouncement

        try {
            $sql = 'CALL `usp_shop_resteel_ann_delete`(?)';
            $query = $this->db->query($sql, $data);

            if($query)
                return true;
            else
                return false;
        }
        catch (Exception $e) {
            //echo $e->getMessage();
            return false;
        }

    }



}
