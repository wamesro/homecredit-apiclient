<pre>
<?php
ERROR_REPORTING(E_ALL);
date_default_timezone_set('UTC');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/loader.php';

use Homecredit\Api as HCApi;

$shop = '1234';
$hash = 'sometesthash';


$hcContract = new HCApi\IShop([
    'language' => 'cz',
    'environment' => 'dev',
    'secret' => $hash,
    'shopId' => $shop
]);
print_r($hcContract->getContract('123456789'));


$hcCalc = new HCApi\ICalc([
    'language' => 'cz',
    'environment' => 'dev',
    'secret' => $hash,
    'shopId' => $shop
]);
print_r($hcCalc->getCalcLink('50199.15'));

echo "<br>";

$hcPrescoring = new HCApi\IPrescoring([
    'language' => 'cz',
    'environment' => 'dev',
    'secret' => $hash,
    'shopId' => $shop
]);
print_r($hcPrescoring->getPrescoringLink('http://www.your_return_url.com'));
