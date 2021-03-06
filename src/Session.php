<?php


namespace Nikitam\Example;


class Session
{

    private $id;
    private $stage;
    private $params;


    public function __construct($id)
    {
        $this->id = $id;
        $this->stage = "start";
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
     * @return string
     */
    public function getStage(): string
    {
        return $this->stage;
    }

    /**
     * @param string $stage
     */
    public function setStage(string $stage): void
    {
        $this->stage = $stage;
    }

    /**
     * @return mixed
     */
    public function getParams($key)
    {
        return array_get($this->params,$key);
    }

    /**
     * @param mixed $params
     */
    public function setParams($key, $value): void
    {
        array_add($this->params, $key, $value);
    }


}