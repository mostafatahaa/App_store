<?php

return [
    "template" => [
        "nav"               => TEMPLATE_PATH . "nav.php",
        ":view"             => "action_view",
    ],

    "header_resources" => [
        "css" => [
            "google_fonts"               =>      'href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic"',
            "fawesome"                   =>      'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />',
            "css_file"                   =>      'href="/css/style.css"',
        ],

    ],
];


// create footer resources