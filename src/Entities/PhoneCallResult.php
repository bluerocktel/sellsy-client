<?php

namespace Bluerock\Sellsy\Entities;

/**
 * A Phone Call Topic entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.1
 * @access public
 */
class PhoneCallResult extends Entity
{
    public string $id; // Enum: "noanswer" "busy" "wrongnumber" "msgdirect" "msgvocal" "connected" "transfer" "interrupt"
    public ?string $name;
}
