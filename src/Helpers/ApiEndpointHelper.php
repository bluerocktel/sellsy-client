<?php

namespace Bluerock\Sellsy\Helpers;

use Bluerock\Sellsy\Api\AbstractApi;
use Bluerock\Sellsy\Api\CreditNotesApi;
use Bluerock\Sellsy\Entities\CreditNote;
use Bluerock\Sellsy\Entities\Entity;
use Illuminate\Support\Str;

/**
 * Helper for API endpoints
 *
 * @package bluerock/sellsy-client
 * @author Jeremie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.3.0
 * @access public
 */
class ApiEndpointHelper
{
	/**
	 * Give the API endpoint for the Entity
	 * @param Entity $relatedEntity		The related entity
	 * @return string	the API endpoint
	 */
	public static function getRelatedEntityEndpoint(Entity $relatedEntity) {
		// Generic conversion (camel case to Sellsy Api V2 convention)
		$endpoint = Str::of(get_class($relatedEntity))
			->afterLast('\\')
			->kebab()
			->lower()
			->plural();
		return (string) $endpoint;
	}


	/**
	 * Give the API endpoint for the Entity
	 * @param AbstractApi $relatedApi	The related API
	 * @return string	the API endpoint
	 */
	public static function getRelatedApiEndpoint(AbstractApi $relatedApi) {
		// Generic conversion (camel case to Sellsy Api V2 convention)
		$endpoint = Str::of(get_class($relatedApi))
			->afterLast('\\')
			->replaceLast('Api', '')
			->kebab()
			->lower()
			->plural();
		return (string) $endpoint;
	}

}