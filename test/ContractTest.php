<?php
ERROR_REPORTING(E_ALL);
require_once(__DIR__ . '/../src/loader.php');

use Homecredit\Api as HCApi;

class IShopContractTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var HCApi\iShop
     */
    private $ishop;

    /**
     * @var string
     */
    private $shop = '0123';

    /**
     * @var string
     */
    private $secret = 'sometesthash';

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
        $this->ishop = new HCApi\IShop([
            'language' => $this->language,
            'environment' => $this->environment,
            'trace' => $this->trace,
            'exception' => $this->exception,
            'secret' => $this->secret,
            'shopId' => $this->shop
        ]);
    }

    public function testGetContract()
    {
        $result = $this->ishop->getContract('123456789');
        $this->assertEquals($result->hcoCode, '123456789');
    }

}
