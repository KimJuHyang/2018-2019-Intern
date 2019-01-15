<?PHP $html->Doctype(); ?>
    <!-- Add CSS start -->
    <link href="<?php echo $this->config->item('css_path');?>/weblayout.css" rel="stylesheet"
          xmlns:margin-top="http://www.w3.org/1999/xhtml" xmlns:margin-top="http://www.w3.org/1999/xhtml"
          xmlns:margin-top="http://www.w3.org/1999/xhtml" xmlns:margin-top="http://www.w3.org/1999/xhtml">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
    <!-- Add CSS end -->
<?PHP $html->Head(); ?>
    <!--contents start -->
<?php $user = $_REQUEST['user'] ;
?>
<?PHP $html->Blue_MinNav3(($user=="f"?'수정':'등록').' 완료'); // 인수: 헤드이름?>
    <div class="container-sub">
        <div class="row text-center mg30">
            <div class="col-xs-12 col-sm-12 col-md-12 row-center-line">
                <p style="line-height:35px;font-size:16px;"><strong>이벤트 <?php echo ($user=="f"?'수정':'등록'); ?>이 완료 되었습니다.  </strong></p>


            </div>
        </div>
        <div class="row mt50">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-sm-offset-3">
                <button type="button" class="btn btn-primary btn-block" onclick="goUrl('/event')">확인</button>
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