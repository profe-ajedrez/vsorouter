<?php declare(strict_types=1);

namespace vso\http\response;

use stdClass;
use vso\vsoutils\arrayutils\InterfaceToArray;
use vso\http\contenttype\InterfaceContentType;

/**
 * BaseResponse
 *
 * @author Andrés Reyes a.k.a. Undercoder a.k.a. Jacobopus <chess.coach.ar@gmail.com>
 *
 * Is a basic response to be sended to the user agent
 */
class BaseResponse implements InterfaceResponse, InterfaceToArray
{
    protected int $httpStatusCode;
    protected string $msg;
    protected Object $data;
    protected InterfaceContentType $contentType;


    /**
     * __construct
     *
     * @param integer $code
     * @param string $msg
     * @param Object $data
     * @param string $contentType
     */
    public function __construct(
        int $code,
        InterfaceContentType $contentType,
        string $msg = '',
        Object $data = null
    ) {
        $this->httpStatusCode  = $code;
        $this->msg = $msg;
        if ($data === null) {
            $data = $this->defaultDataValue();
        }

        $this->data = $data;
        $this->contentType = $contentType;
    }

    
    public function __get(string $propertyName)
    {
        switch ($propertyName) {
            case 'httpStatusCode':
                return $this->httpStatusCode;
                break;
            case 'msg':
                return $this->msg;
                break;
            case 'contentType':
                return $this->contentType;
                break;
            default:
                throw new \Exception('Undefined property ' . $propertyName . ' in class ' . __CLASS__);
                break;
        }
    }


    public function setContentType(InterfaceContentType $contentType)
    {
        if (is_null($contentType)) {
            throw new \InvalidArgumentException(
                'Null provided when InterfaceContentType Argument expected in ' .
                __CLASS__ . '::setContentType()'
            );
        }
        $this->contentType = $contentType;
    }


    public function supportedContentType() : string
    {
        return $this->contentType->supportedContentType();
    }


    public function toArray() : array
    {
        return [
            'msg' => $this->msg,
            'httpStatusCode' => $this->httpStatusCode,
            'data' => $this->data,
            'content-type' => $this->supportedContentType()
        ];
    }


    public function toJson(int $flags = JSON_THROW_ON_ERROR) : string
    {
        $tmpJson = json_encode($this->toArray(), $flags);
        if (json_last_error() === JSON_ERROR_NONE) {
            return (string) $tmpJson;
        }
        return "{}";
    }


    public function send() : void
    {
        $this->contentType->send($this);
    }


    public function getClass() : string
    {
        return __CLASS__;
    }

    private function defaultDataValue() : stdClass
    {
        return new stdClass();
    }
}
