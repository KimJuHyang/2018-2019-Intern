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

    <!-- begin #content -->
    <div id="content" class="content" style="margin-left: 0px;">
        <?php /* $html->ContentHeader(); */?>

        <!-- begin page-header -->
        <h1 class="page-header"><i class="fa fa-users" aria-hidden="true"></i> 관리계정 <small></small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row bg-silver-darker">

            <div class="col-md-12">
                <?php $user = $_REQUEST['user'] ;

                ?>

                <div class="container-sub">
                    <div class="row text-center mg30">
                        <div class="col-xs-12 col-sm-12 col-md-12 row-center-line">
                            <p style="line-height:35px;font-size:16px;"><strong>계정 정보 <?php echo ($user=="f"?'수정':'등록'); ?>이 완료 되었습니다.  </strong></p>



                        </div>
                    </div>
                    <div class="row mt50">
                        <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-sm-offset-3">
                            <button type="button" class="btn btn-primary btn-block" onclick="goUrl('/admin')">확인</button>
                        </div>
                    </div>
                </div>


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
