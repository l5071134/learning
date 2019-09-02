<?php
$input = $request->get('name');

$response->setContent(sprintf('Hello %s',$input));

$response->send();