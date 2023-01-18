<?php

namespace Bluerock\Sellsy\Entities\Attributes;

/**
 * Statistics Attributes.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
trait Statistics
{
    /**
     * <READONLY> Entity opportunities count.
     */
    public ?int $opportunities;
    
    /**
     * <READONLY> Entity estimates count.
     */
    public ?int $estimates;
    
    /**
     * <READONLY> Entity invoices count.
     */
    public ?int $invoices;
    
    /**
     * <READONLY> Entity orders count.
     */
    public ?int $orders;
    
    /**
     * <READONLY> Entity deliveries count.
     */
    public ?int $deliveries;
}
