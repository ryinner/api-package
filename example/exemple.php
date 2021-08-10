<?php
require_once __DIR__ .'/vendor/autoload.php';
use ApiPackage\ApiController;

$get = new ApiController;
var_dump($get->get('categories'));