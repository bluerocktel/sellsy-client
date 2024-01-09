<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Api;

/**
 * The Company Entity.
 * This entity extends the generic "Client" entity, used also for Individuals.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class Company extends Client
{
    /**
     * Company name.
     */
    public ?string $name;

    /**
     * Company Legal infomation (france format).
     */
    public ?LegalFrance $legal_france;

    /**
     * Company capital.
     */
    public ?string $capital;

    /**
     * Company business segment.
     */
    public ?array $business_segment;

    /**
     * Number of employees of company.
     */
    public ?array $number_of_employees;

    public function addresses(): Api\CompanyAddressesApi
    {
        return new Api\CompanyAddressesApi($this);
    }
}
