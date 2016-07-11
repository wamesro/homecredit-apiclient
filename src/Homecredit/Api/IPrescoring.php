<?php
namespace Homecredit\Api;

use Homecredit\Api\Client\WebClient;
use Homecredit\Api\Entity\PrescoringEntity;

class IPrescoring extends WebClient
{
    /**
     * @var array
     */
    protected $urlSchema = [
        'dev' => [
            'cz' => 'https://i-shop.train.homecredit.cz/ishop/prescoring',
            'sk' => 'https://i-shop.train.homecredit.sk/ishop/prescoring'
        ],
        'production' => [
            'cz' => 'https://i-shop.homecredit.cz/ishop/prescoring',
            'sk' => 'https://i-shop.homecredit.sk/ishop/prescoring'
        ],
        'production_alternative' => [
            'cz' => 'https://i-shop.homecredit.net/ishop/prescoring',
            'sk' => 'https://i-shopsk.homecredit.net/ishop/prescoring'
        ]
    ];

    /**
     * Create a link to iPrescoring form with predefined backward url link
     * @param PrescoringEntity $entity
     * @return mixed
     */
    public function getPrescoringLink(PrescoringEntity $entity)
    {
        return parent::call('GetLink', $entity);
    }

}
