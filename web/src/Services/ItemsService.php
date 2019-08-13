<?php

namespace App\Services;

class ItemsService {

    public $items = ['tshirt','car','mug','phone'];

    public function __construct() {
        shuffle($this -> items);
    }

}