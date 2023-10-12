<?php

return [
    "template" => [
        "wrapper_start"     => TEMPLATE_PATH . "wrapperstart.php",
        "sid_bar"           => TEMPLATE_PATH . "sidebar.php",
        "nav"               => TEMPLATE_PATH . "nav.php",
        ":view"             => "action_view",
        "wrapper_end"     => TEMPLATE_PATH . "wrapperend.php",
    ],

    "header_resources" => [
        "css" => [
            "google_fonts"               =>      'href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic"',
            "fawesome"                   =>      'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"',
            // "css_file"                   =>      'href="/css/style.css"',
            // "css_file2"                  =>      'href="/css/sb-admin-2.min.css"',
        ],
    ],

    "footer_resources" => [
        "script" => [
            // "jquery"                => UPLOADE_STORAGE . DS . ".." . DS . 'vendor/jquery/jquery.min.js',
            // "bootstrap"             => UPLOADE_STORAGE . DS . ".." . DS . '/vendor/bootstrap/js/bootstrap.bundle.min.js',
            // "jquery2"               => UPLOADE_STORAGE . DS . ".." . DS . '/vendor/jquery-easing/jquery.easing.min.js',
            // "jquery"                => UPLOADE_STORAGE . DS . ".." . DS . '/js/sb-admin-2.min.js'
        ],

    ],
];


// create footer resources