<?php
namespace Homecredit\Api;

use Homecredit\Api\Client\SoapClient;
use Homecredit\Api\Entity\ContractEntity;
use Homecredit\Api\Entity\ContractResponseEntity;

class IContract extends SoapClient
{
    const HC_CONTRACT_ACTIVE = 'a';
    const HC_CONTRACT_REJECTED = 'd';
    const HC_CONTRACT_IRRECOVERABLE = 'h';
    const HC_CONTRACT_FINISHED = 'k';
    const HC_CONTRACT_IMMEDIATE_REPAY = 'l';
    const HC_CONTRACT_INPROGRESS_PREPARE = 'r';
    const HC_CONTRACT_ACCEPTED = 's';
    const HC_CONTRACT_CANCELED_EARLY = 't';
    const HC_CONTRACT_PAID_EARLY = 'u';
    const HC_CONTRACT_INPROGRESS_VERIFICATION = 'v';
    const HC_CONTRACT_INPROGRESS_RETURNED = 'z';

    /**
     * @var array
     */
    protected $urlSchema = [
        'dev' => [
            'cz' => 'https://i-shop.train.homecredit.cz/ws/bl/IShopContractWS/ishop.wsdl',
            'sk' => 'https://i-shop.train.homecredit.sk/ws/bl/IShopContractWS/ishop.wsdl'
        ],
        'production' => [
            'cz' => 'https://i-shop.homecredit.cz/ws/bl/IShopContractWS/ishop.wsdl',
            'sk' => 'https://i-shop.homecredit.sk/ws/bl/IShopContractWS/ishop.wsdl'
        ],
        'production_alternative' => [
            'cz' => 'https://i-shop.homecredit.net/ws/bl/IShopContractWS/ishop.wsdl',
            'sk' => 'https://i-shopsk.homecredit.net/ws/bl/IShopContractWS/ishop.wsdl'
        ]
    ];

    /**
     * Validate contract response hash
     * @param ContractResponseEntity $entity
     * @param string $hash - contract entity hash
     * @return mixed
     * TODO Check hash creating. Not working based on API documentation
     */
    public function validateContractResponseHash(ContractResponseEntity $entity, $hash)
    {
        $entity->setShop($this->shopId);
        $entity->setApiSecret($this->apiSecret);

        return $entity->getApiHash() === $hash ? true : false;
    }

    /**
     * Get information about client contract
     * @param ContractEntity $entity
     * @return mixed
     */
    public function getContract(ContractEntity $entity)
    {
        return parent::call('GetContract', $entity);
    }

    /**
     * Cancel client contract
     * @param ContractEntity $entity
     * @return mixed
     */
    public function cancelContract(ContractEntity $entity)
    {
        return parent::call('CancelContract', $entity);
    }

    /**
     * Get client shipping status
     * @param ContractEntity $entity
     * @return mixed
     */
    public function getShippingStatus(ContractEntity $entity)
    {
        return parent::call('GetShippingStatus', $entity);
    }

    /**
     * Set client shipping status
     * @param string $oCode - order number
     * @param string $shippingDate
     * @param string $hcEvid - loan number (not required)
     * @return mixed
     */
    public function setShippingStatus($oCode, $shippingDate, $hcEvid = null)
    {
        $queryParams = [
            'shop' => $this->shopId,
            'oCode' => $oCode,
            'hcEvid' => $hcEvid,
            'shippingDate' => $shippingDate
        ];

        return parent::call('SetShippingStatus', $queryParams);
    }

}
