<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Api;
use Bluerock\Sellsy\Entities\Entity;

/**
 * The FavouriteFilter Entity.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class FavouriteFilter extends Entity
{
    /**
     * <READONLY> Favourite filter ID from Sellsy.
     */
    public ?int $id;

    /**
     * Favourite filter name.
	 * IMPORTANT: type in the official doc, which indicates 'type' as the name of that key.
	 * But the api returns 'name', so we stick at it
     */
    public ?string $name;

}
