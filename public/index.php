<?php

namespace PHPMVC;

use PHPMVC\LIB\Front_Controller;

if (!defined("DS")) {
    define("DS", DIRECTORY_SEPARATOR);
}
session_start();
require_once ".." . DS . "app" . DS . "config.php";
require_once APP_PATH . DS . "lib" . DS . "auto_load.php";

$front_controller = new Front_Controller();
echo $front_controller->dispatch();
?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبا بكم في لوحة التحكم</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.rtl.min.css" integrity="sha512-SRg0d/3qeXy0utrb7F4+4jkFHhzdyvqjAd2i9ub0zWrPS80PoRaAtzmbMeVRYtApxoEcE6tcFZaHRY5UbwrTaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body style="font-family: 'Cairo', sans-serif;">
    <div class="wrapper">
        <div class="navbar navbar-dark bg-dark fixed-top">
            <header>
                <h1>
                    <a class="navbar-brand" href="#" style="margin-right: 15px;position: fixed;right: 74px;top: 10px;">اللوحة الرئيسيه</a>
                </h1>
            </header>
            <nav class="container-fluid" style="justify-content: right;">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header" style="flex-direction: row-reverse;">
                        <h5 style="margin-right: 13px;" class="offcanvas-title" id="offcanvasDarkNavbarLabel">مدير التطبيق</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body" style="padding: 0;">
                        <div style="text-align: center; margin-bottom:50px;">
                            <img src="pic.png" class="rounded mx-auto d-block" style="width: 71%; margin-top: 34px;margin-bottom: 30px;" alt="#">
                            <h2>محمود شلبي</h2>
                        </div>
                        <div>
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" style="float:right;font-size: 24px;background-color: #363b41;width: 100%;">
                                <li class="nav-item">
                                    <a style="color: #f3c960; text-align-last: right;margin-bottom:11px;margin-right: 25px;" class="nav-link " href="#">الاحصائيات العامة<i class="fa-solid fa-chart-pie" style="color: #ffffff;margin-left:15px;"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a style="color: #f3c960; text-align-last: right;margin-bottom:11px;margin-right: 25px;" class="nav-link" href="/employee">الموظفين<i class="fa-solid fa-users" style="color: #ffffff;margin-left:15px;"></i></a>

                                </li>
                                <li class="nav-item">
                                    <a style="color: #f3c960; text-align-last: right;margin-bottom:11px;margin-right: 25px;" class="nav-link" href="#">تسجيل الخروج<i class="fa-solid fa-right-from-bracket" style="color: #ffffff;margin-left:15px"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>



</body>

</html> -->