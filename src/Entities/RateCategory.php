<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Tax;
use Bluerock\Sellsy\Entities\Unit;
use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Entities\Accounting;

/**
 * The Rate Category Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class RateCategory extends Entity
{
    /**
     * <READONLY> Rate category ID from Sellsy.
     */
    public ?int $id;
    
    /**
     * Rate category related tax ID from Sellsy.
     */
    public ?int $tax_id;

    /**
     * Rate category label.
     */
    public ?string $label;

    /**
     * Rate category currency.
     */
    public string $currency = 'EUR';

    /**
     * Does the Rate category includes taxes.
     */
    public ?bool $includes_taxes;
    
    /**
     * Does the Rate category is the default for this account.
     */
    public ?bool $is_default;
    
    /**
     * Rate category accounting.
     */
    public ?Accounting $accounting;

    /**
     * Rate category default layouts.
     */
    public ?array $default_layouts;
}
