<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\AddressCollection;
use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Company;

/**
 * The API client for the `addresses` namespace in Companies
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Companies
 */
class CompaniesAddressesApi extends GenericAddressesApi
{
    /**
     * The Api class constructor, setting up common tools.
	 * Package:
	 * bluerock/sellsy-client
	 *
	 * @param Company $company		The company
     */
    public function __construct(Company $company)
    {
        parent::__construct($company);
        $this->entity     = Address::class;
        $this->collection = AddressCollection::class;
    }
}
