<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../safe_number.php';
require_once __DIR__ . '/../chain/config.php';

class ETH {
	private static $rpc_host = ETH_RPC_HOST;
	private static $pass = ETH_PASS;
	public static $wei = 1000000000000000000;
	private static $header = ['Content-Type'=>'application/json'];

	// 查询账号
	public static function eth_accounts() {
		$data = json_encode(['method'=>'eth_accounts', 'params'=>[], 'jsonrpc'=>'2.0', 'id'=>1]);
		$response = Requests::post(ETH::$sign_host, ETH::$header, $data);
		return json_decode($response->body)->result;
	}

	// 查询balance
	public static function eth_getBalance($address) {
		$data = json_encode(['method'=>'eth_getBalance', 'params'=>[$address, 'latest'], 'jsonrpc'=>'2.0', 'id'=>1]);
		$response = Requests::post(ETH::$rpc_host, ETH::$header, $data);
		return json_decode($response->body)->result;
	}

	// 查询tx
	public static function eth_getTransactionByHash($txid) {
		$data = json_encode(['method'=>'eth_getTransactionByHash', 'params'=>[$txid], 'jsonrpc'=>'2.0', 'id'=>1]);
		$response = Requests::post(ETH::$rpc_host, ETH::$header, $data);
		return json_decode($response->body)->result;
	}

	// 查询tx receipt
	public static function eth_getTransactionReceipt($txid) {
		$data = json_encode(['method'=>'eth_getTransactionReceipt', 'params'=>[$txid], 'jsonrpc'=>'2.0', 'id'=>1]);
		$response = Requests::post(ETH::$rpc_host, ETH::$header, $data);
		return json_decode($response->body)->result;
	}
}