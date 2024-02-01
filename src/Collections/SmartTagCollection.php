<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\SmartTag;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The smart tags collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\SmartTag current
 */
class SmartTagCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
	public static function create(array $data): SmartTagCollection
	{
		return new static(SmartTag::arrayOf($data));
	}
}
