<?PHP $html->Doctype(); ?>
<!-- Add CSS start -->
<link href="<?php echo $this->config->item('css_path');?>/weblayout.css" rel="stylesheet"
      xmlns:margin-top="http://www.w3.org/1999/xhtml" xmlns:margin-top="http://www.w3.org/1999/xhtml"
      xmlns:margin-top="http://www.w3.org/1999/xhtml" xmlns:margin-top="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">
<!-- Add CSS end -->
<?PHP $html->Head(); ?>
<!--contents start -->

<?PHP $html->Blue_subnav3( '이벤트 '.($user=="f"?'수정':'등록'),'/','0','/cart','#AAA8A9'); // (로고경로,로고클릭시이동경로,장바구니숫자,장바구니클릭시이동,밑라인색상) ?><div class="container-sub">

<style>

    .eng {
        color: red;
    }

    .btn-file{
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

</style>

            <form action="/event/write_ok" method="POST" enctype = "multipart/form-data">


                <div class="form-group pt15 ov_h">
                    <label for="title" class="col-sm-3 control-label">이벤트 기간</label>
                    <div class="col-sm-9" style="width:250px; float: left">
                        <input type="text" class="form-control" id="startDate" name="startDate" placeholder="YYYY-MM-DD"
                               maxlength="100"
                               value="<?php echo $startDate ?>" required>
                        <p class="form-control-static text-right" style="color:red;display:none"></p>
                    </div>

                    <div style="float: left; font-size:20px; color: #0D3349; ">
                        <span> ~ </span>

                    </div>

                    <div class="col-sm-9" style="width:250px; float: left">
                        <input type="text" class="form-control" id="endDate" name="endDate" placeholder="YYYY-MM-DD"
                               maxlength="100" value="<?php echo $endDate ?>" required>
                        <p class="form-control-static text-right" style="color:red;display:none"></p>
                    </div>
                </div>

                <div class="form-group pt15 ov_h" style="margin-top:0px">
                    <label for="title" class="col-sm-3 control-label">제목</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력해주세요."
                               maxlength="100"
                               value="<?php echo $title ?>" required >
                        <p class="form-control-static text-right" style="color:red;display:none"></p>
                    </div>
                </div>

                <div class="form-group ov_h">
                    <label for="M001_11" class="col-sm-3 control-label">이미지</label>


                    <div class="col-sm-9" id="upfileform">
                        <span class=" eng"> * 파일명은 영어로만 가능합니다 </span>
                        <input type="file"  name="insert_img" required/>

                    </div>

                </div>

                    <div class="form-group ov_h">
                        <label for="content" class="col-sm-3 control-label">내용</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="20" id="content"
                                      name="content"><?php echo $content ?> </textarea>
                            <p class="form-control-static text-right" style="color:red;display:none"></p>
                        </div>
                    </div>

                <div class="row" style="margin:10px;">
                    <form method="POST" action="event/write_ok">
                        <input type="hidden" name="user" value="<?php echo $user ?>">
                          
                        <?php
                        if($user == "f") {
                            $idx = $_REQUEST['idx'];
                            ?>

                            <input type="hidden" name="idx" value="<?php echo $idx ?>">

                        <?php } ?>

                        <button type="submit" class="btn btn-primary btn-block"  id="submit_event">
                            <?php echo $buttonName ?>
                        </button>
                    </form>
                </div>
            </form>


</div>
<!--contents end -->
<?PHP $html->leftSildeMenu(); ?>
<?PHP $html->Footer(); ?>
<?PHP $html->jsDec(); //기본js  ?>
<!-- Add js start -->
<script>

</script>
<!-- Add js end -->
<?PHP $html->htmlEnd();  ?>
