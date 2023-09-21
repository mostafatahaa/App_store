<?php

return [
    "template" => [
        "wrapper_start"     => TEMPLATE_PATH . "wrapperstart.php",
        "nav"               => TEMPLATE_PATH . "nav.php",
        "header"            => TEMPLATE_PATH . "header.php",
        ":view"             => "action_view",
        "wrapper_end"       => TEMPLATE_PATH . "wrapperend.php",

    ],

    "header_resources" => [
        "css" => [
            "css_path"                   =>     CSS_PATH . 'style.css type="text/css"/>',
            "ajax"                       =>     '"https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.css">',
            "bootstrap_cdn_css"          =>     '"https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">',
            "css_file"                   =>     '"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">',
        ],

    ],


    "footer_resources" => [
        //  Angular / Material / Bootstrap / JQuery JS Dependencies on bottom of page to reduce initial load time
        "library" => [
            "js_1"          =>      "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js",
            "js_2"          =>      "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js",
            "js_3"          =>      "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js",
            "js_4"          =>      "https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.js",
            "js_5"          =>      "https://code.jquery.com/jquery-1.11.2.min.js",
            "js_6"          =>      "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js",
            "js_file"       =>       JS_PATH . 'app.js',

        ]
    ]

];


// create footer resources