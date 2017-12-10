<?php

class Hosts
{
  protected $id;

  protected $name;

  protected $mac_address;

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  public function getMacAddress()
  {
    return $this->mac_address;
  }

  public function setMacAddress($mac_address)
  {
    $this->mac_address = $mac_address;
    return $this;
  }

}
