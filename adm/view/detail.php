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
        .max-small {
            width: auto; height: auto;
            max-width: 300px;
            max-height: 300px;
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
        <h1 class="page-header"><i class="fa fa-users" aria-hidden="true"></i> 관리계정 상세보기 <small></small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row bg-silver-darker">
            <!-- begin col-12 -->
<!--            <div class="col-md-12 m-b-10 p-t-20 p-b-10 pull-right">-->
<!--                <form method="get" action="" id="frmSearch">-->
<!--                    <input type="hidden" name="stype" value="--><?php //echo $search_type; ?><!--">-->
<!--                    <div class="col-md-3 pull-right">-->
<!--                        <input type="text" class="col-md-3 form-control input-sm" id="searchInput" name="sword" value= "--><?php //echo $search_word; ?><!--">-->
<!--                    </div>-->
<!--                    <div class="col-md-2 pull-right text-right">-->
<!--                        <label class="m-t-4">Search <button type="submit" class="btn btn-primary btn-icon btn-circle" id="searchBtn"><i class="fa fa-search"></i></button></label>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
            <!-- end col-md-12 -->

            <!-- begin col-md-12 -->
            <div class="col-md-12"  >
                <table id="data-table" class="table table-bordered" style="width:50%; margin-left:25%">
                    <!-- // USERID (VARCHAR30) NAME(VARCHAR30) PASSWORD(VARCHAR 100) DEPARTMENT(VARCHAR) 
        // RANK(SMALLINT 5) EMAIL (VARCHAR255)  REG_DATE (DATETIME) ACCOUNT_TYPE (TINYINT 2) -->
                   
                    <tbody>
                        <tr>
                          <th scope="row">접근 권한 </th>
                         <td>

                            <?php if ($list->ACCOUNT_TYPE == 1) {
                            ?> <span class="label label-danger"
                            data-tooltip-text=" 모두 수정/삭제 가능" > 1 </span> <?php
                        } if  ($list->ACCOUNT_TYPE == 2) { ?> 
                            <span class="label label-warning"
                            data-tooltip-text=" 일부분 수정/삭제 가능" > 2 </span>  <?php } 

                        if ($list->ACCOUNT_TYPE == 3) { ?> 
                        <span class="label label-default" data-tooltip-text=" 조회만 가능"> 3 </span> <?php } ?></td>
                        </tr>

                        <tr>
                          <th scope="row">ID</th>
                          <td><?php echo $list->USERID ?></td>
                        </tr>

                        <tr>
                          <th scope="row">사용자명</th>
                          <td><?php echo $list->NAME ?></td>
                        </tr>

                        <tr>
                          <th scope="row">부서명</th>
                          <td><?php echo $list->DEPARTMENT ?></td>
                        </tr>

                        <tr>
                          <th scope="row">e-mail</th>
                          <td><?php echo $list->EMAIL ?></td>
                        </tr>

                        <tr>
                          <th scope="row">계정 정보 변경일자</th>
                          <td><?php echo $list->REG_DATE ?></td>
                        </tr>
                      
                     </tbody>

                </table>

                    <div class="row" style="margin:10px; padding-left:45%">
                        <button type="button" class="btn btn-primary" onclick="goUrl('/admin')" style="float: left; margin-right:5px;" >목록</button>

                        <form method="post"  action="/admin/write?ID=<?php echo $list->ID;?>" style="float: left; margin-right:5px;" >
                            <input type="hidden" name="user" value="f">
                            <input type="hidden" name="ID" value="<?php echo $list->ID; ?>">

                            <button type="submit" class="btn btn-success" >정보 수정</button>
                        </form>

                        <!-- 삭제시 안내 팝업 뜨게하기 -->
                       

                        <form method="post" action="/admin/delete" style="float: left">
                            <input type="hidden" name="ID" value="<?php echo $list->ID; ?>">
                            <button type="submit" class="btn btn-danger"> 삭제 </button>
                        </form>
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
