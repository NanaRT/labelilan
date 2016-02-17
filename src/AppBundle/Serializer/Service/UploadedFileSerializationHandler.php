<?php

namespace AppBundle\Serializer\Service;

use Fabzat\OutilprodBundle\Entity\UploadedFileEntity;
use Fabzat\OutilprodBundle\Entity\Filespath;
use Fabzat\OutilprodBundle\Entity\Zip;
use JMS\Serializer\Context;
use JMS\Serializer\JsonSerializationVisitor;
use Symfony\Component\HttpFoundation\RequestStack;

class UploadedFileSerializationHandler
{
    /**
     * @var RequestStack
     */
    private $requestStack;
    /**
     *
     * @param JsonSerializationVisitor $visitor
     */
    private $visitor;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function getAbsolutePath(JsonSerializationVisitor $visitor, UploadedFileEntity $file, array $type, Context $context)
    {
        if($file->getFile() instanceof Image) {
            /** @var $file Image */
            $image = $file->getFile();
        }
        return isset($file) && !empty($filepath) ? $this->requestStack->getCurrentRequest()->getSchemeAndHttpHost() . '/' . $filePath : null;
    }
}