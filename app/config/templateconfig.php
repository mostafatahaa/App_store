<?php

return [
    "template" => [
        "wrapper_start"     => TEMPLATE_PATH . "wrapperstart.php",
        "nav"               => TEMPLATE_PATH . "nav.php",
        "sid_bar"           => TEMPLATE_PATH . "sidebar.php",
        ":view"             => "action_view",
        "wrapper_end"     => TEMPLATE_PATH . "wrapperend.php",
    ],

    "header_resources" => [
        "css" => [
            "google_fonts"               =>      'href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic"',
            "fawesome"                   =>      'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer"',
            "css_file"                   =>      'href="/css/style.css"',
        ],
        // "js" => [
        //     "js_file"                    =>      '/js/main.js',
        // ],

    ],
];


// create footer resources