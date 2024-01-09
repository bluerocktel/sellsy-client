<?php

namespace Bluerock\Sellsy\Api;

use Bluerock\Sellsy\Collections\AddressCollection;
use Bluerock\Sellsy\Entities\Address;
use Bluerock\Sellsy\Entities\Contact;

/**
 * The API client for the `addresses` namespace in Contacts
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @version 1.2.3
 * @access public
 * @see https://api.sellsy.com/doc/v2/#tag/Contacts
 */
class ContactsAddressesApi extends GenericAddressesApi
{
    /**
     * The Api class constructor, setting up common tools.
	 * Package:
	 * bluerock/sellsy-client
	 *
	 * @param Contact $contact		The contact
     */
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
        $this->entity     = Address::class;
        $this->collection = AddressCollection::class;
    }
}
