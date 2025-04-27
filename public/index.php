<?php

include_once __DIR__ . '/../vendor/autoload.php';

use OpenSwoole\Http\Request;
use OpenSwoole\Http\Response;
use OpenSwoole\Http\Server;

$server = new Server('0.0.0.0', 8002);

$clientVersion = "0.0.1";

$server->on('Start', function (Server $server) {
	echo "Server is started at http://{$server->host}:{$server->port}\n";
});

$server->on('request', function (Request $request, Response $response) use (&$clientVersion) {
	$params = [];

	if (isset($request->server['query_string'])) {
		parse_str($request->server['query_string'], $params);
	}

	if (isset($params['client_version'])) {
		$clientVersion  = $params['client_version'];
	}

	array_push($params, $clientVersion);

    $response->end(json_encode($params));
});

$server->start();
