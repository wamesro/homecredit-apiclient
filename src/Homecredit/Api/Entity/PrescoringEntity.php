<?php
namespace Homecredit\Api\Entity;

class PrescoringEntity extends BaseEntity
{
    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var string product set
     * @hash last
     */
    protected $ret_url;

    /**
     * @return string
     */
    public function getRetUrl()
    {
        return $this->ret_url;
    }

    /**
     * @param string $ret_url
     */
    public function setRetUrl($ret_url)
    {
        $this->ret_url = $ret_url;
    }

}
