<?php

namespace Bluerock\Sellsy\Entities\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author  Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 * @access public
 */
trait CanManageContacts
{
	/**
	 * Give the associated contacts API
	 *
	 * @return Api\EntityContactsApi
	 */
	public function contacts(): Api\EntityContactsApi
	{
		return new Api\EntityContactsApi($this);
	}
}