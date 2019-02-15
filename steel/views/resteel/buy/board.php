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
<?PHP $html->Blue_subnav3('구매공고','/','0','/cart','#AAA8A9'); // (로고경로,로고클릭시이동경로,장바구니숫자,장바구니클릭시이동,밑라인색상) ?>

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


    .thumbnail:hover{
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
        text-decoration: none;
    }

    .col-sm-6 :hover {
        text-decoration: none;
    }

    .pop-layer .pop-container {
        padding: 20px 25px;
    }

    .pop-layer p.ctxt {
        color: #666;
        line-height: 25px;
    }

    .pop-layer .btn-r {
        width: 100%;
        margin: 10px 0 20px;
        padding-top: 10px;

        border-top: 1px solid #DDD;
        text-align: right;

    }

    .pop-layer {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 900px;
        height: auto;
        border-radius: 10px;
        background-color: #fff;

        z-index: 10;
    }

    .dim-layer {
        display: none;
        position: fixed;
        _position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 100;
    }

    .dim-layer .dimBg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        opacity: .5;
        filter: alpha(opacity=50);
    }

    .dim-layer .pop-layer {
        display: block;
    }

    a.btn-layerClose {
        display: inline-block;
        height: 25px;
        padding: 0 14px 0;
        border: 1px solid #304a8a;
        background-color: #3f5a9d;
        font-size: 13px;
        color: #fff;
        line-height: 25px;
    }

    a.btn-layerClose:hover {
        border: 1px solid #091940;
        background-color: #1f326a;
        color: #fff;
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


<div class="container-submain" style="padding-top: 80px; ">



    <!-- card start -->
    <div class="web-List-container" style=" margin-top: 0px; width:100%; ">
<!--    여기서부터 스크롤 필요함. -->
        <nav class="navbar navbar-default">


            <div class="row">
                <div class="col-xs-12 col-md-8"><h4 style="float: left; margin-left:10px; padding-left: 10px; padding-top: 15px;"> 구매 공고 현황</h4></div>

                <div class="col-xs-6 col-md-4"><a href="#add" class="btn btn-info " style="float: right; margin-top: 15px; margin-right:10px;" role="button" id="addstill">구매 공고 내기</a></div>


                <!--                구매공고 팝업-->
                <div class="dim-layer" id="dim-layer">
                    <div class="dimBg" ></div>
                    <div id="add" class="pop-layer">
                        <div class="pop-container">


<!--                           팝업 전체  폼 시작-->
                            <form method="POST" action="/buy_board">
                                            <div class="pop-conts">
                                                <!--content //-->

                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <h4 style="float: left; margin-top:10px;">구매 공고 작성</h4>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <strong style="padding-top:10px; float:left"> 공고 마감일 </strong>
                                                        <div class="col-sm-9" style="width:160px; float: LEFT; ">
                                                            <input type="text" class="form-control" id="endDate" name="endDate" placeholder="YYYY-MM-DD"
                                                                   maxlength="200" style="margin-bottom:10px;" required>
                                                            <p class="form-control-static text-right" style="color:red;display:none"></p>
                                                        </div>
                                                    </div>

                                                </div>

<!--                                                1번째줄 -->
                                                <div class="row" style="margin-top:20px;">
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px;">분류 선택</strong>

                                                        <select name = "class" class="form-control" style="width:200px; float:left; margin-left:25px;" >
                                                            <option > 생철  </option>
                                                            <option > 중량철 </option>
                                                            <option > 경량철 </option>
                                                            <option > 가공철 </option>
                                                        </select>

                                                    </div>

<!--                                                    <div class="row">-->
<!--                                                        <div class="col-md-6">.col-md-6</div>-->
<!--                                                        <div class="col-md-6">.col-md-6</div>-->
<!--                                                    </div>-->

                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px;">품목 선택</strong>

                                                        <select name = "subject" class="form-control" style="width:200px; float:left; margin-left:25px;" >
                                                            <option > 생철A </option>
                                                        <option > 생철B </option>
                                                        <option > 중량철A </option>
                                                        <option > 중량철B </option>
                                                        <option > 기타 </option>
                                                        
                                                        
                                                        </select>
                                                    </div>
                                                </div>

<!--                                                2번째 줄 -->

                                                <div class="row" style="margin-top:30px;">
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px; margin-right:30px;">필요 물량</strong>
                                                        <input type="text" class="form-control" id="count" name="count" placeholder="희망 구매 수량을 입력하세요." style="width: 280px; float:left" REQUIRED>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px; margin-right:20px; "> 입고 날짜 </strong>
                                                        <div class="col-sm-9" style="width:150px; float: left; margin-bottom:10px;">
                                                            <input type="text" class="form-control" id="startDate" name="startDate" placeholder="YYYY-MM-DD"
                                                                   maxlength="200" required>
                                                            <p class="form-control-static text-right" style="color:red;display:none"></p>
                                                        </div>
                                                    </div>
                                                </div>


<!--                                                3번째 줄 -->

                                                <div class="row" style="margin-top:30px;">
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px; margin-right:30px;">구매 단가</strong>
                                                        <input type="text" class="form-control" id="price" name="price" placeholder="희망 구매 단가를 입력하세요.    (원 / kg) " style="width: 320px; float:left" REQUIRED>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a href="http://www.lmekorea.com/?" target="_blank"> <button type="button" class="btn btn-warning" style="float: left; margin-left: 20px;"  >시세보기</button> </a>
                                                    </div>
                                                </div>



<!--                                                 4번째 줄-->
                                                <div class="row" style="margin-top:30px;">
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px; margin-right:20px;">배송 요청지</strong>
                                                          <input type="text" id="sample5_address" name="deli" placeholder="주소" required class="form-control"  readonly style="width:200px; float:left">
                                                           <input type="button" onclick="sample5_execDaumPostcode()" value="주소 검색" class="btn btn-info" style="margin-left: 20px;"><br>

                                                    </div>
                                                    <div class="col-md-6">

                                                         <div id="map" style="width:400px;height:200px;display:none"></div>

                                                    </div>

                                                </div>
                                                
<!--                                                5번째 줄-->

                                                <div class="row" style="margin-top:30px;">
                                                    <div class="col-md-8">
                                                        <strong style="float: left; padding-top:10px; margin-right:30px;">거래 담당자</strong>
                                                        <input type="text" class="form-control" id="manager" name="manager" placeholder="이름" style="width: 150px; float:left; margin-right:30px;" REQUIRED>
                                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="연락처 (000-0000-0000)" style="width: 250px; float:left REQUIREDREQUIRED" REQUIRED>
                                                        
                                                    </div>


                                                    <div class="col-md-4">

                                                    </div>
                                                </div>

<!--                                                6번째 줄-->
                                                <div class="row" style="margin-top:40px;">
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px; margin-right:50px;">가격 협의가능
                                                            <span class="badge badge-info"
                                                                  data-tooltip-text="가격, 입고일자, 계약일자 등 셀러가 재오퍼 신청 가능"
                                                            > ? </span>
                                                        </strong>


                                                        <input type="radio" value = "yes"  class="form-control" name="nego" id="yes" required checked="checked"><label for="yes" style="margin-right:30px;"> 가능 </label>
                                                        <input type="radio" value = "no"  class="form-control" name= "nego" id="no" required ><label for="no"> 불가능 </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                </div>


<!--                                                동의 합니다 -->
                                                <div class="row" style="margin-top:70px;">
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-6" style="text-align: right">
                                                        <span style="color:red; font-size: 20px"> * </span>
                                                        <input type="checkbox" value = "yes"  class="form-control"id="agree" style="float:right" REQUIRED> <label for="agree"> 동의합니다. </label>
                                                    </div>
                                                </div>


                                             </form>






                                                    <div class="btn-r" style="text-align: right;  padding-bottom: 10px;">

                                                        <!--                                                    <a href="#" class="btn-layerClose">취소하기</a>-->

                                                            <input type="hidden" name="type" value="insert">
                                                            <button type="submit" class="btn btn-success" style="float: right; " id="add" name="add"> 등록하기 </button>


                                                        <button type="button" class="btn btn-danger" style="float: right; margin-right:10px;" id="cancle"> 취소하기 </button>

                                                    </div>



                <!--                                닫기 및 등록 버튼-->

                                                <!--// content-->
                                </div>



                        </div>
                    </div>
                </div>
                <!-- 팝업 끝-->

                <div class="row" style=" margin-left:10px; padding-top:10px; ">

<!--                   개별 카드 시작 -->
                    <?php
                    if(isset($list)) {
                        foreach ($list as $val) {
                    ?>

<!--                        알아낸 사실 : 팝업링크에서 특수문자가 들어가면 오류가난다..-->
                            <a href="#<?php echo $val->idx ?>"  role="button" id="annClick<?php echo $val->idx ?>" >

                                <div class="col-md-6" style="float: left;">
                                    <div class="thumbnail" style="height:160px; width:420px; float: left;">

                                        <div class="caption">

                                            <div style="float:left; width:100%; margin-top:0px;">

                                                <h4 style="float: left; padding-left:10px;"><?php echo $val->class ?> 구매 공고 </h4>
                                                    <?php

                                                    $target = $val->inEndDate;
                                                    $s_target = $val->inStartDate;

                                                    $today = date("Ymd");

                                                    $str_now = strtotime($today);
                                                    $str_target = strtotime($target);
                                                    $start_target = strtotime($s_target);


                                                    $dday = intval(($str_target - $str_now) / 86400);

                                                    if($str_now < $start_target) {
                                                        ?> <span class="label label-warning"  style="float:right; height:25px; margin-top:5px; padding-top:6px;">
                                                            예정 </span> <?php
                                                    } else if ($str_now == $str_target) {
                                                        ?> <span class="label label-danger"  style="float:right; height:25px; margin-top:5px; padding-top:6px;">
                                                            D-DAY </span> <?php
                                                    }  else if ($str_now > $str_target) {
                                                        ?> <span class="label label-default"  style="float:right; height:25px; margin-top:5px; padding-top:6px;">
                                                            마감  </span> <?php
                                                    } else {
                                                        ?> <span class="label label-warning"  style="float:right; height:25px; margin-top:5px; padding-top:6px;">
                                                            D - <?php echo $dday  ?></span>
                                                        <?php
                                                    }
                                                    ?>

                                                <div>

                                                    <div style="float:left; width:100%; border-top: solid 1px #DDDDDD; text-align: left; padding-left:10px; padding-top:10px; ">
                                                        <p> 구매 물량 : <strong><?php echo $val->count ?>t</strong></p>
                                                        <p> 희망 구매가 : <?php echo $val->price ?> 원 / kg</p>
                                                        <p> 입고기간 : <?php echo $val->inStartDate ?>  ~ <?php echo $val->inEndDate ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </a>
<!--                    카드 끝 -->

<!--                        개별 디테일 팝업-->
                        <div class="dim-layer" id="dim-layer3<?php echo $val->idx ?>">
                            <div class="dimBg" ></div>
                            <div id="<?php echo $val->idx ?>" class="pop-layer">
                                <div class="pop-container">

                                    <!--                           팝업 전체  폼 시작-->
                                    <form action="/buy_board" method="post">
                                        <div class="pop-conts">
                                            <!--content //-->


                                            <div class="row" >
                                                <div class="col-xs-12 col-md-8">

                                                    <h4 style="float: left; margin-top:10px;"> <?php echo $val->class ?> 구매 공고 정보</h4>
                                                </div>

                                            </div>

                                            <!--                                                1번째줄 -->



                                            <div class="row" style="margin-top:20px;">



                                                <div class="col-xs-6" style="padding-left:50px;">

                                                    <img src="<?php echo $this->config->item('image_path');?>/logo.png" alt="..." class="img-rounded" style="border: solid 1px grey"><br>





                                                    &nbsp;<p style="padding-left:60px;"><strong>(주) 위크앤데이</strong></p>
                                                </div>

                                                <div class="col-xs-6">
                                                    <div class="row">
<!--                                                        level 2-->
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                <h4><span class="label label-info">담당자</span></h4><br>
                                                                <h4><span class="label label-info">연락처</span></h4><br>
                                                                <h4><span class="label label-info">주소</span></h4><br>

                                                            </div>
                                                            <div class="col-xs-7">
                                                                <h4><?php echo $val->manager ?></h4><br>
                                                                <h4><?php echo $val->phone ?></h4><br>
                                                                <h4><?php echo $val->deli ?></h4>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                            <!--                                                2번째 줄 -->

                                            <div class="row" style="margin-top:20px; border-top: 1px solid #DDD; text-align: center;">

                                                <div class="col-xs-6">

                                                    <div class="panel panel-info" style="margin-top:20px;">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">구매 물량</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--                                                            여기에 디데이 라벨 삽입-->
                                                            <h4> <?php echo $val->count ?> T</h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-6">

                                                    <div class="panel panel-info" style="margin-top:20px;">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">희망 구매가</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <h4> <?php echo $val->count ?> 원/kg</h4>
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>

<!--                                            세번째 줄 -->

                                            <div class="row" style=" text-align: center;">

                                                <div class="col-xs-4">

                                                    <div class="panel panel-success" style="margin-top:20px;">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">품목</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <h4> <?php echo $val->subject ?></h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-4">

                                                    <div class="panel panel-warning" style="margin-top:20px;">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">입고 기간</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <!--                                                            여기에 디데이 라벨 삽입-->
                                                            <h4> <?php echo $val->inStartDate ?> ~ <?php echo $val->inEndDate ?></h4>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-xs-4">

                                                    <?php
                                                    if($val->nego == 'yes') {
                                                        $color = 'default';
                                                        $temp = '가능';
                                                        
                                                    } else {
                                                        $color = 'danger';
                                                        $temp = '불가능';
                                                    }
                                                    ?>
                                                    <div class="panel panel-<?php echo $color?>" style="margin-top:20px;">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">가격 협의 여부</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <h4><?php echo $temp?>  </h4>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            

                                            <!--                                닫기 및 등록 버튼-->
                                            <div  style="text-align: right; margin-top:20px; margin-bottom: 20px; padding-bottom: 20px;">

                                                <!--                                                    <a href="#" class="btn-layerClose">취소하기</a>-->
                                                <button type="button" class="btn btn-success" style="float: right; " id="cancle"> 닫기 </button>


                                                <a href="#update<?php echo $val->idx?>" class="btn btn-warning" style="float: right; margin-right:10px;"  id="modi<?php echo $val->idx ?>" > 수정하기 </a>



                                                <form method="post" action="/buy_board">
                                                    <input type="hidden" name="type" value="del">
                                                    <input type="hidden" name="idx" value="<?php echo $val->idx ?>">

                                                    <button type="submit" class="btn btn-danger" style="float: right; margin-right:10px;"  onClick="return confirm('삭제하시겠습니까?')"> 삭제하기 </button>
                                                </form>


                                            </div>
                                            <!--// content-->
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>

                        <!-- 팝업 끝-->
                    <?php }} else { ?>

                                <div class="row" style=" margin-left:10px; padding-top:10px; ">

            <!--                   개별 카드 시작 -->


            <!--                        알아낸 사실 : 팝업링크에서 특수문자가 들어가면 오류가난다..-->


                                            <div class="col-md-6" style="float: left;">
                                                <div class="thumbnail" style="height:160px; width:420px; float: left;">

                                                    <div class="caption">

                                                        <div style="float:left; width:100%; margin-top:0px;">

                                                            <h4 style="text-align: center;  padding-left:10px;"> 등록한 구매공고가 없습니다. </h4>


                                                            <div>

                                                                <div style="text-align: center; width:100%; border-top: solid 1px #DDDDDD;  padding-left:10px; padding-top:10px; ">
                                                                     <img src="<?php echo $this->config->item('image_path');?>/addButton.png" alt="..." class="img-rounded" width="30px" height="30px" style="margin-top:15px;" ><br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                            </div>
<?php  } ?>
        </nav>













        <nav class="navbar navbar-default" style="height:400px; overflow-y: auto; overflow-x:hidden;" >
            
            <div class="row">
                <div class="col-xs-12 col-md-8"><h4 style="float: left; margin-left:10px; padding-left: 10px; padding-top: 15px;">구매 공고 입찰 리스트</h4></div>
                <div class="col-xs-6 col-md-4"><a href="#" class="btn btn-fab-info " style="float: right; margin-top: 15px; margin-right:10px;" role="button"></a></div>
            </div>

            <div class="dropdown">

                <form action="/buy_board" method="post">

                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <select name = "search" class="form-control" style="width:200px; float:left; margin-left:25px;" >
                                <option  <?php if($result == '전체보기') { ?> selected = "selected" <?php } ?> > 전체보기 </option>
<!--                                공고가 들어올때마다, 여기에 추가되어서 공고별로 조회할 수 있게함.-->
                                <option <?php if($result == '생철') { ?> selected = "selected" <?php } ?> > 생철 </option>
                                <option <?php if($result == '경량철') { ?> selected = "selected" <?php } ?> > 경량철 </option>
                                <option <?php if($result == '중량철') { ?> selected = "selected" <?php } ?> > 중량철 </option>
                                <option <?php if($result == '가공철') { ?> selected = "selected" <?php } ?> > 가공철 </option>
                            </select>
                        </div>

                        <div class="col-xs-6 col-md-4">
                                <input type="text" class="col-md-1 form-control input-sm" name="search_word" id="keyword" placeholder="키워드를 입력하세요" onkeypress="board_search_enter(document.keyword);"
                                style="width:200px;">
                            &nbsp;&nbsp;
                                <button type="submit" class="btn btn-info btn-icon btn-circle" id="search_btn"><i class="fa fa-search"></i></button>
                            </div>`
                    </div>



                </form>
            </div>

<!--            전체 카드 시작-->
            <div class="row" style=" margin-left:10px; padding-top:10px; ">

                <?php
                    if(isset($tenderList)) {
                        foreach ($tenderList as $val) {
                ?>

                <!--                   개별 카드 시작 -->
                <div class="col-md-6" style="float: left;">
                    <div class="thumbnail" style="height:160px; width:420px; float: left;">

                        <div class="caption">

                            <div style="float:left; width:100%; margin-top:0px;">


                               <h5 style="float: left; padding-left:10px;">
                                 <span class="label label-default"  style="float:left;  ">
                                 <?php echo $val->class ?> </span> &nbsp;&nbsp;
                                <strong> <?php echo $val->name ?> </strong>  </h5>

                                <div>

                                    <div style="float:left; width:100%; border-top: solid 1px #DDDDDD; text-align: left; padding-left:10px; padding-top:10px; ">
                                        <p> 입찰 물량 : <?php echo $val->count ?>t &nbsp;
                                            <?php

                                                $temp = $val->count / 25;

                                                for($i = $temp; $i > 0; $i--) {
                                                    ?>
                                                    <img src="<?php echo $this->config->item('image_path');?>/Truck.png" id="truck" style="height:30px; width:45px;" />
                                                <?php }
                                            ?>
                                        </p>

                                        <p> 입찰가 : <?php echo $val->price ?>원/kg</p>
                                        <p> 입고 가능일 : <?php echo $val->inStartDate ?>
<!--                                            클릭시 상세보기 새창 -->

                                            <a href="#tender<?php echo $val->idx ?>" class="btn btn-success " style="float: right; width:80px; height:25px; font-size: 12px; padding-top:3px;" role="button" id="view<?php echo $val->idx ?>" >상세보기</a>


                                            <!--                입찰 상세 팝업-->
                                                    <div class="dim-layer" id="dim-layer-tender<?php echo $val->idx ?>">
                                                        <div class="dimBg" ></div>
                                                        <div id="tender<?php echo $val->idx ?>" class="pop-layer">
                                                            <div class="pop-container">

                                                                <!--                           팝업 전체  폼 시작-->
                                                                <form action="/buy_board" method="post">
                                                                    <div class="pop-conts">
                                                                        <!--content //-->


                                                                        <div class="row" >
                                                                            <div class="col-xs-12 col-md-8">
                                                                                <h4 style="float: left; margin-top:10px;">입찰 상세</h4>
                                                                            </div>

                                                                        </div>

                                                                            <!--                                                1번째줄 -->
                                                                            <div class="row" style="margin-top:20px;">
                                                                                <div class="col-md-6">
                                                                                    <p style="float: left; padding-top:10px;" >

                                                                                        <strong >업체명 : </strong> &nbsp; &nbsp; <?php echo $val->name ?><br><br>

                                                                                        <strong style="margin-top:10px;">품목 : </strong> &nbsp; &nbsp;  <?php echo $val->class ?> <br><br>
                                                                                        <strong style="margin-top:10px;">판매 가능 중량 : </strong> &nbsp; &nbsp; <?php echo $val->count ?>t <br><br>
                                                                                        <strong style="margin-top:10px;">입찰 단가 : </strong> &nbsp; &nbsp; <?php echo $val->price ?> 원/kg <br><br>

                                                                                    </p>

                                                                                </div>

                                                                                <div class="col-md-6">

                                                                                        <strong >계약 가능 날짜 : </strong> &nbsp; &nbsp; <?php echo $val->contractDate ?> <br><br>
<!--                                                                                        여기에 디데이 라벨 추가 하기-->
                                                                                        <strong style="margin-top:10px;" >입고 가능 날짜 : </strong> &nbsp; &nbsp; <?php echo $val->inStartDate ?> <br><br>
<!--                                                                                    여기에 디데이 라벨 추가하기-->
                                                                                </div>
                                                                            </div>

                                                                            <!--                                                2번째 줄 -->


                                                                            <div class="row" style=" border-top: 1px solid #DDD;">
                                                                            <?php
                                                                                        if ($val->reOffer == 1) { ?>
                                                                                        <p style="text-align: center;  color:red; padding-top:10px;">
                                                                                            * 해당 건은  재오퍼 검토 중 이므로, 중복 신청하실 수 없습니다.
                                                                                        </p>
                                                                                       <?php }
                                                                                    ?>
                                                                                <div class="col-xs-12 col-md-8">
                                                                                    <h4 style="float: left; margin-top:20px;">재오퍼</h4>

                                                                                </div>

                                                                            </div>

                                                                            <div class="row" style="margin-top:10px;">
                                                                                <div class="col-md-6">
                                                                                    <p style="float: left; padding-top:10px;" >

                                                                                        <strong style="float:left">재오퍼 사유 : </strong> &nbsp; &nbsp;
                                                                                            <select name = "class" class="form-control" style="width:200px; float:left; margin-left:25px;"
                                                                                               <?php
                                                                                                    if ($val->reOffer == 1) { ?>
                                                                                                    disabled
                                                                                                   <?php }
                                                                                                ?>
                                                                                            >
                                                                                                <option  <?php if($val->reReason == '가격 조정') { ?> selected = "selected" <?php } ?> > 가격 조정 </option>
                                                                                                <option <?php if($val->reReason == '계약 날짜 조정') { ?> selected = "selected" <?php } ?> > 계약 날짜 조정 </option>
                                                                                                <option <?php if($val->reReason == '입고 날짜 조정') { ?> selected = "selected" <?php } ?> > 입고 날짜 조정 </option>
                                                                                                <option  <?php if($val->reReason == '기타') { ?> selected = "selected" <?php } ?> > 기타 </option>
                                                                                            </select> <br>
                                                                                            <br><br>

                                                                                        <strong style="float:left; margin-right:30px;" >제안 단가 : </strong> &nbsp; &nbsp;
                                                                                                <input type="text" class="form-control" id="price" name="price" placeholder="가격을 입력해주세요." style="width: 200px; float:left" value="<?php echo $val->rePrice ?>"
                                                                                                <?php
                                                                                                    if ($val->reOffer == 1) { ?>
                                                                                                    disabled
                                                                                                   <?php }
                                                                                                ?>>
                                                                                         </br><br><br>

                                                                                        <strong style="float:left; margin-right:10px;" > 계약 날짜 제안 : </strong> &nbsp; &nbsp;
                                                                                                <input type="text" class="form-control" id="d_startDate" name="d_startDate" placeholder="YYYY-MM-DD"
                                                                                                               maxlength="20"  style="width:150px; float: left; margin-bottom:10px;" value="<?php echo $val->reContractDate ?>"
                                                                                                               <?php
                                                                                                                    if ($val->reOffer == 1) { ?>
                                                                                                                    disabled
                                                                                                                   <?php }
                                                                                                                ?>
                                                                                                               >
                                                                                                <!--이부분 value에 계약날짜 그대로 받아오기.-->

                                                                                                <p class="form-control-static text-right" style="color:red;display:none"></p>

                                                                                        </br><br><br>

                                                                                        <strong style="float:left; margin-right:10px;" > 입고 날짜 제안 : </strong> &nbsp; &nbsp;
                                                                                                <input type="text" class="form-control" id="d_endDate" name="d_endDate" placeholder="YYYY-MM-DD"
                                                                                                       maxlength="20"  style="width:150px; float: left; margin-bottom:10px;" value="<?php echo $val->reInStartDate ?>"

                                                                                                       <?php
                                                                                                            if ($val->reOffer == 1) { ?>
                                                                                                            disabled
                                                                                                           <?php }
                                                                                                        ?>
                                                                                                       >
                                                                                                <!--이부분 value에 계약날짜 그대로 받아오기.-->

                                                                                                <p class="form-control-static text-right" style="color:red;display:none"></p>

                                                                                        </br><br><br>

                                                                                    </p><br>

                                                                                </div>
                                                                            </div>


                                                                            <!--                                                3번째 줄 -->

                                                                            <div class="row" style="margin-top:30px; margin-left:10px;">
                                                                                <textarea class="form-control" rows="3" placeholder="상세 메세지를 입력하세요." id="messege" name="messege"
                                                                                            <?php
                                                                                                    if ($val->reOffer == 1) { ?>
                                                                                                    disabled
                                                                                                   <?php }
                                                                                                ?> ><?php echo $val->reMessege ?></textarea>
                                                                            </div>


                                                                            <!--                                닫기 및 등록 버튼-->
                                                                            <div  style="text-align: right; margin-top:20px; margin-bottom: 20px; padding-bottom: 20px;">




                                                                                <!--                                                    <a href="#" class="btn-layerClose">취소하기</a>-->
                                                                                 <form method="post" action="/buy_board">
                                                                                        <input type="hidden" name="type" value="re">
                                                                                        <input type="hidden" name="idx" value="<?php echo $val->idx ?>">

                                                                                        <button type="submit" class="btn btn-info" style="float: right; margin-right:10px;" <?php
                                                                                                    if ($val->reOffer == 1) { ?>
                                                                                                    disabled
                                                                                                   <?php }
                                                                                                ?> id ="rere" name ="rere" onClick="return confirm('재오퍼 하시겠습니까?')"> 재오퍼 </button>
                                                                                </form>

                                                                                <form method="post" action="/buy_board">
                                                                                        <input type="hidden" name="type" value="back">
                                                                                        <input type="hidden" name="idx" value="<?php echo $val->idx ?>">

                                                                                        <button type="submit" class="btn btn-warning" style="float: left; margin-right:10px;" <?php
                                                                                                    if ($val->reOffer == 0) { ?>
                                                                                                    disabled
                                                                                                   <?php }
                                                                                                ?> id ="rback" name ="rback" onClick="return confirm('재오퍼 취소 하시겠습니까?')"> 재오퍼 취소 </button>
                                                                                </form>



                                                                                <button type="button" class="btn btn-danger" style="float: right; margin-right:10px;" id="cancle"> 닫기 </button>

                                                                            </div>
                                                                            <!--// content-->
                                                                        </div>
                                                                        </form>


                                                                    </div>
                                                                </div>
                                                    </div>
                                                            <!-- 팝업 끝-->


                                    </div>

                                </div>

                            </div>

                        </div>
<!--                        end caption -->
                    </div>
<!--                    end thumbnail-->

                </div>
<!--                end col-md-6 -->
<?php }} else { ?>
                                                    <p> 입찰 신청한 업체가 없습니다. </p>
                                            <?php } ?>




            </div>
<!--        전체 카드 끝-->

        </nav>

    </div>
</div>
</div>
<!-- card end -->

<?php
if(isset($list)) {
    foreach ($list as $val) {
?>

<!--                        수정 팝업-->
<div class="dim-layer" id="dim-layer4<?php echo $val->idx ?>">
    <div class="dimBg" ></div>
    <div id="update<?php echo $val->idx?>" class="pop-layer">
        <div class="pop-container">

            <!--                           팝업 전체  폼 시작-->
            <form method="POST" action="/buy_board">
                <div class="pop-conts">
                    <!--content //-->


                    <div class="row" >
                        <div class="col-md-6">
                            <h4 style="float: left; margin-top:10px;">구매 공고 수정</h4>
                        </div>

                        <div class="col-md-6">
                            <strong style="padding-top:10px; float:left"> 공고 마감일 </strong>
                            <div class="col-sm-9" style="width:160px; float: LEFT; ">
                                <input type="text" class="form-control" id="endDate_M" name="endDate_M" placeholder="YYYY-MM-DD"
                                       maxlength="200" style="margin-bottom:10px;"  value="<?php echo $val->inEndDate?>"  required>
                                <p class="form-control-static text-right" style="color:red;display:none"></p>
                            </div>
                        </div>

                    </div>

                    <!--                                                1번째줄 -->
                    <div class="row" style="margin-top:20px;">
                        <div class="col-md-6">
                            <strong style="float: left; padding-top:10px;">분류 선택</strong>

                            <select name = "class" class="form-control" style="width:200px; float:left; margin-left:25px;" >
                                <option > 생철  </option>
                                <option > 중량철 </option>
                                <option > 경량철 </option>
                                <option > 가공철 </option>
                            </select>

                        </div>

                        <!--                                                    <div class="row">-->
                        <!--                                                        <div class="col-md-6">.col-md-6</div>-->
                        <!--                                                        <div class="col-md-6">.col-md-6</div>-->
                        <!--                                                    </div>-->

                        <div class="col-md-6">
                            <strong style="float: left; padding-top:10px;">품목 선택</strong>

                            <select name = "subject" class="form-control" style="width:200px; float:left; margin-left:25px;" >
                               <option > 생철A </option>
                                <option > 생철B </option>
                                <option > 중량철A </option>
                                <option > 중량철B </option>
                                <option > 기타 </option>
                            </select>
                        </div>
                    </div>

                    <!--                                                2번째 줄 -->

                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <strong style="float: left; padding-top:10px; margin-right:30px;">필요 물량</strong>
                            <input type="text" class="form-control" name="count" placeholder="희망 구매 수량을 입력하세요." style="width: 280px; float:left"  value="<?php echo $val->count?>"  REQUIRED>
                        </div>

                        <div class="col-md-6">
                            <strong style="float: left; padding-top:10px; margin-right:20px; "> 입고 날짜 </strong>
                            <div class="col-sm-9" style="width:150px; float: left; margin-bottom:10px;">
                                <input type="text" class="form-control" name="startDate_M" placeholder="YYYY-MM-DD"
                                       maxlength="200" value="<?php echo $val->inStartDate?>" required>
                                <p class="form-control-static text-right" style="color:red;display:none"></p>
                            </div>
                        </div>
                    </div>


                    <!--                                                3번째 줄 -->

                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-6">
                            <strong style="float: left; padding-top:10px; margin-right:30px;">구매 단가</strong>
                            <input type="text" class="form-control" id="price" name="price" placeholder="희망 구매 단가를 입력하세요." style="width: 320px; float:left" value="<?php echo $val->price?>" REQUIRED>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-warning" style="float: left">시세보기</button>
                        </div>
                    </div>



                    <!--                                                 4번째 줄-->
                    <div class="row" style="margin-top:30px;">
                                                    <div class="col-md-6">
                                                        <strong style="float: left; padding-top:10px; margin-right:20px;">배송 요청지</strong>
                                                          <input type="text" id="sample5_address2" name="deli" placeholder="주소" required class="form-control"  readonly style="width:200px; float:left" value="<?php echo $val->deli?>">
                                                           <input type="button" class="btn btn-info" onclick="sample5_execDaumPostcode2()" value="검색" style="margin-left:20px; float:left">

                                                    </div>
                                                    <div class="col-md-6">

                                                         <div id="map2" style="width:400px;height:200px;display:none"></div>

                                                    </div>

                                                </div>

                    <!--                                                 4번째줄(2) -->




                    <!--                                                5번째 줄-->

                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-8">
                            <strong style="float: left; padding-top:10px; margin-right:30px;">거래 담당자</strong>
                            <input type="text" class="form-control" id="manager" name="manager" placeholder="이름" style="width: 150px; float:left; margin-right:30px;" value="<?php echo $val->manager?>" REQUIRED>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="연락처" style="width: 250px; float:left REQUIREDREQUIRED"  value="<?php echo $val->phone?>" REQUIRED>

                        </div>


                        <div class="col-md-4">

                        </div>
                    </div>

                    <!--                                                6번째 줄-->
                    <div class="row" style="margin-top:40px;">
                        <div class="col-md-6">
                            <strong style="float: left; padding-top:10px; margin-right:50px;">가격 협의가능</strong>
                            <input type="radio" value = "yes"  class="form-control" name="nego_M" id="yes_M" REQUIRED checked ><label for="yes_M" style="margin-right:30px;"> 가능 </label>
                            <input type="radio" value = "no"  class="form-control" name= "nego_M" id="no_M" REQUIRED><label for="no_M"> 불가능 </label>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>


            </form>






            <div class="btn-r" style="text-align: right;  padding-bottom: 10px;">

                <!--                                                    <a href="#" class="btn-layerClose">취소하기</a>-->

                <input type="hidden" name="type" value="modiF">
                <input type="hidden" name="idx" value="<?php echo $val->idx?>">

                <button type="submit" class="btn btn-success" style="float: right; " id="modiF" name="modiF"> 수정하기 </button>


                <button type="button" class="btn btn-danger" style="float: right; margin-right:10px;" id="cancle"> 취소하기 </button>

            </div>



            <!--                                닫기 및 등록 버튼-->

            <!--// content-->
        </div>



    </div>
</div>
        </div>
<?php } } ?>

<!--contents end -->

<?PHP $html->Footer(); ?>
<?PHP $html->jsDec(); //기본js  ?>
<!-- Add js start -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script src="//dapi.kakao.com/v2/maps/sdk.js?appkey=e77b66f740b64497b3fbff71204cf0bc&libraries=services"></script>

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
        $('#startDate, #endDate, #d_startDate, #d_endDate, #startDate_M, #endDate_M , #r_startDate, #r_contractDate').datepicker({
            //comment the beforeShow handler if you want to see the ugly overlay
            beforeShow: function() {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999);
                }, 0);
            }
        });
    });

    var mapContainer = document.getElementById('map'), // 지도를 표시할 div
        mapOption = {
            center: new daum.maps.LatLng(37.537187, 127.005476), // 지도의 중심좌표
            level: 5 // 지도의 확대 레벨
        };

    //지도를 미리 생성
    var map = new daum.maps.Map(mapContainer, mapOption);
    //주소-좌표 변환 객체를 생성
    var geocoder = new daum.maps.services.Geocoder();
    //마커를 미리 생성
    var marker = new daum.maps.Marker({
        position: new daum.maps.LatLng(37.537187, 127.005476),
        map: map
    });


    function sample5_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                var addr = data.address; // 최종 주소 변수

                // 주소 정보를 해당 필드에 넣는다.
                document.getElementById("sample5_address").value = addr;
                // 주소로 상세 정보를 검색
                geocoder.addressSearch(data.address, function(results, status) {
                    // 정상적으로 검색이 완료됐으면
                    if (status === daum.maps.services.Status.OK) {

                        var result = results[0]; //첫번째 결과의 값을 활용

                        // 해당 주소에 대한 좌표를 받아서
                        var coords = new daum.maps.LatLng(result.y, result.x);
                        // 지도를 보여준다.
                        mapContainer.style.display = "block";
                        map.relayout();
                        // 지도 중심을 변경한다.
                        map.setCenter(coords);
                        // 마커를 결과값으로 받은 위치로 옮긴다.
                        marker.setPosition(coords)
                    }
                });
            }
        }).open();
    }


    // 공고 팝업

    $(function () {
        $('#addstill').click(function(){
            var $href = $(this).attr('href');
            layer_popup($href);
        });
    });

    function layer_popup(el){

        var $el = $(el);        //레이어의 id를 $el 변수에 저장
        var isDim = $el.prev().hasClass('dimBg');   //dimmed 레이어를 감지하기 위한 boolean 변수

        isDim ? $('#dim-layer').fadeIn() : $el.fadeIn();

        var $elWidth = ~~($el.outerWidth()),
            $elHeight = ~~($el.outerHeight()),
            docWidth = $(document).width(),
            docHeight = $(document).height();

        // 화면의 중앙에 레이어를 띄운다.
        if ($elHeight < docHeight || $elWidth < docWidth) {
            $el.css({
                marginTop: -$elHeight /2,
                marginLeft: -$elWidth/2
            })
        } else {
            $el.css({top: 0, left: 0});
        }

        $el.find('#cancle').click(function(){
            isDim ? $('#dim-layer').fadeOut() : $el.fadeOut(); // 닫기 버튼을 클릭하면 레이어가 닫힌다.
            return false;
        });

        $('.layer .dimBg').click(function(){
            $('#dim-layer').fadeOut();
            return false;
        });

    }


    //    공고 상세보기 팝업
    <?php
        if(isset($list)) {
            foreach ($list as $val) {
    ?>
    $(function () {
        $('#annClick<?php echo $val->idx ?>').click(function(){
            var $href = $(this).attr('href');
            layer_popup3<?php echo $val->idx ?>($href);
        });
    });


    function layer_popup3<?php echo $val->idx ?>(el){

        var $el = $(el);        //레이어의 id를 $el 변수에 저장
        var isDim = $el.prev().hasClass('dimBg');   //dimmed 레이어를 감지하기 위한 boolean 변수

        isDim ? $('#dim-layer3<?php echo $val->idx ?>').fadeIn() : $el.fadeIn();

        var $elWidth = ~~($el.outerWidth()),
            $elHeight = ~~($el.outerHeight()),
            docWidth = $(document).width(),
            docHeight = $(document).height();

        // 화면의 중앙에 레이어를 띄운다.
        if ($elHeight < docHeight || $elWidth < docWidth) {
            $el.css({
                marginTop: -$elHeight /2,
                marginLeft: -$elWidth/2
            })
        } else {
            $el.css({top: 0, left: 0});
        }

        $el.find('#cancle').click(function(){
            isDim ? $('#dim-layer3<?php echo $val->idx ?>').fadeOut() : $el.fadeOut(); // 닫기 버튼을 클릭하면 레이어가 닫힌다.
            return false;
        });

        $('.layer .dimBg').click(function(){
            $('#dim-layer3<?php echo $val->idx ?>').fadeOut();
            return false;
        });

    }





//    입찰 리스트 상세보기 팝업
 <?php
        if(isset($tenderList)) {
            foreach ($tenderList as $val) {
    ?>

    $(function () {
        $('#view<?php echo $val->idx ?>').click(function(){
            var $href = $(this).attr('href');
            layer_popup_tender<?php echo $val->idx ?>($href);
        });
    });

    function layer_popup_tender<?php echo $val->idx ?>(el){

        var $el = $(el);        //레이어의 id를 $el 변수에 저장
        var isDim = $el.prev().hasClass('dimBg');   //dimmed 레이어를 감지하기 위한 boolean 변수

        isDim ? $('#dim-layer-tender<?php echo $val->idx ?>').fadeIn() : $el.fadeIn();

        var $elWidth = ~~($el.outerWidth()),
            $elHeight = ~~($el.outerHeight()),
            docWidth = $(document).width(),
            docHeight = $(document).height();

        // 화면의 중앙에 레이어를 띄운다.
        if ($elHeight < docHeight || $elWidth < docWidth) {
            $el.css({
                marginTop: -$elHeight /2,
                marginLeft: -$elWidth/2
            })
        } else {
            $el.css({top: 0, left: 0});
        }

        $el.find('#cancle').click(function(){
            isDim ? $('#dim-layer-tender<?php echo $val->idx ?>').fadeOut() : $el.fadeOut(); // 닫기 버튼을 클릭하면 레이어가 닫힌다.
            return false;
        });



        $('.layer .dimBg').click(function(){
            $('#dim-layer-tender<?php echo $val->idx ?>').fadeOut();
            return false;
        });

    }

    <?php }}?>

    //      수정팝업

    <?php
    if(isset($list)) {
    foreach ($list as $val) {
    ?>
    $(function () {
        $('#modi<?php echo $val->idx ?>').click(function(){
            var $href = $(this).attr('href');
            layer_popup4<?php echo $val->idx ?>($href);
        });
    });


    function layer_popup4<?php echo $val->idx ?>(el){

        var $el = $(el);        //레이어의 id를 $el 변수에 저장
        var isDim = $el.prev().hasClass('dimBg');   //dimmed 레이어를 감지하기 위한 boolean 변수

        isDim ? $('#dim-layer4<?php echo $val->idx ?>').fadeIn() : $el.fadeIn();

        var $elWidth = ~~($el.outerWidth()),
            $elHeight = ~~($el.outerHeight()),
            docWidth = $(document).width(),
            docHeight = $(document).height();

        // 화면의 중앙에 레이어를 띄운다.
        if ($elHeight < docHeight || $elWidth < docWidth) {
            $el.css({
                marginTop: -$elHeight /2,
                marginLeft: -$elWidth/2
            })
        } else {
            $el.css({top: 0, left: 0});
        }

        $el.find('#cancle').click(function(){
            isDim ? $('#dim-layer4<?php echo $val->idx ?>').fadeOut() : $el.fadeOut(); // 닫기 버튼을 클릭하면 레이어가 닫힌다.
            return false;
        });

        $('.layer .dimBg').click(function(){
            $('#dim-layer4<?php echo $val->idx ?>').fadeOut();
            return false;
        });

    }
    <?php } }?>
    <?php } }?>







</script>


<!-- Add js end -->
<?PHP $html->htmlEnd();  ?>

