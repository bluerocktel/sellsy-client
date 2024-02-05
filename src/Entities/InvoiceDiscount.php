<?php

namespace Bluerock\Sellsy\Entities;


/**
 * The InvoiceDiscount Entity.
 * Numbers are formatted as a string to avoid floating point precision issues.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.1
 * @access public
 */
class InvoiceDiscount extends Entity
{
    public string $percent                       = "0";
    public string $amount                        = "0";
    public ?string $type;
}
