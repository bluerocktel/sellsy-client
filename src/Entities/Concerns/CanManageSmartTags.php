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
trait CanManageSmartTags
{
	/**
	 * Give the associated smart tags
	 *
	 * @return Api\EntitySmartTagsApi
	 */
	public function smartTags(): Api\EntitySmartTagsApi
	{
		return new Api\EntitySmartTagsApi($this);
	}
}