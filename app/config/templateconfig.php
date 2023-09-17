<?php

return [
    "template" => [
        "wrapper_start"     => TEMPLATE_PATH . "wrapperstart.php",
        "header"            => TEMPLATE_PATH . "header.php",
        "nav"               => TEMPLATE_PATH . "nav.php",
        "wrapper_end"       => TEMPLATE_PATH . "wrapperend.php"
    ],

    "header_resources" => [
        "css" => [
            "bootstrap_cdn_css"     =>      CSS . "bootstrap.rtl.min.css",
            "fawesom"               =>      CSS . "all.min.css",
        ],
        "fonts" => [
            "google_fonts"          =>      "https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap",
        ],
        "js" => [
            "bootstrap_cdn_js"      =>      JS . "bootstrap.bundle.min.js",
        ],
    ]
];
