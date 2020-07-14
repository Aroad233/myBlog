<?php
require_once ('config.php');
include "../controller/IssuancenController.php";
if (!empty($_POST)) {
    $issuancenController = new IssuancenController();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userid = $_SESSION['userid'];
    $res1 = null;
    $res2 = null;
    $res3 = null;
    $new_filename1 = null;
    if ($_FILES['img1']['error']!=4) {
        $new_filename1='../image/'.time().'_'.rand(10000,99999).strstr($_FILES['img1']['name'],'.');
        $res1 = move_uploaded_file($_FILES['img1']['tmp_name'],$new_filename1);
    } else $new_filename1 = null;
    if ($_FILES['img2']['error']!=4) {
        $new_filename2='../image/'.time().'_'.rand(10000,99999).strstr($_FILES['img2']['name'],'.');
        $res2 = move_uploaded_file($_FILES['img2']['tmp_name'],$new_filename2);
    } else $new_filename2 = null;
    if ($_FILES['img3']['error']!=4) {
        $new_filename3='../image/'.time().'_'.rand(10000,99999).strstr($_FILES['img3']['name'],'.');
        $res3 = move_uploaded_file($_FILES['img3']['tmp_name'],$new_filename3);
    } else $new_filename3 = null;

    $res = $issuancenController->issuancen($title,$content,$new_filename1,$new_filename2,$new_filename3,$userid);
    if ($res == 1) echo "<script type=\"text/javascript\">
                    alert('发布成功');
                    header('location:MineView.php');
                </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyBlog</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div id="logo" class="navbar-brand" style="background-image: url('img/logo.png');"></div>
    <div id="title">
        <h1>Aroad's Blog</h1>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" color="#8a278c" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php
                require_once ("List.php");
            ?>
        </ul>
    </div>
</nav>

<section class="max-width mx-auto" style="padding-top: 160px;z-index: -1;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="ui-logins">
                    <h2>
                        发布
                    </h2>
                    <form enctype="multipart/form-data" action="IssuancenView.php" class="ui-issuancen" method="post">
                        <input class="" name="title" type="text" placeholder="Title" maxlength="45" />
                        <textarea class="" name="content" placeholder="Content" maxlength="200"></textarea>
                        <div class="container-fluid ui-issuancen-img">
                            <div class="row">
                                <div class="col-4">
                                    <div class="imgs" onclick="document.getElementById('file1').click()">Choose Image</div>
                                    <input class="imginput" onchange="l(this)" name="img1" type="file" accept="image/*" id="file1">
                                </div>
                                <div class="col-4">
                                    <div class="imgs" onclick="document.getElementById('file2').click()">Choose Image</div>
                                    <input class="imginput" onchange="l(this)" name="img2" type="file" accept="image/*"  id="file2">
                                </div>
                                <div class="col-4">
                                    <div class="imgs" onclick="document.getElementById('file3').click()">Choose Image</div>
                                    <input class="imginput" onchange="l(this)" name="img3" type="file" accept="image/*"  id="file3">
                                </div>
                            </div>
                        </div>

                        <div class="ui-issuancen-imglist container-fluid">
                            <div class="row">
                                <div class="col-4">
                                    <img src="" id="1">
                                </div>
                                <div class="col-4">
                                    <img src="" id="2">
                                </div>
                                <div class="col-4">
                                    <img src="" id="3">
                                </div>
                            </div>
                        </div>



                        <input class="submit" type="submit" value="Issuancen" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function l(evn) {
        var name = event.target.files[0].name;//获取上传的文件名
        var divObj= $(evn).prev() ; //获取div的DOM对象
        $(divObj).html(name) ;//插入文件名
        var id = $(evn).attr('id');//获取id
        var num = id.substr(4,1);
        var file = event.target.files[0];
        if (window.FileReader) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            //监听文件读取结束后事件
            reader.onloadend = function (e) {
                $("#"+num).attr("src",e.target.result);    //e.target.result就是最后的路径地址
            };
        }
    }
</script>
