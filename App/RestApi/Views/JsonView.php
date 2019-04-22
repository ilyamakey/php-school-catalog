<?php


namespace App\RestApi\Views;

use App\Views\ViewInterface;

class JsonView implements ViewInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = json_encode($data);
    }

    public function render()
    {
        echo $this->data;
    }
}