<?php declare(strict_types=1);

namespace vso\http\response;

interface InterfaceHttpResponseCodes
{
    const CONTINUE_100                             = '100';
    const SWITCHING_PROTOCOLS_101                  = '101';
    const PROCESSING_102                           = '102';
    const OK_200                                   = '200';
    const OK_CREATED_201                           = '201';
    const ACCEPTEP_202                             = '202';
    const NON_AUTHORITATIVE_INFORMATION_203        = '203';
    const NO_CONTENT_204                           = '204';
    const RESET_CONTENT_205                        = '205';
    const PARTIAL_CONTENT_206                      = '206';
    const MULTI_STATUS_207                         = '207';
    const ALREADY_REPORTED_208                     = '208';
    const IM_USED_226                              = '226';
    const MULTIPLE_CHOICES_300                     = '300';
    const MOVED_PERMANENTLY_301                    = '301';
    const FOUND_302                                = '302';
    const SEE_OTHER_303                            = '303';
    const NOT_MODIFIED_304                         = '304';
    const USE_PROXY_305                            = '305';
    const TEMPORARY_REDIRECTION_307                = '307';
    const PERMANENT_REDIRECT_308                   = '308';
    const BAD_REQUEST_400                          = '400';
    const UNAUTHORIZED_401                         = '401';
    const PAYMENT_REQUIRED_402                     = '402';
    const FORBIDDEN_403                            = '403';
    const NOT_FOUND_404                            = '404';
    const METHOD_NOT_ALLOWED_405                   = '405';
    const NOT_ACCEPTABLE_406                       = '406';
    const PROXY_AUTH_REQUIRED_407                  = '407';
    const REQUEST_TIMEOUT_408                      = '408';
    const CONFLICT_409                             = '409';
    const GONE_410                                 = '410';
    const LENGTH_REQUIRED_411                      = '411';
    const PRECONDITION_FAILED_412                  = '412';
    const PAYLOAD_TOO_LARGE_413                    = '413';
    const REQUEST_URI_TOO_LONG_414                 = '414';
    const UNSUPPORTED_MEDIA_TYPE_415               = '415';
    const REQUESTED_RANGE_NOT_SATISFIABLE_416      = '416';
    const EXPECTATION_FAILED_417                   = '417';
    const TEAPOT_418                               = '418';
    const MISDIRECTED_421                          = '421';
    const UNPROCESSABLE_ENTITY_422                 = '422';
    const LOCKED_423                               = '423';
    const FAILED_DEPENDENCY_424                    = '424';
    const UPGRADE_REQUIRED_426                     = '426';
    const PRECONDITION_REQUIRED_428                = '428';
    const TOO_MANY_REQUEST_429                     = '429';
    const REQUEST_HEADER_FIELDS_TOO_LARGE_431      = '431';
    const CONNECTION_CLOSED_WITHOPOUT_RESPONSE_444 = '444';
    const UNAVAILABLE_FOR_LEGAL_451                = '451';
    const CLIENT_CLOSED_REQUESTE_499               = '499';
    const INTERNAL_SERVER_ERROR_500                = '500';
    const NOT_IMPLEMENTED_501                      = '501';
    const BAD_GATEWAY_502                          = '502';
    const SERVICE_UNAVAILABLE_503                  = '503';
    const GATEWAY_TIMEOUT_504                      = '504';
    const HTTP_VERSION_NOT_SUPPORTED_505           = '505';
    const VARIANT_ALSO_NEGOTIATES_506              = '506';
    const INSUFFICIENT_STORAGE_507                 = '507';
    const LOOP_DETECTED_508                        = '508';
    const NOT_EXTENDED_510                         = '510';
    const NET_AUTH_REQUIRED_511                    = '511';
    const NET_CONNECT_AUTH_ERROR_599               = '599';


