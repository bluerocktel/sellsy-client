<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Company;

/**
 * The API client for the `addresses` namespace in Companies
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Companies
 */
class CompanyAddressesApi extends GenericAddressesApi
{
    /**
	 * @param Company $company The related company.
     * @inheritdoc
     */
    public function __construct(Company $company)
    {
        parent::__construct($company);
    }
}
