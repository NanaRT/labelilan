<?php

namespace AppBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class CreateFolderFilespath
{
    protected $uploadToken;
    protected $uploadPath;
    protected $container;
    protected $upload;


    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->initUploadToken();
    }

    public function getUploadDir()
    {
    }

    public function initUploadToken()
    {
        return $this->uploadToken = md5(uniqid('mod'));
    }

    private function setUploadToken($uploadToken)
    {
        $this->uploadToken = $uploadToken;
        return $this;
    }

    public function getUploadToken()
    {
        return $this->uploadToken;
    }

    public function setUploadPath()
    {
        $upload = '/upload/';
        $upload = strval($upload);
        return $upload;
    }
    public function getUploadPath()
    {
        $upload = '/upload/';
        $upload = strval($upload);
        return $upload;
    }

}