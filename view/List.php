<?php
require_once ("config.php");
if (!empty($_SESSION['userid'])) {
    echo "<li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"IndexView.php\">首页</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"IssuancenView.php\">发布</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"SearchView.php\">搜索</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"MineView.php\">我的</a>
            </li>
            ";
} else {
    echo "
            <li class=\"nav-item active\">
                <a class=\"nav-link\" href=\"IndexView.php\">首页</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"LoginView.php\">登陆</a>
            </li>
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"RegisterView.php\">注册</a>
            </li>
    ";
}
