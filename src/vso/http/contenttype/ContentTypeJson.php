<?php declare(strict_types=1);

namespace vso\http\contentType;

use vso\http\contenttype\InterfaceContentType;
use vso\http\response\InterfaceResponse;

final class ContentTypeJson implements InterfaceContentType
{
    protected int $jsonEncodeOptions;

    public function __construct(int $jsonEncodeOptions = JSON_THROW_ON_ERROR)
    {
        $this->jsonEncodeOptions = $jsonEncodeOptions;
    }

    public function send(InterfaceResponse $response) : void
    {
        $jsonResponse = $response->toJson($this->jsonEncodeOptions);
        header("HTTP/1.1 " . $response->httpStatusCode);
        header('Content-Type: ' . $this->supportedContentType());
        echo $jsonResponse;
    }

    public function supportedContentType(): string
    {
        return 'application/json';
    }
}
