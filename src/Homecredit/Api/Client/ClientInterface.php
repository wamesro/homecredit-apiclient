<?php
/**
 * HomeCredit API Client interface
 */
namespace Homecredit\Api\Client;

use Homecredit\Api\Entity\BaseEntity;

interface ClientInterface
{
    /**
     * Set API client
     * @return void
     * @throws ClientException
     */
    public function setClient();

    /**
     * Process Soap call
     * @param string $method
     * @param array $queryParams
     * @return mixed
     * @throws ClientException
     */
    public function call($method, BaseEntity $entity);

    /**
     * Checks if called method exists in method list array
     * @param string $method
     * @param array $methodList
     * @return bool
     * @throws ClientException
     */
    public function methodExists($method, array $methodList = []);
}
