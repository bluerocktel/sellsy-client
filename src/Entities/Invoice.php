<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Entities\InvoiceAmounts;

/**
 * The Invoice Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.1
 * @access public
 */
class Invoice extends Entity
{
    /**
     * <READONLY> Invoice ID from Sellsy.
     */
    public ?int $id;

    /**
     * <READONLY> Invoice number from Sellsy.
     */
    public ?string $number;
    
    /**
     * Invoice status.
     */
    public ?string $status;
    
    /**
     * Invoice date.
     */
    public ?string $date;
    
    /**
     * Invoice due date.
     */
    public ?string $due_date;

    /**
     * Invoice amounts.
     */
    public ?InvoiceAmounts $amounts;

    /**
     * Rate category currency.
     */
    public string $currency = 'EUR';
}
