<?php
/**
 * HomeCredit WEB API Client facade
 */
namespace Homecredit\Api\Facade;

class WebFacade
{
    /**
     * @var string
     */
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @param array $queryParams
     * @return string
     */
    public function GetLink(array $queryParams = [])
    {
        return sprintf(
            '%s?%s',
            $this->url,
            http_build_query($queryParams)
        );
    }
}
