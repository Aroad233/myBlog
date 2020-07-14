<?php
require_once ('config.php');
header("content-type:text/html;charset=utf-8");
include "../controller/IndexController.php";
$T = new IndexController();
$res = null;
if (!empty($_POST)) {
    $searchWord = $_POST['searchWord'];
    $searchWord1 = "%".$_POST['searchWord']."%";
    $res = $T->search($searchWord1);
}
//$res = $T->index();
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
                <div class="ui-posts">
                    <h2 style="text-align: center">
                        搜索
                    </h2>
                    <form class="ui-login" method="post">
                        <input class="" type="text" placeholder="SearchWord" name="searchWord" />
                        <input class="submit" type="submit" value="Search" />
                    </form>
                    <?php
                    if (!empty($res)) {
                        while ($r = mysqli_fetch_assoc($res)) {
                        ?>
                        <div class="ui-post">
                            <div class="ui-post-title">
                                <h3>
                                    <?php
                                    echo $r['title'];
                                    ?>
                                </h3>
                            </div>
                            <div class="ui-post-summary">
                                <?php
                                $r['content'] = str_replace($searchWord,"<b style='color: red'>$searchWord</b>",$r['content']);
                                echo $r['content'];
                                ?>
                            </div>
                            <div class="ui-post-img">
                                <?php
                                if (!empty($r['img1'])) {
                                    echo "<img src='".$r['img1']."'>";
                                }
                                if (!empty($r['img2'])) {
                                    echo "<img src='".$r['img2']."'>";
                                }
                                if (!empty($r['img3'])) {
                                    echo "<img src='".$r['img3']."'>";
                                }
                                ?>
                            </div>
                            <div class="ui-post-date">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-clock" data-v-ca912c04="">
                                    <circle cx="12" cy="12" r="10" data-v-ca912c04=""></circle>
                                    <polyline points="12 6 12 12 16 14" data-v-ca912c04=""></polyline>
                                </svg>
                                <span><?php
                                    echo $r['time']." ".$r['username'];
                                    ?></span>
                            </div>
                        </div>
                        <?php
                        }
                    }
                    ?>
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
    var mychar = document.getElementsByClassName("ui-post");
    for ( var i=0 ; i<mychar.length - 1 ; i++ ) {
        mychar[i].style.marginBottom = "25px";//border-bottom: 1px solid #f1f1f1;
        mychar[i].style.borderBottom = "1px solid #f1f1f1";
    }
</script>

