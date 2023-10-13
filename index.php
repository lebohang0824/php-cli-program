<?php

require_once "./modules/File.php";
require_once "./modules/Ticket.php";
require_once "./modules/ICountry.php";
require_once "./modules/Country.php";
require_once "./modules/Germany.php";
require_once "./modules/Italy.php";
require_once "./modules/Norway.php";


$germany = new Germany("uploads/germany_03-11-2019_32322.csv", "uploads/germany_03-11-2019_32322 result.csv");
$germany->write_results();

$italy = new Italy("uploads/italy_03-11-2019_32322.csv", "uploads/italy_03-11-2019_32322 result.csv");
$italy->write_results();

$norway = new Norway("uploads/norway_06-11-2019_87685.csv", "uploads/norway_06-11-2019_87685 result.csv");
$norway->write_results();