    const CODES = [
        InterfaceHttpResponseCodes::CONTINUE_100,
        InterfaceHttpResponseCodes::SWITCHING_PROTOCOLS_101,
        InterfaceHttpResponseCodes::PROCESSING_102,
        InterfaceHttpResponseCodes::OK_200,
        InterfaceHttpResponseCodes::OK_CREATED_201,
        InterfaceHttpResponseCodes::ACCEPTEP_202,
        InterfaceHttpResponseCodes::NON_AUTHORITATIVE_INFORMATION_203,
        InterfaceHttpResponseCodes::NO_CONTENT_204,
        InterfaceHttpResponseCodes::RESET_CONTENT_205,
        InterfaceHttpResponseCodes::PARTIAL_CONTENT_206,
        InterfaceHttpResponseCodes::MULTI_STATUS_207,
        InterfaceHttpResponseCodes::ALREADY_REPORTED_208,
        InterfaceHttpResponseCodes::IM_USED_226,
        InterfaceHttpResponseCodes::MULTIPLE_CHOICES_300,
        InterfaceHttpResponseCodes::MOVED_PERMANENTLY_301,
        InterfaceHttpResponseCodes::FOUND_302,
        InterfaceHttpResponseCodes::SEE_OTHER_303,
        InterfaceHttpResponseCodes::NOT_MODIFIED_304,
        InterfaceHttpResponseCodes::USE_PROXY_305,
        InterfaceHttpResponseCodes::TEMPORARY_REDIRECTION_307,
        InterfaceHttpResponseCodes::PERMANENT_REDIRECT_308,
        InterfaceHttpResponseCodes::BAD_REQUEST_400,
        InterfaceHttpResponseCodes::UNAUTHORIZED_401,
        InterfaceHttpResponseCodes::PAYMENT_REQUIRED_402,
        InterfaceHttpResponseCodes::FORBIDDEN_403,
        InterfaceHttpResponseCodes::NOT_FOUND_404,
        InterfaceHttpResponseCodes::METHOD_NOT_ALLOWED_405,
        InterfaceHttpResponseCodes::NOT_ACCEPTABLE_406,
        InterfaceHttpResponseCodes::PROXY_AUTH_REQUIRED_407,
        InterfaceHttpResponseCodes::REQUEST_TIMEOUT_408,
        InterfaceHttpResponseCodes::CONFLICT_409,
        InterfaceHttpResponseCodes::GONE_410,
        InterfaceHttpResponseCodes::LENGTH_REQUIRED_411,
        InterfaceHttpResponseCodes::PRECONDITION_FAILED_412,
        InterfaceHttpResponseCodes::PAYLOAD_TOO_LARGE_413,
        InterfaceHttpResponseCodes::REQUEST_URI_TOO_LONG_414,
        InterfaceHttpResponseCodes::UNSUPPORTED_MEDIA_TYPE_415,
        InterfaceHttpResponseCodes::REQUESTED_RANGE_NOT_SATISFIABLE_416,
        InterfaceHttpResponseCodes::EXPECTATION_FAILED_417,
        InterfaceHttpResponseCodes::TEAPOT_418,
        InterfaceHttpResponseCodes::MISDIRECTED_421,
        InterfaceHttpResponseCodes::UNPROCESSABLE_ENTITY_422,
        InterfaceHttpResponseCodes::LOCKED_423,
        InterfaceHttpResponseCodes::FAILED_DEPENDENCY_424,
        InterfaceHttpResponseCodes::UPGRADE_REQUIRED_426,
        InterfaceHttpResponseCodes::PRECONDITION_REQUIRED_428,
        InterfaceHttpResponseCodes::TOO_MANY_REQUEST_429,
        InterfaceHttpResponseCodes::REQUEST_HEADER_FIELDS_TOO_LARGE_431,
        InterfaceHttpResponseCodes::CONNECTION_CLOSED_WITHOPOUT_RESPONSE_444,
        InterfaceHttpResponseCodes::UNAVAILABLE_FOR_LEGAL_451,
        InterfaceHttpResponseCodes::CLIENT_CLOSED_REQUESTE_499,
        InterfaceHttpResponseCodes::INTERNAL_SERVER_ERROR_500,
        InterfaceHttpResponseCodes::NOT_IMPLEMENTED_501,
        InterfaceHttpResponseCodes::BAD_GATEWAY_502,
        InterfaceHttpResponseCodes::SERVICE_UNAVAILABLE_503,
        InterfaceHttpResponseCodes::GATEWAY_TIMEOUT_504,
        InterfaceHttpResponseCodes::HTTP_VERSION_NOT_SUPPORTED_505,
        InterfaceHttpResponseCodes::VARIANT_ALSO_NEGOTIATES_506,
        InterfaceHttpResponseCodes::INSUFFICIENT_STORAGE_507,
        InterfaceHttpResponseCodes::LOOP_DETECTED_508,
        InterfaceHttpResponseCodes::NOT_EXTENDED_510,
        InterfaceHttpResponseCodes::NET_AUTH_REQUIRED_511,
        InterfaceHttpResponseCodes::NET_CONNECT_AUTH_ERROR_599
    ];
}
