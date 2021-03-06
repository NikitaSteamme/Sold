<?php

namespace Nikitam\Example;

class Item
{
private $id;
private $price;
private $priceCurrency;
private $description;
private $type;
private $size;
private $sizeUnits;
private $rooms;
private $area;
private $address;

    /**
     * Item constructor.
     * @param $price
     * @param $priceCurrency
     * @param $description
     * @param $type
     * @param $size
     * @param $sizeUnits
     * @param $rooms
     * @param $area
     * @param $address
     */
    public function __construct($price, $priceCurrency, $description, $type, $size, $sizeUnits, $rooms, $area, $address)
    {
        $this->id            = uniqid();
        $this->price         = $price;
        $this->priceCurrency = $priceCurrency;
        $this->description   = $description;
        $this->type          = $type;
        $this->size          = $size;
        $this->sizeUnits     = $sizeUnits;
        $this->rooms         = $rooms;
        $this->area          = $area;
        $this->address       = $address;

        $db = new DB();
        $params = [
            'id' => $this->id,
            'price'=>$this->price,
            'priceCurrency'=>$this->priceCurrency,
            'description'=>$this->description,
            'type'=>$this->type,
            'size'=>$this->size,
            'sizeUnits'=>$this->sizeUnits,
            'rooms'=>$this->rooms,
            'area'=>$this->area,
            'address'=>$this->address,
            'photo0'=> "",
            'photo1'=>"",
            'photo2'=>"",
            'photo3'=>"",
            'photo4'=>"",
            'photo5'=>"",
            'photo6'=>"",
        ];
        $db->query("INSERT INTO sold_items(
                       `id`,
                       `price`, 
                       `priceCurrency`, 
                       `description`, 
                       `type`, 
                       `size`, 
                       `sizeUnits`, 
                       `rooms`, 
                       `area`, 
                       `address`, 
                       `photo0`, 
                       `photo1`, 
                       `photo2`, 
                       `photo3`, 
                       `photo4`, 
                       `photo5`, 
                       `photo6`) 
                       VALUES (
                       :id,
                       :price, 
                       :priceCurrency, 
                       :description, 
                       :type, 
                       :size, 
                       :sizeUnits, 
                       :rooms, 
                       :area, 
                       :address, 
                       :photo0, 
                       :photo1, 
                       :photo2, 
                       :photo3, 
                       :photo4, 
                       :photo5, 
                       :photo6)", $params);
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPriceCurrency()
    {
        return $this->priceCurrency;
    }

    /**
     * @param mixed $priceCurrency
     */
    public function setPriceCurrency($priceCurrency): void
    {
        $this->priceCurrency = $priceCurrency;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getSizeUnits()
    {
        return $this->sizeUnits;
    }

    /**
     * @param mixed $sizeUnits
     */
    public function setSizeUnits($sizeUnits): void
    {
        $this->sizeUnits = $sizeUnits;
    }

    /**
     * @return mixed
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * @param mixed $rooms
     */
    public function setRooms($rooms): void
    {
        $this->rooms = $rooms;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area): void
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }
}
