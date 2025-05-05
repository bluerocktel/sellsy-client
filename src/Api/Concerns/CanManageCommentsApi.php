<?php

namespace Bluerock\Sellsy\Api\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author  Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.4.1
 * @access public
 */
trait CanManageCommentsApi
{
	/**
	 * Give the comments API
	 *
	 * @return Api\CommentsApi
	 */
	public function comments(): Api\EntityCommentsApi
	{
		return new Api\EntityCommentsApi($this);
	}
}