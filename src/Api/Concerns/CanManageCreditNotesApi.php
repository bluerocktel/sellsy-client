<?php

namespace Bluerock\Sellsy\Api\Concerns;

use Bluerock\Sellsy\Api;

/**
 * @package bluerock/sellsy-client
 * @author  Jérémie <jeremie@kiwik.com>
 * @author  Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 * @access  public
 */
trait CanManageCreditNotesApi
{
	/**
	 * Give the credit notes
	 *
	 * @return Api\EntityCreditNotesApi
	 */
	public function creditNotes(): Api\EntityCreditNotesApi
	{
		return new Api\EntityCreditNotesApi($this);
	}
}