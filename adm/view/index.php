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
        .leftTable {
            width: 5%;
            text-align: center;
        }

        .textCenter {
            text-align: center;
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
        <h1 class="page-header"><i class="fa fa-users" aria-hidden="true"></i> 관리계정 <small></small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row bg-silver-darker">

            <div class="col-md-12" style="margin-top:10px; margin-bottom:10px;">

            
               <form method="post"  action="admin/write">
                        <input type="hidden" name="user" value="t">
                        <button type="submit" class="btn btn-success" >계정 등록하기</button>
                    </form>

                <div class="dropdown" >

                  <form action="/admin" method="post"  >

                      <select class="form-control" name = "search" style="width:200px; float:left; margin-left:40%;">
                          <option  <?php if($result == '부서명') { ?> selected = "selected" <?php } ?> > 부서명 </option>
                          <option <?php if($result == '운영팀') { ?> selected = "selected" <?php } ?> > 운영팀 </option>
                          <option <?php if($result == '홍보팀') { ?> selected = "selected" <?php } ?> > 홍보팀 </option>
                          <option  <?php if($result == '기획팀') { ?> selected = "selected" <?php } ?> > 기획팀 </option>
                          <option <?php if($result == '재무팀') { ?> selected = "selected" <?php } ?> > 재무팀 </option>
                      </select>


                      <button type="submit" class="btn btn-default" name='submit'>검색</button>
                  </form>
                </div>

            </div>

            <div class="col-md-12">
                <table id="data-table" class="table table-striped table-bordered" >
                    <thead >
                    <tr>
                        
                        <th class="leftTable">NO</th>
                        <th class="leftTable " style="width:7%"> 접근 권한 
                            <span class="badge badge-pill badge-info" 
                            data-tooltip-text=" 계정 별 권한 차이를 확인하세요"
                            > ? </span>
                        </th>
                        <th class="textCenter">ID</th>
                        <th class="textCenter">관리자명</th>
                        <th class="textCenter">부서</th>
                        <th class="textCenter">e-mail</th>
                        
                        <!-- 보여줄 것
                        1. 아이디
                        2. 이메일
                        3. 어느회원인가(이메일, 네이버, 구글, 카카오 이중 어떤게 연동되었는지 표현해주기 - 모두 다 연동 가능)
                        4. 국가알림
                        5. 사진
                        -->

                    </tr>
                    </thead>
                    <tbody>
                      <?php
                    
                        foreach ($list as $val) {
                      ?>
                    <tr>
                    
                        <td class="leftTable"><?php echo $val->ID ?></td>
                        <td>

                            <?php if ($val->ACCOUNT_TYPE == 1) {
                            ?> <span class="label label-danger" style="margin-left:35%;"
                            data-tooltip-text=" 모두 수정/삭제 가능" > 1 </span> <?php
                        } if  ($val->ACCOUNT_TYPE == 2) { ?> 
                            <span class="label label-warning" style="margin-left:35%;"
                            data-tooltip-text=" 일부분 수정/삭제 가능" > 2 </span>  <?php } 

                        if ($val->ACCOUNT_TYPE == 3) { ?> 
                        <span class="label label-default" style="margin-left:35%;" data-tooltip-text=" 조회만 가능"> 3 </span> <?php } ?></td>

                        <td><a href="/admin/detail?ID=<?php echo $val->ID;?>">
                            <?php echo $val->USERID ?></a></td>
                        <td><?php echo $val->NAME ?></td>
                        <td><?php echo $val->DEPARTMENT ?></td>
                        <td><?php echo $val->EMAIL ?></td>
                    
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- end col-12 -->

            <!-- begin col-md-12 -->
            <div class="col-md-12 p-t-10 p-b-10">
                <!-- begin col-md-3 -->
                <div class="col-md-3">
<!--                    <p class="pull-left m-t-5">회원수:&nbsp;--><?php //echo $questions_list_count; ?><!--명</p>-->
                </div>
                <!-- end col-md-3 -->
                <!-- begin col-md-6 -->
                <div class="col-md-6 text-center">
                    <div class="btn-group">
<!--                        --><?php
//                        if($questions_list_count > 0):
//                            //$page_basic_url = '?sword='.$search_word.'&stype='.$search_type;
//                            $page_basic_url = $url_parameter;
//                            //create_paging_tag($page_size, $current_page, 5 , $questions_list_count, $page_basic_url);
//                            create_paging_tag_basic($current_page, $questions_list_count, $page_basic_url);
//                        endif;
//                        ?>
<!--                        --><?php
//                        /*
//                                            <a type="button" class="btn btn-default m-r-3">Previous</a>
//                                            <a type="button" class="btn btn-white">1</a>
//                                            <a type="button" class="btn btn-white">2</a>
//                                            <atype="button" class="btn btn-white">3</a>
//                                            <a type="button" class="btn btn-white">4</a>
//                                            <a type="button" class="btn btn-white">5</a>
//                                            <a type="button" class="btn btn-default m-l-3">Next</a>
//                        */
//                        ?>
                    </div>
                </div>
                <!-- end col-md-6 -->
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
</body>
</html>
