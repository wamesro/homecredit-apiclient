<?php
namespace Homecredit\Api;

use Homecredit\Api as HCApi;

class IContractMock extends HCApi\IContract
{
    /**
     * @var array
     */
    protected $urlSchema = [
        'dev' => [
            'cz' => 'http://api.homecredit.local/ishop.wsdl',
            'sk' => 'http://api.homecredit.local/sk/ishop.wsdl'
        ],
        'production' => [
            'cz' => 'http://api.homecredit.local/ishop.wsdl',
            'sk' => 'http://api.homecredit.local/sk/ishop.wsdl'
        ],
        'production_alternative' => [
            'cz' => 'http://api.homecredit.local/ishop.wsdl',
            'sk' => 'http://api.homecredit.local/sk/ishop.wsdl'
        ]
    ];

}
