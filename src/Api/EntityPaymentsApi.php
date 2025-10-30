<?php

namespace Bluerock\Sellsy\Api;

use Illuminate\Support\Str;
use Bluerock\Sellsy\Core\Response;
use Bluerock\Sellsy\Entities\Payment;
use Bluerock\Sellsy\Collections\PaymentCollection;
use Bluerock\Sellsy\Entities\Contracts\HasPayments;

/**
 * The API client for the `payments` namespace.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.2.4
 */
class EntityPaymentsApi extends AbstractApi
{
	/**
	 * @var HasPayments The related entity owning the payments.
	 */
	protected $relatedEntity;

	/**
	 * @var string The related entity base endpoint.
	 */
	protected $endpoint;

    /**
	 * @param HasPayments $relatedEntity   related entity owning the payments.
     * @inheritdoc
     */
    public function __construct(HasPayments $relatedEntity)
    {
        parent::__construct();

        $endpoint = Str::of(get_class($relatedEntity))
            ->afterLast('\\')
            ->lower()
            ->plural();

        $this->entity     = Payment::class;
        $this->collection = PaymentCollection::class;

        $this->endpoint = (string) $endpoint;
        $this->relatedEntity = $relatedEntity;
    }

    /**
     * Store (create) an payment.
     *
     * @param Payment $payment The payment entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://docs.sellsy.com/api/v2/#operation/create-company-payment
     * @see https://docs.sellsy.com/api/v2/#operation/create-individual-payment
     */
    public function store(Payment $payment, array $query = []): Response
    {
        $body = $payment->except('id')
                        ->except('owner')
                        ->toArray();

        $response = $this->connection
                        ->request("{$this->endpoint}/{$this->relatedEntity->id}/payments")
                        ->post(array_filter($body) + $query);

        return $this->prepareResponse($response);
    }

    /**
     * Link an payment to an entity.
     *
     * @param Payment $payment The payment entity to store.
     * @param array   $query   Query parameters.
     *
     * @return \Bluerock\Sellsy\Core\Response
     * @see https://docs.sellsy.com/api/v2/#operation/link-invoice-payment
     */
    public function link(Payment $payment, array $query = []): Response
    {
        $response = $this->connection
            ->request("{$this->endpoint}/{$this->relatedEntity->id}/payments/{$payment->id}")
            ->post($query);

        return $this->prepareResponse($response);
    }
}
