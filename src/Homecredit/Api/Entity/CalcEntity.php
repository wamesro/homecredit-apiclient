<?php
namespace Homecredit\Api\Entity;

class CalcEntity extends BaseEntity
{
    /**
     * All fields with value set to empty string/0/false needs to stay because of Homecredit\Api\Facade\WebFacade->GetLink() - http_build_query
     */

    /**
     * @var float Order price
     * @required
     * @hash
     */
    protected $o_price = '';

    /**
     * @var string product set
     */
    protected $product_set;

    /**
     * @return float
     */
    public function getOPrice()
    {
        return $this->o_price;
    }

    /**
     * @param integer $o_price
     */
    public function setOPrice($o_price)
    {
        $this->o_price = (int)$o_price;
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

}
