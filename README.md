# HomeCredit PHP API Client Beta
#### for HomeCredit API ver. 3.17

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

$client = new HCApi\IShop([
  'language' => $this->postParams->getParam('language', 'string'),
  'environment' => $this->clientEnv,
  'secret' => $this->postParams->getParam('secret', 'string'),
  'shopId' => $this->postParams->getParam('shopId', 'integer')
]);

$client->getContract(
  $this->postParams->getParam('contractId', 'string')
);
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
