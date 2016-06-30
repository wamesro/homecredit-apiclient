<pre>
<?php
ERROR_REPORTING(E_ALL);
date_default_timezone_set('Europe/Prague');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/loader.php';

use Homecredit\Api as HCApi;

$instanceParams = [
    'language' => 'cz',
    'environment' => 'dev',
    'secret' => '',
    'shopId' => ''
];


$hcContract = new HCApi\IContract($instanceParams);

$ContractEntity = new HCApi\Entity\ContractEntity();
$ContractEntity->setOCode('123456789');
print_r($hcContract->getContract($ContractEntity));


echo "<br>";
$hcCalc = new HCApi\ICalc($instanceParams);

$CalcEntity = new HCApi\Entity\CalcEntity();
$CalcEntity->setOPrice('50199.15');
print_r($hcCalc->getCalcLink($CalcEntity));


echo "<br>";
$hcPrescoring = new HCApi\IPrescoring($instanceParams);

$PrescoringEntity = new HCApi\Entity\PrescoringEntity();
$PrescoringEntity->setRetUrl('http://www.your_return_url.com');
print_r($hcPrescoring->getPrescoringLink($PrescoringEntity));


echo "<br>";
$hcShop = new HCApi\IShop($instanceParams);

$ShopEntity = new HCApi\Entity\ShopEntity();
$ShopEntity->setOCode(123456789);
$ShopEntity->setOPrice(50199.15);
$ShopEntity->setCName('Jon');
$ShopEntity->setCSurname('Testtesttest');
$ShopEntity->setGName('Gtest');
$ShopEntity->setGProducer('TestCO');
$ShopEntity->setRetUrl('http://www.google.com');
print_r($hcShop->getShopLink($ShopEntity));
