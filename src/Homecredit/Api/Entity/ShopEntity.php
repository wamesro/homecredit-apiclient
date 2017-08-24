<?php
namespace Homecredit\Api\Entity;

class ShopEntity extends BaseEntity
{
    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var string Order ID
     * @required
     * @hash
     */
    protected $o_code = '';

    /**
     * @var float Order price
     * @required
     * @hash
     */
    protected $o_price = '';

    /**
     * @var string Product ID
     */
    protected $product_ident;

    /**
     * @var string product set
     */
    protected $product_set;

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
    protected $c_surname = '';

    /**
     * @var string Client title
     */
    protected $c_title;

    /**
     * @var string Client phone
     */
    protected $c_phone;

    /**
     * @var string Client mobile
     */
    protected $c_mobile;

    /**
     * @var string Client email
     */
    protected $c_email;

    /**
     * @var string Permanent residence address - Street
     */
    protected $c_p_street;

    /**
     * @var string Permanent residence address - house/flat number
     */
    protected $c_p_num;

    /**
     * @var string Permanent residence address - City
     */
    protected $c_p_city;

    /**
     * @var string Permanent residence address - ZIP code
     */
    protected $c_p_zip;

    /**
     * @var string Contact address - Street
     */
    protected $c_c_street;

    /**
     * @var string Contact address - house/flat number
     */
    protected $c_c_num;

    /**
     * @var string Contact address - City
     */
    protected $c_c_city;

    /**
     * @var string Contact address - ZIP code
     */
    protected $c_c_zip;

    /**
     * @var string Customer ID
     */
    protected $customer_indentification;

    /**
     * @var string Product name
     * @required
     * @hash
     */
    protected $g_name = '';

    /**
     * @var string Product producer
     * @required
     * @hash
     */
    protected $g_producer = '';

    /**
     * @var string "On behalf of" field
     */
    protected $p_assistant;

    /**
     * @var string Store code (when client has more stores)
     */
    protected $partner_shop_code;

    /**
     * @var string Seller name
     */
    protected $seller_name;

    /**
     * @var string Seller surname
     */
    protected $seller_surname;

    /**
     * @var string Return URL
     * @required
     */
    protected $ret_url = '';

    /**
     * @return string
     */
    public function getOCode()
    {
        return $this->o_code;
    }

    /**
     * @param string $o_code
     */
    public function setOCode($o_code)
    {
        $this->o_code = $o_code;
    }

    /**
     * @return float
     */
    public function getOPrice()
    {
        return $this->o_price;
    }

    /**
     * @param integer|float|string $o_price
     */
    public function setOPrice($o_price)
    {
        $this->o_price = is_numeric($o_price) ? number_format($o_price, 2, ',', '') : str_replace('.', ',', $o_price);
    }

    /**
     * @return string
     */
    public function getProductIdent()
    {
        return $this->product_ident;
    }

    /**
     * @param string $product_ident
     */
    public function setProductIdent($product_ident)
    {
        $this->product_ident = $product_ident;
    }

    /**
     * @return string
     */
    public function getProductSet()
    {
        return $this->product_set;
    }

    /**
     * @param string $product_set
     */
    public function setProductSet($product_set)
    {
        $this->product_set = $product_set;
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
    public function getCPhone()
    {
        return $this->c_phone;
    }

    /**
     * @param string $c_phone
     */
    public function setCPhone($c_phone)
    {
        $this->c_phone = $c_phone;
    }

    /**
     * @return string
     */
    public function getCMobile()
    {
        return $this->c_mobile;
    }

    /**
     * @param string $c_mobile
     */
    public function setCMobile($c_mobile)
    {
        $this->c_mobile = $c_mobile;
    }

    /**
     * @return string
     */
    public function getCEmail()
    {
        return $this->c_email;
    }

    /**
     * @param string $c_email
     */
    public function setCEmail($c_email)
    {
        $this->c_email = $c_email;
    }

    /**
     * @return string
     */
    public function getCPStreet()
    {
        return $this->c_p_street;
    }

    /**
     * @param string $c_p_street
     */
    public function setCPStreet($c_p_street)
    {
        $this->c_p_street = $c_p_street;
    }

    /**
     * @return string
     */
    public function getCPNum()
    {
        return $this->c_p_num;
    }

    /**
     * @param string $c_p_num
     */
    public function setCPNum($c_p_num)
    {
        $this->c_p_num = $c_p_num;
    }

    /**
     * @return string
     */
    public function getCPCity()
    {
        return $this->c_p_city;
    }

    /**
     * @param string $c_p_city
     */
    public function setCPCity($c_p_city)
    {
        $this->c_p_city = $c_p_city;
    }

    /**
     * @return string
     */
    public function getCPZip()
    {
        return $this->c_p_zip;
    }

    /**
     * @param string $c_p_zip
     */
    public function setCPZip($c_p_zip)
    {
        $this->c_p_zip = $c_p_zip;
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
     * @return string
     */
    public function getCustomerIndentification()
    {
        return $this->customer_indentification;
    }

    /**
     * @param string $customer_indentification
     */
    public function setCustomerIndentification($customer_indentification)
    {
        $this->customer_indentification = $customer_indentification;
    }

    /**
     * @return string
     */
    public function getGName()
    {
        return $this->g_name;
    }

    /**
     * @param string $g_name
     */
    public function setGName($g_name)
    {
        $this->g_name = $g_name;
    }

    /**
     * @return string
     */
    public function getGProducer()
    {
        return $this->g_producer;
    }

    /**
     * @param string $g_producer
     */
    public function setGProducer($g_producer)
    {
        $this->g_producer = $g_producer;
    }

    /**
     * @return string
     */
    public function getPAssistant()
    {
        return $this->p_assistant;
    }

    /**
     * @param string $p_assistant
     */
    public function setPAssistant($p_assistant)
    {
        $this->p_assistant = $p_assistant;
    }

    /**
     * @return string
     */
    public function getPartnerShopCode()
    {
        return $this->partner_shop_code;
    }

    /**
     * @param string $partner_shop_code
     */
    public function setPartnerShopCode($partner_shop_code)
    {
        $this->partner_shop_code = $partner_shop_code;
    }

    /**
     * @return string
     */
    public function getSellerName()
    {
        return $this->seller_name;
    }

    /**
     * @param string $seller_name
     */
    public function setSellerName($seller_name)
    {
        $this->seller_name = $seller_name;
    }

    /**
     * @return string
     */
    public function getSellerSurname()
    {
        return $this->seller_surname;
    }

    /**
     * @param string $seller_surname
     */
    public function setSellerSurname($seller_surname)
    {
        $this->seller_surname = $seller_surname;
    }

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
