<?php

namespace Bluerock\Sellsy\Api\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author  Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 * @access public
 */
trait CanManageContactsApi
{
	/**
	 * Give the favourite filters
	 *
	 * @return Api\EntityContactsApi
	 */
	public function contacts(): Api\EntityContactsApi
	{
		return new Api\EntityContactsApi($this);
	}
}