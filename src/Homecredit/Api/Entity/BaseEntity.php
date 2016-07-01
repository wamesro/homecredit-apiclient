<?php
namespace Homecredit\Api\Entity;

use Homecredit\Api\Exception\ClientException;
use DocBlockReader\Reader as AnnotationReader;

class BaseEntity
{
    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var string Hash
     */
    protected $apiSecret = '';

    /**
     * @var string Shop ID
     * @required
     * @hash first
     */
    public $shop = '';

    /**
     * @var \DateTime request date-time
     * @required
     * @hash
     */
    public $time_request = '';


    /**
     * IShopEntity constructor.
     */
    public function __construct()
    {
        date_default_timezone_set("Europe/Prague");
        $this->time_request = date('d.m.Y-H:i:s', time());
    }

    /**
     * Convert entity to array
     * @return array
     */
    public function toArray()
    {
        $el = get_object_vars($this);
        unset($el['apiSecret']);

        return (array)$el;
    }

    /**
     * Prepare hash string for request verification
     * @return string
     * @throws ClientException
     */
    public function getApiHash()
    {
        if (!$this->shop) {
            throw new ClientException('No HomeCredit API Shop ID defined!');
        }

        if (!$this->apiSecret) {
            throw new ClientException('No HomeCredit API Secret string defined!');
        }

        $hashArray = [];
        $hashArrayFirst = [];
        $hashArrayLast = [];
        $reflectionClass = new \ReflectionClass(get_class($this));

        foreach ($reflectionClass->getProperties() as $property) {
            $reader = new AnnotationReader($property->class, $property->name, 'property');

            if ((boolean)$reader->getParameter("hash")) {
                switch ((string)$reader->getParameter("hash")) {
                    case 'first':
                        $hashArrayFirst = [$property->name => $this->{$property->name}];
                        break;
                    case 'last':
                        $hashArrayLast = $hashArray + [$property->name => $this->{$property->name}];
                        break;
                    default:
                        $hashArray[$property->name] = $this->{$property->name};
                        break;
                }
            }
        }

        $hashArray = $hashArrayFirst + $hashArray + $hashArrayLast;

        $hashString = sprintf(
            '%s%s',
            implode('', $hashArray),
            $this->apiSecret
        );

        return md5($hashString);
    }


    /**
     * @return string
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    /**
     * @param string $apiSecret
     */
    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return string
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @param string $shop
     */
    public function setShop($shop)
    {
        $this->shop = $shop;
    }

    /**
     * @return \DateTime
     */
    public function getTimeRequest()
    {
        return $this->time_request;
    }

    /**
     * @param \DateTime $time_request
     */
    public function setTimeRequest($time_request)
    {
        $this->time_request = $time_request;
    }

}
