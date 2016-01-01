<?php

namespace keika299\ConohaAPI;

use keika299\ConohaAPI;

/**
 * Class Conoha
 *
 * Create this object to use ConoHa API.
 * This class require your ConoHa API account to connect to API.
 *
 * @package keika299\ConohaAPI
 */
class Conoha
{
    private $username;
    private $userPassword;
    private $tenantId;

    private $token;

    /**
     * Conoha constructor.
     *
     * $accessData is your ConoHa API account information.
     *
     * For example,
     * $accessData = array(
     *  'username' => Your API Username,
     *  'password' => Your API password,
     *  'tenantId' => Your API TenantID,
     *  'token' => Your API Token
     * );
     *
     * If it not contain 'token', this class create and set token automatically.
     * If it not contain 'username' or 'password' (or both data), You can connect API,
     * but this class cannot refresh token.
     *
     * @param array $accessData
     */
    public function __construct($accessData = array())
    {
        $this->username = isset($accessData['username']) ? $this->username = $accessData['username'] : null;

        $this->userPassword = isset($accessData['password']) ? $this->userPassword = $accessData['password'] : null;

        $this->tenantId = isset($accessData['tenantId']) ? $this->tenantId = $accessData['tenantId'] : null;

        $this->token = isset($accessData['token']) ? $this->token = $accessData['token'] :
            $this->username != null && $this->userPassword != null ? $this->updateToken() : null;
    }

    /**
     * Get username
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get user password
     *
     * @return string|null
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Get tenant id
     *
     * @return string|null
     */
    public function getTenantId()
    {
        return $this->tenantId;
    }

    /**
     * Refresh token.
     *
     * This function can use already set username and user password.
     *
     * @return string
     * @throws \Exception
     */
    public function updateToken()
    {
        if ($this->getUsername() == null || $this->getUserPassword() == null) {
            throw new \Exception('Cannot refresh token.');
        }
        $this->token = $this->identityService()->getToken()->access->token->id;
        return $this->getToken();
    }

    /**
     * Get token.
     *
     * @return string|null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get account service object.
     *
     * @return Account\Service
     */
    public function accountService()
    {
        return new ConohaAPI\Account\Service($this, 'https://account.tyo1.conoha.io');
    }

    /**
     * Get block storage service object.
     *
     * @return BlockStorage\Service
     */
    public function blockStorageService()
    {
        return new ConohaAPI\BlockStorage\Service($this, 'https://block-storage.tyo1.conoha.io');
    }

    /**
     * Get compute service object.
     *
     * @return Compute\Service
     */
    public function computeService()
    {
        return new ConohaAPI\Compute\Service($this, 'https://compute.tyo1.conoha.io');
    }


    /**
     * Get database service object.
     *
     * @return Database\Service
     */
    public function databaseService()
    {
        return new ConohaAPI\Database\Service($this, 'https://database-hosting.tyo1.conoha.io');
    }

    /**
     * Get DNS service object.
     *
     * @return DNS\Service
     */
    public function dnsService()
    {
        return new ConohaAPI\DNS\Service($this, 'https://dns-service.tyo1.conoha.io');
    }


    /**
     * Get identity service object.
     *
     * @return Identity\Service
     */
    public function identityService()
    {
        return new ConohaAPI\Identity\Service($this, 'https://identity.tyo1.conoha.io');
    }

    /**
     * Get image service object.
     *
     * @return Image\Service
     */
    public function imageService()
    {
        return new ConohaAPI\Image\Service($this, 'https://image-service.tyo1.conoha.io');
    }

    /**
     * Get mail service object.
     *
     * @return Mail\Service
     */
    public function mailService()
    {
        return new ConohaAPI\Mail\Service($this, 'https://mail-hosting.tyo1.conoha.io');
    }

    /**
     * Get network service object.
     *
     * @return Network\Service
     */
    public function networkService()
    {
        return new ConohaAPI\Network\Service($this, 'https://networking.tyo1.conoha.io');
    }

    /**
     * Get object storage service object.
     *
     * @return ObjectStorage\Service
     */
    public function objectStorageService()
    {
        return new ConohaAPI\ObjectStorage\Service($this, 'https://object-storage.tyo1.conoha.io');
    }
}