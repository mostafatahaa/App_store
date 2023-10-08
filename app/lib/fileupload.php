<?php

namespace PHPMVC\LIB;

//NOTE: Read about php file upload
class FileUpload
{
    private $name;
    private $type;
    private $size;
    private $error;
    private $tmpPath;

    private $fileExtension;
    private $allowedExtention = ["jpg", "png", "gif", "doc", "docx", "xls"];

    public function __construct(array $file)
    {
        $this->name         = $this->name($file["name"]);
        $this->type         = $file["type"];
        $this->size         = $file["size"];
        $this->error        = $file["error"];
        $this->tmpPath      = $file["tmp_name"];
    }



    public function name($name)
    {
        preg_match_all("/([a-z]{1,4})$/i", $name, $match);
        $this->fileExtension = $match[0][0];
        $fileName = substr(strtolower(base64_encode($this->name . APP_SALT)), 0, 30);
        $fileName = preg_replace("/(\w{6})/i", "$1_", $fileName);
        $fileName = rtrim($fileName, "_");
        return $fileName;
    }

    private function isAllowedType()
    {
        return in_array($this->fileExtension, $this->allowedExtention);
    }

    private function isAllowedSize()
    {
        preg_match_all("/(\d+)([MG])$/i", MAX_FILE_SIZE_ALLOWED, $match);
        $sizeUnit = $match[2][0];
        $maxFileSize = $match[1][0];
        // convert from bytes in first condition and in sec condition if size KB will convert to MB
        $currentSize = ($sizeUnit == "M") ? ($this->size / 1024 / 1024) : ($this->size / 1024 / 1024 / 1024);
        $currentSize = ceil($currentSize);
        return (int) $currentSize < (int) $maxFileSize;
    }

    private function isImage()
    {
        return preg_match("/image/i", $this->type);
    }

    public function getFileName()
    {
        return $this->name . "." . $this->fileExtension;
    }

    public function upload()
    {
        // TODO: make property for all errors numbers and execute the error message to user so he can understand what happend
        if ($this->error !== 0) {
            trigger_error("Sorry your file didn't upload successfully", E_USER_WARNING);
        } elseif (!$this->isAllowedType()) {
            trigger_error("Sorry files of type" . $this->fileExtension . "are not allowed", E_USER_WARNING);
        } elseif (!$this->isAllowedSize()) {
            trigger_error("Sorry files size exceeds the maximum allowed size", E_USER_WARNING);
        } else {
            if ($this->isImage()) {
                move_uploaded_file($this->tmpPath, IMAGES_UPLOADE_STORAGE . DS . $this->getFileName());
            } else {
                move_uploaded_file($this->tmpPath, DOCUMENTS_UPLOADE_STORAGE . DS . $this->getFileName());
            }
        }
        return $this;
    }
}
