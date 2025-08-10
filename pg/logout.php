<?php
include '../inc/db_config.php';
include '../inc/member.php';

$mem = new Member($db);

$mem -> logout();
