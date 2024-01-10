<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\CustomField;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Custom fields collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\CustomField current
 */
class CustomFieldCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
	public static function create(array $data): CustomFieldCollection
	{
		return new static(CustomField::arrayOf($data));
	}
}
