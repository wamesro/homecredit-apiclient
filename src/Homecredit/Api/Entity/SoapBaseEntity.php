<?php
namespace Homecredit\Api\Entity;

use Homecredit\Api\Exception\ClientException;
use Homecredit\Api\Entity\BaseEntity;

class SoapBaseEntity extends BaseEntity
{
    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var string Shop ID
     * @required
     * @hash
     */
    public $hcEvid = '';

    /**
     * @return string
     */
    public function getHcEvid()
    {
        return $this->hcEvid;
    }

    /**
     * @param string $hcEvid
     */
    public function setHcEvid($hcEvid)
    {
        $this->hcEvid = $hcEvid;
    }

}
