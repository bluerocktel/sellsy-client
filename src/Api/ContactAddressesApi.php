<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Entities\Contact;

/**
 * The API client for the `addresses` namespace in Contacts
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.4
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Contacts
 */
class ContactAddressesApi extends EntityAddressesApi
{
    /**
	 * @param Contact $contact The related contact.
     * @inheritdoc
     */
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }
}
