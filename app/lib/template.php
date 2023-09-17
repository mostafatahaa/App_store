<?php

namespace PHPMVC\LIB;

class Template
{
    private $_template_parts;
    private $_action_view;
    private $_data;

    public function __construct(array $parts)
    {
        $this->_template_parts = $parts;
    }


    public function set_action_view_file($action_view_path)
    {
        $this->_action_view = $action_view_path;
    }

    public function set_app_data($data)
    {
        $this->_data = $data;
    }

    public function render_template_header_start()
    {
        require_once TEMPLATE_PATH . "templateheaderstart.php";
    }

    public function render_template_header_end()
    {
        require_once TEMPLATE_PATH . "templateheaderend.php";
    }

    public function render_template_footer()
    {
        require_once TEMPLATE_PATH . "templatefooter.php";
    }

    private function render_template_blocks()
    {
        if (!array_key_exists("template",  $this->_template_parts)) {
            trigger_error("You have to define template blocks", E_USER_WARNING);
        } else {
            $parts = $this->_template_parts["template"];
            if (!empty($parts)) {
                extract($this->_data);
                foreach ($parts as $part_key => $file) {
                    if ($part_key === ":view") {
                        require_once $this->_action_view;
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }

    private function render_header_resources()
    {
        $output = '';
        if (!array_key_exists("header_resources",  $this->_template_parts)) {
            trigger_error("You have to define header resources", E_USER_WARNING);
        } else {
            $resources = $this->_template_parts["header_resources"];

            // Generate BOOTSTRAP "CSS" links 
            $css = $resources["css"];
            if (!empty($css)) {
                foreach ($css as $css_key => $path) {
                    $output .= "<link rel='stylesheet' $path />";
                }
            }

            // Generate js links 
            $js = $resources["js"];
            if (!empty($js)) {
                foreach ($js as $js_key => $path) {
                    $output .= "<script src= $path ></script>";
                }
            }
        }

        echo $output;
    }




    public function render_app()
    {
        $this->render_template_header_start();
        $this->render_header_resources();
        $this->render_template_blocks();
        $this->render_template_header_end();
        $this->render_template_footer();


        // require_once TEMPLATE_PATH . "templateheaderstart.php";
        // require_once TEMPLATE_PATH . "templateheaderend.php";
        // require_once TEMPLATE_PATH . "wrapperstart.php";
        // require_once TEMPLATE_PATH . "header.php";
        // require_once TEMPLATE_PATH . "nav.php";
        // require_once TEMPLATE_PATH . "wrapperend.php";
        // require_once TEMPLATE_PATH . "templatefooter.php";
        // require_once $this->_action_view;
    }
}
