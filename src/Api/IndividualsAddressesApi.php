<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\AddressCollection;
use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Individual;

/**
 * The API client for the `addresses` namespace in Individuals
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Individuals
 */
class IndividualsAddressesApi extends GenericAddressesApi
{
    /**
     * The Api class constructor, setting up common tools.
	 * Package:
	 * bluerock/sellsy-client
	 *
	 * @param Individual $individual		The individual
     */
    public function __construct(Individual $individual)
    {
        parent::__construct($individual);
        $this->entity     = Address::class;
        $this->collection = AddressCollection::class;
    }
}
