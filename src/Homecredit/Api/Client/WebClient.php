<?php
/**
 * HomeCredit WEB API Client
 */
namespace Homecredit\Api\Client;

use Homecredit\Api\Exception\ClientException;
use Homecredit\Api\Facade\WebFacade;

class WebClient extends BaseClient
{
    /**
     * @inheritdoc
     */
    public function setClient()
    {
        if (!isset($this->urlSchema[$this->env]) && !isset($this->urlSchema[$this->env][$this->language])) {
            throw new ClientException('No HomeCredit API endpoint configuration defined!');
        }
        $url = $this->urlSchema[$this->env][$this->language];

        $this->client = new WebFacade($url);
    }
}
