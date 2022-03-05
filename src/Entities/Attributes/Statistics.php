<?php

namespace Bluerock\Sellsy\Entities\Attributes;

/**
 * Statistics Attributes.
 *
 * @package sellsy-connector
 * @author Thomas <thomas@hydrat.agency>
 * @version 1.0
 * @access public
 */
trait Statistics
{
    /**
     * <READONLY> Company opportunities count.
     */
    public ?int $opportunities;
    
    /**
     * <READONLY> Company estimates count.
     */
    public ?int $estimates;
    
    /**
     * <READONLY> Company invoices count.
     */
    public ?int $invoices;
    
    /**
     * <READONLY> Company orders count.
     */
    public ?int $orders;
    
    /**
     * <READONLY> Company deliveries count.
     */
    public ?int $deliveries;
}
