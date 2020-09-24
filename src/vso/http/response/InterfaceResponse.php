<?php declare(strict_types=1);

namespace vso\http\response;

/**
 * InterfaceResponse
 *
 */
interface InterfaceResponse
{
    /**
     * toJson
     *
     * @param int $flags  json_encode flags separated by tube [|] @see https://www.php.net/manual/es/json.constants.php
     * @return string'
     */
    public function toJson(int $flags = JSON_THROW_ON_ERROR) : string;


    /**
     * send
     *
     * sends the response
     *
     * @return void
     * @throws \RuntimeException
     */
    public function send() : void;

    /**
     * supportedContentTypes
     *
     * Returns a string with this response supported content type
     *
     * @return string[]
     */
    public function supportedContentType() : string;

    /**
     * get_class
     *
     * Normally you dont need to implement this
     *
     * @return string
     */
    public function getClass() : string;
}
