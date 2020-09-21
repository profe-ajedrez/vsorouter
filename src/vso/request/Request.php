<?php declare(strict_types=1);
namespace vso\requests;

use vso\utils\StringUtils;

/**
 *
 * @author jacob
 *
 *
 * @property {string} $requestMethod
 */
class Request implements InterfaceRequest, InterfaceMethod
{

    protected $settings = [];

    /**
     */
    public function __construct($serverRef)
    {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = false;

        $this->bootstrap($serverRef);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \vso\requests\InterfaceRequest::getBody()
     */
    public function getBody()
    {
        return RequestMethodFactory::getMethod(
            $this->requestMethod,
            $this,
            $this
        );
    }


    public function setSanitizeSpecialCharsON()
    {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = true;
    }

    public function setSanitizeSpecialCharsOFF()
    {
        $this->settings['SANITIZE_SPECIAL_CHARS'] = false;
    }

    protected function bootstrap($serverRef)
    {
        foreach($serverRef as $key => $value)
        {
            $this->{StringUtils::toCamelCase($key)} = $value;
        }
    }





    protected function buildBody(array $reqArray = [])
    {
        $body = array();
        foreach($reqArray as $key => $value)
        {
            if ($this->settings['SANITIZE_SPECIAL_CHARS']) {
                $value = filter_input(INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            $body[$key] = $value;
        }

        return $body;
    }


    public function response(int $status, string $statusMessage, $data = null)
    {
        header("HTTP/1.1 " . $status);
        $response['status'] = $status;
        $response['status_message'] = $statusMessage;
        $response['data'] = $data;

        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    }


    public function patch(InterfaceRequest $request)
    {}

    public function post(InterfaceRequest $request)
    {
        return $this->buildBody($_POST);
    }

    public function get(InterfaceRequest $request)
    {}

    public function delete(InterfaceRequest $request)
    {}

    public function put(InterfaceRequest $request)
    {}


}

