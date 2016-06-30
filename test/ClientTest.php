<?php
ERROR_REPORTING(E_ALL);
require_once(__DIR__ . '/../src/loader.php');

use Homecredit\Api as HCApi;

class IShopContractTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var HCApi\IShop
     */
    private $iShop;

    /**
     * @var HCApi\iContract
     */
    private $iContract;

    /**
     * @var string
     */
    private $shop = 'your_shopid';

    /**
     * @var string
     */
    private $secret = 'your_hash';

    /**
     * @var string
     */
    private $language = 'cz';

    /**
     * @var string
     */
    private $environment = 'dev';

    /**
     * @var int
     */
    private $trace = 1;

    /**
     * @var int
     */
    private $exception = 1;

    public function __construct()
    {
        $instanceParams = [
            'language' => $this->language,
            'environment' => $this->environment,
            'trace' => $this->trace,
            'exception' => $this->exception,
            'secret' => $this->secret,
            'shopId' => $this->shop
        ];

        $this->iShop = new HCApi\IShop($instanceParams);
        $this->iContract = new HCApi\IContract($instanceParams);
    }

    public function testGetContract()
    {
        $contractId = '123456789';

        $ContractEntity = new HCApi\Entity\ContractEntity();
        $ContractEntity->setOCode($contractId);
        $result = $this->iContract->getContract($ContractEntity);

        $this->assertEquals($result->hcoCode, $contractId);
    }

}
