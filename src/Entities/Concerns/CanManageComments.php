<?php

namespace Bluerock\Sellsy\Entities\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author  Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.4.1
 * @access public
 */
trait CanManageComments
{
	/**
	 * Give the associated comments API
	 *
	 * @return Api\EntityCommentsApi
	 */
	public function comments(): Api\EntityCommentsApi
	{
		return new Api\EntityCommentsApi($this);
	}
}