<?php
namespace Homecredit\Api;

use Homecredit\Api\Client\WebClient;
use Homecredit\Api\Entity\ShopEntity;

class IShop extends WebClient
{
    const HC_CONTRACT_ACCEPTED = 'Y';
    const HC_CONTRACT_REJECTED = 'N';
    const HC_CONTRACT_INPROGRESS = 'L';

    /**
     * @var array
     */
    protected $urlSchema = [
        'dev' => [
            'cz' => 'https://i-shop.train.homecredit.cz/ishop/entry.do',
            'sk' => 'https://i-shop.train.homecredit.sk/ishop/entry.do'
        ],
        'production' => [
            'cz' => 'https://i-shop.homecredit.cz/ishop/entry.do',
            'sk' => 'https://i-shopsk.homecredit.net/ishop/entry.do'
        ],
        'production_alternative' => [
            'cz' => 'https://i-shop.homecredit.net/ishop/entry.do',
            'sk' => 'https://i-shopsk.homecredit.net/ishop/entry.do'
        ]
    ];

    /**
     * Create a link to iShop endpoint
     * @param ShopEntity $entity
     * @return mixed
     */
    public function getShopLink(ShopEntity $entity)
    {
        return parent::call('GetLink', $entity);
    }

}
