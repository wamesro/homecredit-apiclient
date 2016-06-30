<?php
namespace Homecredit\Api\Entity;

class ContractShippingEntity extends BaseEntity
{
    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var string Order ID
     * @required
     * @hash
     */
    protected $oCode = '';

    /**
     * @var string Order ID
     * @required
     * @hash
     */
    protected $shippingDate = '';

    /**
     * @return string
     */
    public function getOCode()
    {
        return $this->oCode;
    }

    /**
     * @param string $oCode
     */
    public function setOCode($oCode)
    {
        $this->oCode = $oCode;
    }

    /**
     * @return string
     */
    public function getShippingDate()
    {
        return $this->shippingDate;
    }

    /**
     * @param string $shippingDate
     */
    public function setShippingDate($shippingDate)
    {
        $this->shippingDate = $shippingDate;
    }

}
