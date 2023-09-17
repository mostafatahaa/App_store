<?php

return [
    "template" => [
        "wrapper_start"     => TEMPLATE_PATH . "wrapperstart.php",
        "header"            => TEMPLATE_PATH . "header.php",
        "nav"               => TEMPLATE_PATH . "nav.php",
        "wrapper_end"       => TEMPLATE_PATH . "wrapperend.php",
        ":view"             => "action_view"
    ],

    "header_resources" => [
        "css" => [
            "bootstrap_cdn_css"     =>      'href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.rtl.min.css" integrity="sha512-SRg0d/3qeXy0utrb7F4+4jkFHhzdyvqjAd2i9ub0zWrPS80PoRaAtzmbMeVRYtApxoEcE6tcFZaHRY5UbwrTaw==" crossorigin="anonymous" referrerpolicy="no-referrer"',
            "fawesom"               =>      'href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap"',
            "google_fonts"          =>      'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"',
        ],

        "js" => [
            "bootstrap_cdn_js"      =>      '"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"',
        ],
    ]

];
