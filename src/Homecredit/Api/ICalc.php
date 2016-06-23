<?php
namespace Homecredit\Api;

use Homecredit\Api\Client\WebClient;

class ICalc extends WebClient
{
    /**
     * @var array
     */
    protected $urlSchema = [
        'dev' => [
            'cz' => 'https://i-calc.train.homecredit.cz/icalc/entry.do',
            'sk' => 'https://i-calc.train.homecredit.sk/icalc/entry.do'
        ],
        'production' => [
            'cz' => 'https://i-calc.homecredit.cz/icalc/entry.do',
            'sk' => 'https://i-calc.homecredit.sk/icalc/entry.do'
        ],
        'production_alternative' => [
            'cz' => 'https://i-calc.homecredit.net/icalc/entry.do',
            'sk' => 'https://i-calcsk.homecredit.net/icalc/entry.do'
        ]
    ];

    /**
     * Create a link to iCalc with predefined product price
     * @param double $oPrice - product price
     * @param array $productSet - product name
     * @return mixed
     */
    public function getCalcLink($oPrice, array $productSet = [])
    {
        $queryParams = [
            'shop' => $this->shopId,
            'o_price' => $oPrice,
            'product_set' => implode(',', $productSet),
            'time_request' => date('d.m.Y-H:i:s', time())
        ];

        return parent::call('GetLink', $queryParams);
    }

}
