<?php

require dirname(__DIR__) . '/../vendor/autoload.php';

use keika299\ConohaAPI\Conoha;

$client = new Conoha();

$identityService = $client->accountService();

echo json_encode($identityService->getVersionInfo());