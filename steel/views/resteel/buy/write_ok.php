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


</style>


<div class="container-submain" style="padding-top: 80px; ">



    <!-- card start -->
    <div class="web-List-container" style=" margin-top: 0px; width:100%; ">
    작성이 완료되었습니다.

    </div>

<!--contents end -->
<?PHP $html->leftSildeMenu(); ?>
<?PHP $html->Footer(); ?>
<?PHP $html->jsDec(); //기본js  ?>
<!-- Add js start -->
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
        $('#startDate, #endDate, #d_startDate, #d_endDate').datepicker({
            //comment the beforeShow handler if you want to see the ugly overlay
            beforeShow: function() {
                setTimeout(function(){
                    $('.ui-datepicker').css('z-index', 99999);
                }, 0);
            }
        });
    });


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


    //    상세보기 팝업

    $(function () {
        $('#view').click(function(){
            var $href = $(this).attr('href');
            layer_popup2($href);
        });
    });

    function layer_popup2(el){

        var $el = $(el);        //레이어의 id를 $el 변수에 저장
        var isDim = $el.prev().hasClass('dimBg');   //dimmed 레이어를 감지하기 위한 boolean 변수

        isDim ? $('#dim-layer2').fadeIn() : $el.fadeIn();

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
            isDim ? $('#dim-layer2').fadeOut() : $el.fadeOut(); // 닫기 버튼을 클릭하면 레이어가 닫힌다.
            return false;
        });

        $('.layer .dimBg').click(function(){
            $('#dim-layer2').fadeOut();
            return false;
        });

    }



</script>

<!-- Add js end -->
<?PHP $html->htmlEnd();  ?>
