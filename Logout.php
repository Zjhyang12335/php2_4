<?php
session_start();
unset($_SESSION['user']);// 删除session中的数据
header('Location: login.php');