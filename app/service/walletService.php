<?php

namespace App\service;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class walletService
{
    protected $client;
    protected $networkId;
    protected $nodeUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->networkId = env('NEAR_NETWORK', 'testnet');
        $this->nodeUrl = 'https://rpc.testnet.near.org'; // Endpoint para testnet
    }

    // Método para obtener el saldo de una cuenta
    public function getBalance($accountId)
    {
        $response = $this->client->post($this->nodeUrl, [
            'json' => [
                "jsonrpc" => "2.0",
                "id" => "dontcare",
                "method" => "query",
                "params" => [
                    "request_type" => "view_account",
                    "finality" => "final",
                    "account_id" => $accountId
                ]
            ]
        ]);

        $body = json_decode($response->getBody()->getContents(), true);
        return $body['result']['amount'] ?? 0;
    }
    public function sendNear($fromAccountId, $privateKey, $toWalletAddress, $amount)
    {
        $amountInYocto = bcmul($amount, '1000000000000000000000000');
    
        // Verificar el balance antes de realizar la transacción
        $balance = $this->getBalance($fromAccountId);
        if ($balance < $amountInYocto) {
            return ['error' => 'Fondos insuficientes para realizar la transacción'];
        }
    
        try {
            $response = $this->client->post($this->nodeUrl, [
                'json' => [
                    "jsonrpc" => "2.0",
                    "id" => "dontcare",
                    "method" => "broadcast_tx_commit",
                    "params" => [
                        "signer_id" => $fromAccountId,
                        "receiver_id" => $toWalletAddress,
                        "amount" => $amountInYocto,
                        "private_key" => $privateKey
                    ]
                ]
            ]);
    
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Registrar el error
            error_log($e->getMessage());
            return ['error' => 'No se pudo procesar la transacción: '   . $e->getMessage()];
        }
    }



    public function login($username, $password)
    {
        try {
            // Endpoint de inicio de sesión de Tilin
            $response = $this->client->post('https://api.tilin.com/v1/login', [
                'json' => [
                    'username' => $username,
                    'password' => $password
                ]
            ]);

            // Decodificar la respuesta
            $data = json_decode($response->getBody(), true);

            // Aquí puedes guardar el token o los datos de sesión que devuelva la API
            // Por ejemplo: $_SESSION['tilin_token'] = $data['token'];

            return $data; // Retornar los datos necesarios
        } catch (RequestException $e) {
            // Manejo de errores
            if ($e->hasResponse()) {
                $errorResponse = json_decode($e->getResponse()->getBody(), true);
                throw new Exception($errorResponse['message'] ?? 'Error al iniciar sesión');
            }
            throw new Exception('Error de conexión al iniciar sesión');
        }
    }

    }