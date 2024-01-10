<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Individual;

/**
 * The API client for the `addresses` namespace in Individuals
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Individuals
 */
class IndividualAddressesApi extends EntityAddressesApi
{
    /**
	 * @param Individual $individual The related individual.
     * @inheritdoc
     */
    public function __construct(Individual $individual)
    {
        parent::__construct($individual);
    }
}
