<?php
namespace Homecredit\Api\Entity;

class ContractResponseEntity extends SoapBaseEntity
{
    //Contract statuses
    const HC_RET_ACCEPTED = 'Y'; // Accepted
    const HC_RET_REJECTED = 'N'; // Immediately rejected
    const HC_RET_WAITING = 'L'; // Waiting for extra action

    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var string Homecredit contract status - see const section
     * @required
     * @hash
     */
    protected $hc_ret = self::HC_RET_WAITING;

    /**
     * @var string Order ID
     * @required
     * @hash
     */
    protected $hc_o_code;

    /**
     * @var string Evid ID
     * @required
     * @hash
     */
    public $hc_evid = '';

    /**
     * @var string Client name
     * @required
     * @hash
     */
    protected $c_name = '';

    /**
     * @var string Client surname
     * @required
     * @hash
     */
    protected $c_surname;

    /**
     * @var string Client surname
     * @required
     * @hash
     */
    protected $c_title;

    /**
     * @var string Contact address - Street
     * @hash
     */
    protected $c_c_street;

    /**
     * @var string Contact address - house/flat number
     * @hash
     */
    protected $c_c_num;

    /**
     * @var string Contact address - City
     * @hash
     */
    protected $c_c_city;

    /**
     * @var string Contact address - ZIP code
     * @hash
     */
    protected $c_c_zip;


    //Not used

    /**
     * @var string not used
     */
    public $hcEvid = '';

    /**
     * @var string Shop ID
     */
    public $shop = '';

    /**
     * @var \DateTime request date-time
     */
    public $time_request = '';

    /**
     * @var \DateTime request date-time
     */
    public $apiSecret = '';

    /**
     * @return string
     */
    public function getHcRet()
    {
        return $this->hc_ret;
    }

    /**
     * @param string $hc_ret
     */
    public function setHcRet($hc_ret)
    {
        $this->hc_ret = $hc_ret;
    }

    /**
     * @return string
     */
    public function getHcOCode()
    {
        return $this->hc_o_code;
    }

    /**
     * @param string $hc_o_code
     */
    public function setHcOCode($hc_o_code)
    {
        $this->hc_o_code = $hc_o_code;
    }

    /**
     * @return string
     */
    public function getHcSh()
    {
        return $this->hc_sh;
    }

    /**
     * @param string $hc_sh
     */
    public function setHcSh($hc_sh)
    {
        $this->hc_sh = $hc_sh;
    }

    /**
     * @return string
     */
    public function getHcEvid()
    {
        return $this->hc_evid;
    }

    /**
     * @param string $hc_evid
     */
    public function setHcEvid($hc_evid)
    {
        $this->hc_evid = $hc_evid;
    }

    /**
     * @return string
     */
    public function getCName()
    {
        return $this->c_name;
    }

    /**
     * @param string $c_name
     */
    public function setCName($c_name)
    {
        $this->c_name = $c_name;
    }

    /**
     * @return string
     */
    public function getCSurname()
    {
        return $this->c_surname;
    }

    /**
     * @param string $c_surname
     */
    public function setCSurname($c_surname)
    {
        $this->c_surname = $c_surname;
    }

    /**
     * @return string
     */
    public function getCTitle()
    {
        return $this->c_title;
    }

    /**
     * @param string $c_title
     */
    public function setCTitle($c_title)
    {
        $this->c_title = $c_title;
    }

    /**
     * @return string
     */
    public function getCCStreet()
    {
        return $this->c_c_street;
    }

    /**
     * @param string $c_c_street
     */
    public function setCCStreet($c_c_street)
    {
        $this->c_c_street = $c_c_street;
    }

    /**
     * @return string
     */
    public function getCCNum()
    {
        return $this->c_c_num;
    }

    /**
     * @param string $c_c_num
     */
    public function setCCNum($c_c_num)
    {
        $this->c_c_num = $c_c_num;
    }

    /**
     * @return string
     */
    public function getCCCity()
    {
        return $this->c_c_city;
    }

    /**
     * @param string $c_c_city
     */
    public function setCCCity($c_c_city)
    {
        $this->c_c_city = $c_c_city;
    }

    /**
     * @return string
     */
    public function getCCZip()
    {
        return $this->c_c_zip;
    }

    /**
     * @param string $c_c_zip
     */
    public function setCCZip($c_c_zip)
    {
        $this->c_c_zip = $c_c_zip;
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
