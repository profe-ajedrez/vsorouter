<?php declare(strict_types=1);

namespace vso\http\contentType;

use vso\http\contenttype\BaseContentType;
use vso\http\contenttype\InterfaceContentType;
use vso\http\response\InterfaceResponse;

class ContentTypeJson extends BaseContentType implements InterfaceContentType
{
    protected int $jsonEncodeOptions;

    public function __construct(int $jsonEncodeOptions = JSON_THROW_ON_ERROR)
    {
        $this->jsonEncodeOptions = $jsonEncodeOptions;
        parent::__construct('application/json');
    }

    public function contentTypeHandler(InterfaceResponse $response) : void
    {
        $jsonResponse = $response->toJson($this->jsonEncodeOptions);
        header("HTTP/1.1 " . $response->httpStatusCode);
        header('Content-Type: ' . $this->contentType);
        echo $jsonResponse;
    }
}
