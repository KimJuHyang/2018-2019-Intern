<?PHP $html->Doctype(); ?>
<!-- Add CSS start -->
<link href="<?php echo $this->config->item('css_path');?>/weblayout.css" rel="stylesheet">
<!-- Add CSS end -->
<?PHP $html->Head(); ?>
<!--contents start -->
<?PHP $html->Blue_subnav3('상세보기','/','0','/cart','#AAA8A9'); // (로고경로,로고클릭시이동경로,장바구니숫자,장바구니클릭시이동,밑라인색상) ?>
<style>
    .max-small {
        width: auto; height: auto;
        max-width: 300px;
        max-height: 300px;
        text-align: center;
    }

</style>

<div class="container-sub">
    <div class="content" style="margin-top: 50px; text-align: center">
        <?php
        //$test =$_GET["idx"];
        $today = date("Ymd");

        ?>

        <table class="table table-bordered" style="text-align: center">

            <!-- 진행중 여부, 제목, 기간 표시-->
            <thead >
            <tr style="text-align: center">
                <td colspan="4">

                    <?php

                    $target = $list->endDate;
                    $s_target = $list->startDate;

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

                    &nbsp;&nbsp;&nbsp;<?php echo $list->title ?>


                </td>

                <th scope="col" id="d_startDate" style="width:200px"> <?php echo $list->startDate; ?> ~ <?php echo $list->endDate; ?></th>


            </tr>
            </thead>

            <!-- 내용 표시 -->
            <tbody>
            <tr>
                <td colspan="6">
                        <div style="text-align: center; height:400px;" >
                            <!-- 이미지 표시 -->
                                <br>

                                <img class='max-small' src="<?php echo $this->config->item('image_path');?>/<?php echo $list->insert_img ?>"
                                />

                                <br> <br>
                            <?php echo $list->content;?>

                        </div>
                </td>
            </tr>
            </tbody>
        </table>


        <div class="row" style="margin:10px; float: right;">
            <button type="button" class="btn btn-primary" onclick="goUrl('/event')" style="float: left; margin-right:5px;" >목록</button>

                <form method="post"  action="/event/write?idx=<?php echo $list->idx;?>" style="float: left; margin-right:5px;" >
                        <input type="hidden" name="user" value="f">
                        <input type="hidden" name="idx" value="<?php echo $list->idx; ?>">
                        <input type="hidden" name="insert_img" value="<?php echo $list->insert_img; ?>">

                        <button type="submit" class="btn btn-success" >수정</button>
                </form>

            <!-- 삭제시 안내 팝업 뜨게하기 -->
            <form method="post" action="/event/delete" style="float: left">
                <input type="hidden" name="idx" value="<?php echo $list->idx; ?>">
                <button type="submit" class="btn btn-danger"> 삭제 </button>
            </form>
        </div>
    </div>
</div>

<!--contents end -->
<?PHP $html->leftSildeMenu(); ?>
<?PHP $html->Footer(); ?>
<?PHP $html->jsDec(); //기본js  ?>
<!-- Add js start -->
<!-- Add js end -->
<?PHP $html->htmlEnd();  ?>
