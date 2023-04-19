<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;

/**
 * The InvoiceAmounts Entity.
 * Numbers are formatted as a string to avoid floating point precision issues.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class InvoiceAmounts extends Entity
{
    public string $total_raw_excl_tax            = "0";
    public string $total_after_discount_excl_tax = "0";
    public string $total_packaging               = "0";
    public string $total_shipping                = "0";
    public string $total_excl_tax                = "0";
    public string $total_incl_tax                = "0";
    public string $total_remaining_due_incl_tax  = "0";
    public string $total_primes_incl_tax         = "0";
}
