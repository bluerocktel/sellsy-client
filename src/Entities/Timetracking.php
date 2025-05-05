<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The Time tracking Entity.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.4.1
 * @access public
 */
class Timetracking extends Entity
{
    /**
     * Timetracking duration, in seconds.
     */
    public int $duration;

    /**
     * Timetracking service ID related.
     *
     * @var int|null
     */
    public $service;

    /**
     * Timetracking service name.
     */
    public ?string $name;
}
