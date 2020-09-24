<?php declare(strict_types=1);

namespace vso\http\contenttype;

abstract class BaseContentType implements InterfaceContentType
{
    protected string $contentType;
    

    

    public function __construct(string $contentType)
    {
        if (empty($contentType)) {
            throw new \RuntimeException('Content/type expected in class ' . __CLASS__);
        }

        $validType = preg_match(
            "/^(?!\/)[^\/\\\"\'\!\¡\¿\?\#\*\+\$\%\&\)\=\[\]\{\}]+\/(?!\/)[^\/\\\"\'\!\¡\¿\?\*\+\#\$\%\&\)\=\[\]\{\}]+$/",
            $contentType
        );
        if ($validType) {
            $this->contentType = $contentType;
        } else {
            throw new \RuntimeException('Provided ' . $contentType .
            ' doesnt follows mime/type pattern in class' . __CLASS__);
        }
    }

    public function supportedContentType() : string
    {
        return $this->contentType;
    }
}
