<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Entities\Contracts;
use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Entities\InvoiceAmounts;

/**
 * The Invoice Entity.
 *
 * @package bluerock/sellsy-client
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.3
 * @access public
 */
class Invoice extends Entity implements Contracts\HasCustomFields, Contracts\HasSmartTags
{
	use Attributes\SmartTags,
		Concerns\CanManageCustomFields,
		Concerns\CanManageSmartTags;


    /**
     * <READONLY> Invoice ID from Sellsy.
     */
    public ?int $id;

    /**
     * <READONLY> Invoice number from Sellsy.
     */
    public ?string $number;

    public ?string $status;

    public ?string $date;

    public ?string $due_date;

    public ?InvoiceAmounts $amounts;

    public string $currency = 'EUR';

    public ?array $related;

    public ?array $public_link;

    public ?string $pdf_link;

    public ?array $taxes;

    public ?InvoiceDiscount $discount;

    public ?int $fiscal_year_id;

    public ?string $subject;

    public ?string $note;

    public ?string $order_reference;

    public ?int $assigned_staff_id;

    public ?int $invoicing_address_id;

    public ?int $delivery_address_id;

    public ?array $decimal_number;

    public ?int $contact_id;

    public ?int $rate_category_id;

    public ?array $service_dates;

    public ?array $payment_conditions_acceptance;

    public bool $is_deposit = false;

    public ?int $subscription_id;

    /**
     * <READONLY> Client creates date from Sellsy.
     */
    public ?string $created;

    /**
     * <READONLY> Client owner from Sellsy.
     */
    public ?array $owner;
}
