<?php

namespace Bluerock\Sellsy\Entities;

use Bluerock\Sellsy\Api;
use Bluerock\Sellsy\Entities\Entity;
use Bluerock\Sellsy\Entities\Socials;
use Bluerock\Sellsy\Entities\Attributes;
use Bluerock\Sellsy\Entities\Contracts;

/**
 * The CustomField Entity.
 *
 * @package bluerock/sellsy-client
 * @author Jérémie <jeremie@kiwik.com>
 * @author Thomas <thomas@bluerocktel.com>
 * @version 1.0
 * @access public
 */
class CustomField extends Entity
{
    /**
     * <READONLY> CustomField ID from Sellsy.
     */
    public ?int $id;

    /**
     * Custom field name.
     */
    public ?string $name;

    /**
     * Machine name of custom field.
     */
    public ?string $code;

    /**
     * Description of custom field.
     */
    public ?string $description;

    /**
     * Custom field must be completed or not.
     */
    public ?bool $mandatory;

    /**
     * Rank of custom field in group.
     */
    public ?int $rank;

	/**
	 * Group containing the custom field.
	 */
	public ?array $customfield_group;

    /**
     * Custom field type (ie: 'simple-text', ...).
     */
    public ?string $type;

    /**
     * Field type parameters.
     */
    public ?array $parameters;

	/**
	 * List of objects the custom field can be used on
	 */
	public ?array $related;

	/**
	 * Value
	 */
	public $value;

}
