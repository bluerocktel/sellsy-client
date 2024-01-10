<?php

namespace Bluerock\Sellsy\Entities\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 * @access public
 */
trait CanManageCustomFields
{
	/**
	 * Give the associated custom fields
	 *
	 * @return Api\EntityCustomFieldsApi
	 */
	public function customFields(): Api\EntityCustomFieldsApi
	{
		return new Api\EntityCustomFieldsApi($this);
	}
}