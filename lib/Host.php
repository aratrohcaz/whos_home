<?php



/**
 * Host
 */
class Host
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $mac_address;

    /**
     * @var string
     */
    private $name;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set macAddress
     *
     * @param string $macAddress
     *
     * @return Host
     */
    public function setMacAddress($macAddress)
    {
        $this->mac_address = $macAddress;

        return $this;
    }

    /**
     * Get macAddress
     *
     * @return string
     */
    public function getMacAddress()
    {
        return $this->mac_address;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Host
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

