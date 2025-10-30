<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Invoice;

/**
 * The API client for the `payments` namespace in Invoices
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Invoices
 */
class InvoicePaymentsApi extends EntityPaymentsApi
{
    /**
	 * @param Invoice $invoice The related invoice.
     * @inheritdoc
     */
    public function __construct(Invoice $invoice)
    {
        parent::__construct($invoice);
    }
}
