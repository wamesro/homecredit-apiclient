<?php
/**
 * HomeCredit API Client
 */
namespace Homecredit\Api\Client;

use Phplib\Helpers\Params;
use Homecredit\Api\Exception\ClientException;
use Homecredit\Api\Entity\BaseEntity;

abstract class BaseClient implements ClientInterface
{
    /**
     * homeCredit API Secret key for communication
     * @var string
     */
    public $apiSecret;

    /**
     * @var string
     */
    public $env;

    /**
     * @var string
     */
    public $language;

    /**
     * @var Params
     */
    public $params;

    /**
     * @var SoapClient
     */
    public $client;

    /**
     * @var HomeCredit shop ID
     */
    public $shopId;

    /**
     * BaseClient constructor.
     * @param array $arguments
     */
    public function __construct(array $arguments)
    {
        $this->params = new Params(isset($arguments) ? $arguments : []);

        $this->shopId = $this->params->getParam('shopId', 'string');
        $this->env = $this->params->getParam('environment', 'string');
        $this->language = $this->params->getParam('language', 'string');
        $this->apiSecret = $this->params->getParam('secret', 'string');

        $this->setClient();
    }

    /**
     * @inheritdoc
     */
    public function setClient()
    {
        $this->client = new \stdClass();
    }

    /**
     * @inheritdoc
     * @throws ClientException
     */
    public function call($method, BaseEntity $entity)
    {
        $entity->setShop($this->shopId);
        $entity->setApiSecret($this->apiSecret);

        if ($this->methodExists($method, get_class_methods($this->client))) {
            $response = $this->client->{$method}(
                array_merge(
                    $entity->toArray(),
                    ['sh' => $entity->getApiHash()]
                )
            );
        } else {
            throw new ClientException('Called method dosn`t exists in client');
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public function methodExists($method, array $methodList = [])
    {
        foreach ($methodList as $a) {
            if (strstr($a, $method)) {
                return true;
            }
        }
        return false;
    }
}
