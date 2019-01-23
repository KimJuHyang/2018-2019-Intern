
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->db->initialize();
	}

	//hirooAdminMember

  public function view($data) {
		
		 try {
            // pPageSize int, pPageNum int
            $sql = 'CALL `usp_admin_member_info`(?);';
            $query = $this->db->query($sql,$data);

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

// 계정 등록

    public function insert($data){

        // USERID (VARCHAR30) NAME(VARCHAR30) PASSWORD(VARCHAR 100) DEPARTMENT(VARCHAR) 
        // RANK(SMALLINT 5) EMAIL (VARCHAR255)  ACCOUNT_TYPE (TINYINT 2)
        
        //실제 db에서 삽입할때는 REG_DATE (DATETIME)에 현재 날짜와 초 받아와서 넣어줘야함

        try {
            $sql = 'CALL `usp_admin_member_insert`(?, ?, ?, ?, ?, ?)';
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
    public function detail($data){

        // USERID (VARCHAR30) NAME(VARCHAR30) PASSWORD(VARCHAR 100) DEPARTMENT(VARCHAR) 
        // RANK(SMALLINT 5) EMAIL (VARCHAR255)  REG_DATE (DATETIME) ACCOUNT_TYPE (TINYINT 2)

        try {
            // pCommunityID int
            $sql = 'CALL `usp_admin_member_detail`(?)';
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

       // ID INT NAME(VARCHAR30)  DEPARTMENT(VARCHAR) 
        // EMAIL (VARCHAR255)   ACCOUNT_TYPE (TINYINT 2)

        //변경할때도 넣어주기 REG_DATE (DATETIME)
        try {
            $sql = 'CALL `usp_admim_member_update`( ?, ?, ?, ?, ?, ?)';
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
            $sql = 'CALL `usp_admin_member_delete`(?)';
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
