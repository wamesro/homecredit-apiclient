<?php
/**
 * HomeCredit SOAP API Client
 */
namespace Homecredit\Api\Client;

use Homecredit\Api\Exception\ClientException;

class SoapClient extends BaseClient
{
    /**
     * Set SoapClient for WSDL calls
     * @return SoapClient
     * @throws ClientException
     */
    public function setClient()
    {
        if (!isset($this->urlSchema[$this->env]) && !isset($this->urlSchema[$this->env][$this->language])) {
            throw new ClientException('No HomeCredit API endpoint configuration defined. Please check "env" and "languge" parameters in Client instance.');
        }

        $wsdl = $this->urlSchema[$this->env][$this->language];
        $url = str_replace('.wsdl', '', $wsdl);
        $this->client = new \SoapClient($wsdl,
            [
                'uri' => $url,
                'location' => $url,
                'stream_context' => $this->env === 'dev' ? self::getSoapClientDevContext() : self::getSoapClientProductionContext(),
                'trace' => $this->params->getParam('trace', 'integer'),
                'exception' => $this->params->getParam('exception', 'integer')
            ]
        );
        $this->client->__setLocation(str_replace('.wsdl', '', $url));

        if (!isset($this->client)) {
            throw new ClientException('No HomeCredit API Client instance available.');
        }
    }

    /**
     * @inheritdoc
     */
    public function call($method, $queryParams)
    {
        //Prepare hash string
        $hash = $this->getHash($queryParams);

        if ($this->methodExists($method, $this->client->__getFunctions())) {
            try {
                $response = $this->client->{$method}(
                    array_merge(
                        $queryParams,
                        ['sh' => $hash]
                    )
                );
            } catch (\SoapFault $e) {
                throw new ClientException(
                    sprintf(
                        'Homecredit API Exception: %s',
                        $e->getMessage()
                    )
                );
            }
        } else {
            throw new ClientException('Called method dosn`t exists in client');
        }

        return $response;
    }

    /**
     * Create contect for SoapClient for development environment
     * @return resource
     */
    private function getSoapClientDevContext()
    {
        return stream_context_create([
            'ssl' => [
                // set some SSL/TLS specific options
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);
    }

    /**
     * Create contect for SoapClient for production and stage environment
     * @return resource
     */
    private function getSoapClientProductionContext()
    {
        return stream_context_create([
            'ssl' => [
                // set some SSL/TLS specific options
                'verify_peer' => true,
                'verify_peer_name' => true,
                'allow_self_signed' => false
            ]
        ]);
    }
}
