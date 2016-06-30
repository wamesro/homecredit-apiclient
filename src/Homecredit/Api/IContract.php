<?php
namespace Homecredit\Api;

use Homecredit\Api\Client\SoapClient;
use Homecredit\Api\Entity\ContractEntity;

class IContract extends SoapClient
{
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
     * Get information about client contract
     * @param string $oCode - order number
     * @param string $hcEvid - loan number (not required)
     * @return mixed
     */
    public function getContract(ContractEntity $entity)
    {
        return parent::call('GetContract', $entity);
    }

    /**
     * Cancel client contract
     * @param string $oCode - order number
     * @param string $hcEvid - loan number (not required)
     * @return mixed
     */
    public function cancelContract(ContractEntity $entity)
    {
        return parent::call('CancelContract', $entity);
    }

    /**
     * Get client shipping status
     * @param string $oCode - order number
     * @param string $hcEvid - loan number (not required)
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