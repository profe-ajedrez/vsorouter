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
     * send
     *
     * Sends the passed response with implementer content type
     *
     * @param InterfaceResponse $response
     * @return callable
     */
    public function send(InterfaceResponse $response) : void;
}
