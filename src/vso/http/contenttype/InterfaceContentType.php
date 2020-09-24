<?php declare(strict_types=1);

namespace vso\http\contenttype;

use \vso\http\response\InterfaceResponse;

interface InterfaceContentType
{
    /**
     * supportedContentType
     *
     * @return string
     */
    public function supportedContentType() : string;

    /**
     * contentTypeHandler
     *
     * @param InterfaceResponse $response
     * @return callable
     */
    public function contentTypeHandler(InterfaceResponse $response) : void;
}
