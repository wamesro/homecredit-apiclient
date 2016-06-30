<?php
namespace Homecredit\Api\Entity;

class ContractEntity extends SoapBaseEntity
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

}
