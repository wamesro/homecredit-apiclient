<?php
/**
 * HomeCredit API Client interface
 */
namespace Homecredit\Api\Client;

interface ClientInterface
{
    /**
     * Set API client
     * @return void
     * @throws ClientException
     */
    public function setClient();

    /**
     * Get request HASH for calls
     * @param array $params - Parameters to prepare hash string
     * @return string
     * @throws ClientException
     */
    public function getHash(array $params);

    /**
     * Process Soap call
     * @param string $method
     * @param array $queryParams
     * @return mixed
     * @throws ClientException
     */
    public function call($method, $queryParams);

    /**
     * Checks if called method exists in method list array
     * @param string $method
     * @param array $methodList
     * @return bool
     * @throws ClientException
     */
    public function methodExists($method, array $methodList = []);

}
