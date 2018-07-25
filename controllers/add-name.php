<?php

$data = $app['database']->insertValue([$_POST['name']],['name'],'names');

if ($data == false) {
	die("ERROR inserting data into db");
}