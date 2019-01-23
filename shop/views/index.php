<?PHP $html->Doctype(); ?>
<!-- Add CSS start -->
<link href="<?php echo $this->config->item('css_path');?>/weblayout.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--<script src="js/bootstrap.min.js"></script>-->

<!-- Add CSS end -->
<?PHP $html->Head(); ?>
<!--contents start -->
<?PHP $html->Blue_subnav3('이벤트','/','0','/cart','#AAA8A9'); // (로고경로,로고클릭시이동경로,장바구니숫자,장바구니클릭시이동,밑라인색상) ?>

<style>


    .scrollbar {
        margin-left: 30px;
        float: left;
        height: 300px;
        width: 65px;
        background: #fff;
        overflow-y: scroll;
        margin-bottom: 25px;
    }
    .force-overflow {

    }

    .scrollbar-primary::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5; }

    .scrollbar-primary::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
        background-color: #4285F4; }

    .web-List-container {
        float: left;
    }

    .top {
        height:30px;

    }

    .list_bottom, .caption {
        text-align: center;
    }


    .thumbnail:hover{
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
        text-decoration: none;
    }

    .col-sm-6 :hover {
        text-decoration: none;
    }

    #container {
        display: grid !important;
        grid-template-columns: 1fr 1fr 1fr !important;
    }

    #box-center {

        text-align: center !important;
    }
    #box-right {

        text-align: right !important;
    }



</style>


<div class="container-submain" style="padding-top: 80px; ">

                    <div class="top">

                        <label for="content" class="col-sm-1 control-label" style="margin-right: 10px; padding-top: 7px; margin-left: 10px; color:#0a6ecd">구분</label>

                        <div class="dropdown">

                            <form action="/event" method="post">
                                <select name = "search">
                                    <option  <?php if($result == '전체 보기') { ?> selected = "selected" <?php } ?> > 전체보기 </option>
                                    <option <?php if($result == '오픈 예정') { ?> selected = "selected" <?php } ?> > 오픈 예정 </option>
                                    <option <?php if($result == '진행중') { ?> selected = "selected" <?php } ?> > 진행중 </option>
                                    <option  <?php if($result == '오늘 마감') { ?> selected = "selected" <?php } ?> > 오늘 마감 </option>
                                    <option <?php if($result == '마감') { ?> selected = "selected" <?php } ?> > 마감 </option>

                                </select>
                                <input type='submit' name='submit' value="검색"/>
                            </form>
                        </div>
                    </div>

        <!-- card start -->
        <div class="web-List-container" style=" margin-top: 0px; width:100%; ">

            <div class="scrollbar scrollbar-primary" style="height:560px; width:100%; margin-left:0px;">

                <div class="force-overflow" style=" width:98%;" >
                    <div class="row" ;>
                        <?php
                             foreach ($list as $val) {
                        ?>
                                <div class="col-sm-6 col-md-4"">
                                    <div class="thumbnail">
                                        <a href="/event/detail?idx=<?php echo $val->idx;?>">
                                            <img src="<?php echo $this->config->item('image_path');?>/<?php echo $val->insert_img ?>" id="onbtn1" style="height:200px; width:300px;" />

                                            <!-- 날짜에 따라서 라벨 바꾸기 -->
                                            <div class="caption" ">
                                                    <?php

                                                    $target = $val->endDate;
                                                    $s_target = $val->startDate;

                                                    $today = date("Ymd");

                                                    $str_now = strtotime($today);
                                                    $str_target = strtotime($target);
                                                    $start_target = strtotime($s_target);


                                                    if($str_now < $start_target) {
                                                        ?> <span class="label label-warning"> 오픈 예정 </span> <?php
                                                    } else if ($str_now == $str_target) {
                                                        ?> <span class="label label-danger"> 오늘 마감 </span> <?php
                                                    }  else if ($str_now > $str_target) {
                                                        ?> <span class="label label-default"> 마감 </span> <?php
                                                    } else {
                                                        ?> <span class="label label-success"> 진행중 </span>
                                                        <?php
                                                    }
                                                    ?>

                                                    <h4><strong><?php echo $val->title; ?> </strong></h4>
                                                    <p> <?php echo $val->startDate ?> ~ <?php echo $val->endDate?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                </div>
             </div>
        </div>
        <!-- card end -->

    <div id='web-List-container" style="padding-top: 10px;">
        <div id='box-left'> </div>
        <div id='box-center'> </div>
        <div id='box-right'>
            <form method="post"  action="event/write">
                <input type="hidden" name="user" value="t">
                <button type="submit" class="btn btn-primary" >등록하기</button>
            </form>
        </div>
    </div>

<!--contents end -->
<?PHP $html->leftSildeMenu(); ?>
<?PHP $html->Footer(); ?>
<?PHP $html->jsDec(); //기본js  ?>
<!-- Add js start -->
<script>
    $(document).ready(function(){

        $('.up_ani').hover(
            // trigger when mouse hover
            function(){
                $(this).animate({
                    marginTop: "-=1%",
                },200);
            },

            // trigger when mouse out
            function(){
                $(this).animate({
                    marginTop: "0%"
                },200);
            }
        );
    });
</script>

<!-- Add js end -->
<?PHP $html->htmlEnd();  ?>
