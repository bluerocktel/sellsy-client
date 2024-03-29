<?php

namespace Bluerock\Sellsy\Core;

use Bluerock\Sellsy\Core\Request;
use Bluerock\Sellsy\Exceptions\InvalidCredentialsException;

/**
 * The API client used for authentication.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Authentication
{
    /**
     * Get a Bearer token for a single user.
     *
     * @param string $client_id
     * @param string $client_secret
     *
     * @return array token informations
     * @throws \Bluerock\Sellsy\Exceptions\InvalidCredentialsException
     */
    public function getToken(string $client_id, string $client_secret)
    {
        $params = [
            'grant_type'    => 'client_credentials',
            'client_id'     => $client_id,
            'client_secret' => $client_secret,
        ];

        $response = Request::make('https://login.sellsy.com/oauth2/access-tokens')
                        ->withOptions([])
                        ->withHeaders([
                            'Accept' => 'application/json',
                        ])
                        ->post($params);

        $data = $response->json();

        # Invalid credentials.
        if ($response->failed()) {
            throw new InvalidCredentialsException($data['error'] . ' | ' . $data['error_description']);
        }

        return $data;
    }
}
