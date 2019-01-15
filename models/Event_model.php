<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {
    function __construct(){
        parent::__construct();
        //$this->db->initialize();
    }

    //이벤트 리스트
    public function lists($data) {

        try {

            if ($data == "전체보기") {
                $sql = 'SELECT * FROM event_board ORDER BY endDate DESC';
            } else if ($data == "진행중") {
                $sql = 'SELECT * FROM event_board  WHERE endDate >= date(now()) and startDate < date(now()) ORDER BY endDate DESC';
            } else if ($data == "오늘 마감") {
                $sql = 'SELECT * FROM event_board  WHERE endDate = date(now()) ORDER BY endDate DESC';
            } else if ($data == "오픈 예정") {
                $sql = 'SELECT * FROM event_board  WHERE startDate > date(now()) ORDER BY endDate DESC';
            } else {
                $sql = 'SELECT * FROM event_board  WHERE endDate < date(now()) ORDER BY endDate DESC';
            }
            // pMemberID int, pMemberName varchar(50), pCategory smallint, pTitle varchar(100), pContents varchar(1000)
            //$sql = 'SELECT * FROM event_board WHERE ".$p_result." ORDER BY endDate DESC';
            $query = $this->db->query($sql);
            return $query->result();

        }
        catch (Exception $e) {
            echo $e->getMessage();
            return 0;
        }


    }

    // 이벤트 등록

    public function insert($data){

        //idx (int) , startDate (Date), endDate (Date), title (varchar 45), content (varchar 1000), insert_img (varchar 45)
        try {
            $sql = 'CALL `usp_shop_event_insert`(?, ?, ?, ?, ?)';
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

    // 이벤트 상세보기
    public function view($data){

        //idx (int)
        try {
            // pCommunityID int
            $sql = 'CALL `usp_shop_event_detail`(?)';
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


    // 프리마켓 상태 변경

    public function update($data){

        //idx (int) , startDate (Date), endDate (Date), title (varchar 45), content (varchar 1000), insert_img (varchar 45)
        try {
            $sql = 'CALL `usp_shop_event_update`( ?, ?, ?, ?, ?, ?)';
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

    // 이벤트 삭제
    public function drop($data){

        try {
            $sql = 'CALL `usp_shop_event_delete`(?)';
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