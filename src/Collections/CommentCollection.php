<?php

namespace Bluerock\Sellsy\Collections;

use Bluerock\Sellsy\Entities\Comment;
use Bluerock\Sellsy\Contracts\EntityCollectionContract;
use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * The Comment Entity collection.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.4.1
 * @access public
 *
 * @method \Bluerock\Sellsy\Entities\Comment current
 */
class CommentCollection extends DataTransferObjectCollection implements EntityCollectionContract
{
    public static function create(array $data): CommentCollection
    {
        return new static(Comment::arrayOf($data));
    }
}
