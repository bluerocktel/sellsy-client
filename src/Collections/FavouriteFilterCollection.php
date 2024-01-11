<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\FavouriteFilter;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The favourite filters collection.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\FavouriteFilter current
 */
class FavouriteFilterCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
	public static function create(array $data): FavouriteFilterCollection
	{
		return new static(FavouriteFilter::arrayOf($data));
	}
}
