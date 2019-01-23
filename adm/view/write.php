<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <?php $html->Header(); ?>
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->


<!-- begin #page-container -->
<div id="page-container" class="page-container fade page-header-fixed page-with-top-menu">
    <?php $html->HeaderNav(); ?>
    <?php $html->TopMenu(); ?>
    <style>
        .eng {
            color: red;
        }

        [data-tooltip-text]:hover {
    position: relative;
}

[data-tooltip-text]:after {
    -webkit-transition: bottom .3s ease-in-out, opacity .3s ease-in-out;
    -moz-transition: bottom .3s ease-in-out, opacity .3s ease-in-out;
    transition: bottom .3s ease-in-out, opacity .3s ease-in-out;

    background-color: rgba(0, 0, 0, 0.8);

  -webkit-box-shadow: 0px 0px 3px 1px rgba(50, 50, 50, 0.4);
    -moz-box-shadow: 0px 0px 3px 1px rgba(50, 50, 50, 0.4);
    box-shadow: 0px 0px 3px 1px rgba(50, 50, 50, 0.4);
    
  -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    
  color: #FFFFFF;
    font-size: 12px;
    margin-bottom: 10px;
    padding: 7px 12px;
    position: absolute;
    width: auto;
    min-width: 50px;
    max-width: 300px;
    word-wrap: break-word;

    z-index: 9999;

    opacity: 0;
    left: -9999px;
  top: 90%;
    
    content: attr(data-tooltip-text);
}

[data-tooltip-text]:hover:after {
    top: 130%;
    left: 0;
    opacity: 1;
}


    </style>
    <!-- begin #content -->

    <div id="content" class="content" style="margin-left: 0px;">
        <?php /* $html->ContentHeader(); */?>

        <!-- begin page-header -->
        <h1 class="page-header"><i class="fa fa-users" aria-hidden="true"></i> 계정
            <?php $user=="f"?'수정':'등록' ?></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row bg-silver-darker">

            <div class="col-md-12">

                <form action="/admin/write_ok" method="POST" enctype = "multipart/form-data">

                    <table id="data-table" class="table table-bordered" style="width:50%; margin-left:25%">
                    <!-- // USERID (VARCHAR30) NAME(VARCHAR30) PASSWORD(VARCHAR 100) DEPARTMENT(VARCHAR) 
        // RANK(SMALLINT 5) EMAIL (VARCHAR255)  REG_DATE (DATETIME) ACCOUNT_TYPE (TINYINT 2) -->
                   
                    <tbody>
                        <tr>
                          <th scope="row">접근 권한 <span class="badge badge-pill badge-info" 
                            data-tooltip-text=" [1] 모두 수정&삭제 / [2] 일부 수정&삭제 / [3] 조회만"
                            > ? </span></th>
                          
                          <td><!-- <?php echo $ACCOUNT_TYPE ?> -->

                            <div class="dropdown" >

                                  <select class="form-control" name = "ACCOUNT_TYPE" style="width:200px; float:left; margin-left:15px;">
                                    
                                      <option  <?php if($ACCOUNT_TYPE == '1') { ?> selected = "selected" <?php } ?> > 1 </option>
                                      <option  <?php if($ACCOUNT_TYPE == '2') { ?> selected = "selected" <?php } ?> > 2 </option>
                                      <option  <?php if($ACCOUNT_TYPE == '3') { ?> selected = "selected" <?php } ?> > 3 </option>
                                  </select>
                              
                            </div>

                            <p> </p>
                          </td>
                        </tr>

                        <tr>
                          <th scope="row">ID</th>
                          <td>
                            
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="USERID" name="USERID" style="width:200px;"
                                       maxlength="10" 
                                       placeholder="ID를 입력해주세요."
                                       value="<?php echo $USERID ?>" required
                                       aria-disabled = "true"
                                        <?php 
                                            if ($user == 'f') { ?> 
                                            disabled
                                        <?php } ?>
                                        >
                                <p class="form-control-static text-right" style="color:red;display:none"></p>


                            </div>
                            
                            <!-- <button type="button" class="btn btn-warning" style="width:100px; margin-left:15%;" <?php 
                                            if ($user == 'f') { ?> 
                                            disabled
                                        <?php } ?>>중복검사</button> -->
                         </td>
                        </tr>

                        <tr>
                          <th scope="row">비밀번호</th>
                          <td>
                                <div class="col-sm-2">
                                <input type="PASSWORD" class="form-control" id="PASSWORD" name="PASSWORD" style="width:250px;"
                                        placeholder="10자 이내의 비밀번호를 입력해주세요."
                                       maxlength="10"
                                       value="<?php echo $PASSWORD ?>" required >
                                <p class="form-control-static text-right" style="color:red;display:none"></p>
                            </div> 
                         </td>
                        </tr>

                        <tr>
                          <th scope="row">사용자명</th>
                          <td>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="NAME" name="NAME" style="width:200px;"
                                       maxlength="10"
                                       placeholder="사용자명을 입력하세요"
                                       value="<?php echo $NAME ?>" required >
                                <p class="form-control-static text-right" style="color:red;display:none"></p>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <th scope="row">부서명</th>
                          <td>
                               <select class="form-control" name = "DEPARTMENT" style="width:200px; float:left; margin-left:15px; ">
                                      <option  <?php if($DEPARTMENT == '----') { ?> selected = "selected" <?php } ?> > ---- </option>
                                      <option <?php if($DEPARTMENT == '운영팀') { ?> selected = "selected" <?php } ?> > 운영팀 </option>
                                      <option <?php if($DEPARTMENT == '홍보팀') { ?> selected = "selected" <?php } ?> > 홍보팀 </option>
                                      <option  <?php if($DEPARTMENT == '기획팀') { ?> selected = "selected" <?php } ?> > 기획팀 </option>
                                      <option <?php if($DEPARTMENT == '재무팀') { ?> selected = "selected" <?php } ?> > 재무팀 </option>
                                </select>
                          </td>
                        </tr>

                        <tr>
                          <th scope="row">e-mail</th>
                          <td><div class="col-sm-3">
                                <input type="text" class="form-control" id="EMAIL" name="EMAIL"
                                        placeholder="이메일을 입력해주세요."
                                       maxlength="50"
                                       value="<?php echo $EMAIL ?>" style="width:200px;"required >
                                <p class="form-control-static text-right" style="color:red;display:none"></p>
                            </div></td>
                        </tr>
                    
                     </tbody>

                </table>

                            <input type="hidden" name="user" value="<?php echo $user ?>">
                            <?php
                            if($user == "f") {
                                $ID = $_REQUEST['ID'];
                                ?>

                                <input type="hidden" name="ID" value="<?php echo $ID ?>">
                                
                            
                            <?php } ?>

                            <button type="submit" class="btn btn-primary"  id="submit_event" style="margin-left:45%; width:200px;">
                                <?php echo $buttonName ?>
                            </button>
                    </div>
               
            </div>
             </form>
            <!-- end col-12 -->
            <!-- begin col-md-12 -->
            <div class="col-md-12 p-t-10 p-b-10">
                <!-- begin col-md-3 -->
                <!-- end col-md-3 -->
                <!-- begin col-md-6 -->
                <div class="col-md-6 text-center">
                    <div class="btn-group">

            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end #content -->
</div>
<!-- end page container -->
<?php $html->jsDec(); ?>

<script>
    $(document).ready(function() {
        App.init();
    });


</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<script>
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년'
    });

    $(function() {
        $("#startDate, #endDate").datepicker();
    });


</script>

</body>
</html>
