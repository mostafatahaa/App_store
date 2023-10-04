<?php

namespace PHPMVC\LIB;

trait Validate
{
    private $_regexPatterns = [
        "num"               => "/^[0-9]+(?:\.[0-9]+)?$/",
        "int"               => "/^[0-9]+$/",
        "float"             => "/^[0-9]+\.[0-9]+$/",
        "alpha"             => "/^[a-zA-Z\p{Arabic}]+$/u",
        "alphaNum"          => "/^[a-zA-Z\p{Arabic}0-9]+$/u",
        "vdate"             => "/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",
        "vemail"            => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',
        "vurl"              => '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu'


    ];

    public function requireVal($val)
    {
        return "" !== $val || !empty($val);
    }

    public function num($val)
    {
        return (bool) preg_match($this->_regexPatterns["num"], $val);
    }

    public function int($val)
    {
        return (bool) preg_match($this->_regexPatterns["int"], $val);
    }

    public function float($val)
    {
        return (bool) preg_match($this->_regexPatterns["float"], $val);
    }

    public function alpha($val)
    {
        return (bool) preg_match($this->_regexPatterns["alpha"], $val);
    }

    public function alphaNum($val)
    {
        return (bool) preg_match($this->_regexPatterns["alphaNum"], $val);
    }

    public function lessThan($val, $matchAgainst)
    {
        if (is_numeric($val)) {
            return $val < $matchAgainst;
        } elseif (is_string($val)) {
            return  mb_strlen($val) < $matchAgainst;
        }
    }

    public function greaterThan($val, $matchAgainst)
    {
        if (is_numeric($val)) {
            return $val > $matchAgainst;
        } elseif (is_string($val)) {
            return  mb_strlen($val) > $matchAgainst;
        }
    }

    public function minimum($val, $min)
    {
        if (is_numeric($val)) {
            return $val >= $min;
        } elseif (is_string($val)) {
            return  mb_strlen($val) >= $min;
        }
    }

    public function maximum($val, $max)
    {
        if (is_numeric($val)) {
            return $val <= $max;
        } elseif (is_string($val)) {
            return  mb_strlen($val) <= $max;
        }
    }

    public function between($val, $min, $max)
    {
        if (is_numeric($val)) {
            return $val >= $min && $val <= $max;
        } elseif (is_string($val)) {
            return  mb_strlen($val) >= $min && mb_strlen($val) <= $max;
        }
    }

    public function floatLike($val, $beforeDec, $afterDec)
    {
        if (!$this->float($val)) {
            return false;
        }
        $pattern = "/^[0-9]{" . $beforeDec . "}\.[0-9]{" . $afterDec . "}$/";
        return (bool) preg_match($pattern, $val);
    }

    public function validateDate($val)
    {
        return (bool) preg_match($this->_regexPatterns["vdate"], $val);
    }

    public function validateEmail($val)
    {
        return (bool) preg_match($this->_regexPatterns["vemail"], $val);
    }

    public function validateUrl($val)
    {
        return (bool) preg_match($this->_regexPatterns["vurl"], $val);
    }

    public function isValid($roles, $inputType = "post")
    {
        $errors = [];
        if (!empty($roles)) {
            foreach ($roles as $fieldName => $validationRoles) {
                $validationRoles = explode("|", $validationRoles);
                $value = $inputType[$fieldName];
                foreach ($validationRoles as $validationRole) {
                    if (preg_match_all("/(minimum)\((\d+)\)/", $validationRole, $match)) {
                        if ($this->minimum($value, $match[2][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey("text_error_" . $match[1][0], [$this->language->get("text_lable_" . $fieldName), $match[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                        }
                    }
                }
            }
        }
        return empty($errors) ? true : false;
    }
}
