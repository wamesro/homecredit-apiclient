# HomeCredit PHP API Client Beta
#### for HomeCredit API ver. 3.17

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/creoLIFE/homecredit-apiclient/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/creoLIFE/homecredit-apiclient/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/creoLIFE/homecredit-apiclient/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/creoLIFE/homecredit-apiclient/?branch=master)
<img src="https://travis-ci.org/creoLIFE/homecredit-apiclient.svg?branch=master"/>

HomeCredit.cz PHP API Client it's a simple wrapper for HomeCredit API which simplify communication with it.

## Configuration
### Downloading client
#### composer.json
```
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/creoLIFE/homecredit-apiclient"
  }
],
"require": {
  "creoLIFE/homecredit-apiclient": "0.1.*"
},
````

### instancing client
```
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
$result = $hcContract->getContract($ContractEntity);

```

Client needs right shop ID number and API hash which is delivered by HomeCredit.cz after you sign in contract.

## Modules
### iShop
#### Contract methods
##### getContract()
- Checks the details of the contract (request) sent by customer to HomeCredit
##### cancelContract()
- Cancel the contract (request) sent by customer to HomeCredit
##### getShippingStatus()
- Recieve shipping statius
##### setShippingStatus()
- Set shipping statius


#### iCalc
##### Calc methods
###### getCalcLink()
- Create a link to iCalc with predefined product price


#### iPrescoring
##### Prescoring methods
###### getPrescoringLink()
- Create a link to iPrescoring form with predefined backward url link






HomeCredit is a registered trademark of Home Credit a.s.
