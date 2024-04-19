<?php
/**
 * Domain
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  HubSpot\Client\Cms\Domains
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Domains
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: v3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace HubSpot\Client\Cms\Domains\Model;

use \ArrayAccess;
use \HubSpot\Client\Cms\Domains\ObjectSerializer;

/**
 * Domain Class Doc Comment
 *
 * @category Class
 * @package  HubSpot\Client\Cms\Domains
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Domain implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Domain';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'domain' => 'string',
        'primary_landing_page' => 'bool',
        'primary_email' => 'bool',
        'primary_blog_post' => 'bool',
        'primary_site_page' => 'bool',
        'primary_knowledge' => 'bool',
        'secondary_to_domain' => 'string',
        'is_resolving' => 'bool',
        'manually_marked_as_resolving' => 'bool',
        'is_ssl_enabled' => 'bool',
        'is_ssl_only' => 'bool',
        'is_used_for_blog_post' => 'bool',
        'is_used_for_site_page' => 'bool',
        'is_used_for_landing_page' => 'bool',
        'is_used_for_email' => 'bool',
        'is_used_for_knowledge' => 'bool',
        'correct_cname' => 'string',
        'created' => '\DateTime',
        'updated' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'domain' => null,
        'primary_landing_page' => null,
        'primary_email' => null,
        'primary_blog_post' => null,
        'primary_site_page' => null,
        'primary_knowledge' => null,
        'secondary_to_domain' => null,
        'is_resolving' => null,
        'manually_marked_as_resolving' => null,
        'is_ssl_enabled' => null,
        'is_ssl_only' => null,
        'is_used_for_blog_post' => null,
        'is_used_for_site_page' => null,
        'is_used_for_landing_page' => null,
        'is_used_for_email' => null,
        'is_used_for_knowledge' => null,
        'correct_cname' => null,
        'created' => 'date-time',
        'updated' => 'date-time'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'domain' => 'domain',
        'primary_landing_page' => 'primaryLandingPage',
        'primary_email' => 'primaryEmail',
        'primary_blog_post' => 'primaryBlogPost',
        'primary_site_page' => 'primarySitePage',
        'primary_knowledge' => 'primaryKnowledge',
        'secondary_to_domain' => 'secondaryToDomain',
        'is_resolving' => 'isResolving',
        'manually_marked_as_resolving' => 'manuallyMarkedAsResolving',
        'is_ssl_enabled' => 'isSslEnabled',
        'is_ssl_only' => 'isSslOnly',
        'is_used_for_blog_post' => 'isUsedForBlogPost',
        'is_used_for_site_page' => 'isUsedForSitePage',
        'is_used_for_landing_page' => 'isUsedForLandingPage',
        'is_used_for_email' => 'isUsedForEmail',
        'is_used_for_knowledge' => 'isUsedForKnowledge',
        'correct_cname' => 'correctCname',
        'created' => 'created',
        'updated' => 'updated'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'domain' => 'setDomain',
        'primary_landing_page' => 'setPrimaryLandingPage',
        'primary_email' => 'setPrimaryEmail',
        'primary_blog_post' => 'setPrimaryBlogPost',
        'primary_site_page' => 'setPrimarySitePage',
        'primary_knowledge' => 'setPrimaryKnowledge',
        'secondary_to_domain' => 'setSecondaryToDomain',
        'is_resolving' => 'setIsResolving',
        'manually_marked_as_resolving' => 'setManuallyMarkedAsResolving',
        'is_ssl_enabled' => 'setIsSslEnabled',
        'is_ssl_only' => 'setIsSslOnly',
        'is_used_for_blog_post' => 'setIsUsedForBlogPost',
        'is_used_for_site_page' => 'setIsUsedForSitePage',
        'is_used_for_landing_page' => 'setIsUsedForLandingPage',
        'is_used_for_email' => 'setIsUsedForEmail',
        'is_used_for_knowledge' => 'setIsUsedForKnowledge',
        'correct_cname' => 'setCorrectCname',
        'created' => 'setCreated',
        'updated' => 'setUpdated'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'domain' => 'getDomain',
        'primary_landing_page' => 'getPrimaryLandingPage',
        'primary_email' => 'getPrimaryEmail',
        'primary_blog_post' => 'getPrimaryBlogPost',
        'primary_site_page' => 'getPrimarySitePage',
        'primary_knowledge' => 'getPrimaryKnowledge',
        'secondary_to_domain' => 'getSecondaryToDomain',
        'is_resolving' => 'getIsResolving',
        'manually_marked_as_resolving' => 'getManuallyMarkedAsResolving',
        'is_ssl_enabled' => 'getIsSslEnabled',
        'is_ssl_only' => 'getIsSslOnly',
        'is_used_for_blog_post' => 'getIsUsedForBlogPost',
        'is_used_for_site_page' => 'getIsUsedForSitePage',
        'is_used_for_landing_page' => 'getIsUsedForLandingPage',
        'is_used_for_email' => 'getIsUsedForEmail',
        'is_used_for_knowledge' => 'getIsUsedForKnowledge',
        'correct_cname' => 'getCorrectCname',
        'created' => 'getCreated',
        'updated' => 'getUpdated'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = $data['id'] ?? null;
        $this->container['domain'] = $data['domain'] ?? null;
        $this->container['primary_landing_page'] = $data['primary_landing_page'] ?? null;
        $this->container['primary_email'] = $data['primary_email'] ?? null;
        $this->container['primary_blog_post'] = $data['primary_blog_post'] ?? null;
        $this->container['primary_site_page'] = $data['primary_site_page'] ?? null;
        $this->container['primary_knowledge'] = $data['primary_knowledge'] ?? null;
        $this->container['secondary_to_domain'] = $data['secondary_to_domain'] ?? null;
        $this->container['is_resolving'] = $data['is_resolving'] ?? null;
        $this->container['manually_marked_as_resolving'] = $data['manually_marked_as_resolving'] ?? null;
        $this->container['is_ssl_enabled'] = $data['is_ssl_enabled'] ?? null;
        $this->container['is_ssl_only'] = $data['is_ssl_only'] ?? null;
        $this->container['is_used_for_blog_post'] = $data['is_used_for_blog_post'] ?? null;
        $this->container['is_used_for_site_page'] = $data['is_used_for_site_page'] ?? null;
        $this->container['is_used_for_landing_page'] = $data['is_used_for_landing_page'] ?? null;
        $this->container['is_used_for_email'] = $data['is_used_for_email'] ?? null;
        $this->container['is_used_for_knowledge'] = $data['is_used_for_knowledge'] ?? null;
        $this->container['correct_cname'] = $data['correct_cname'] ?? null;
        $this->container['created'] = $data['created'] ?? null;
        $this->container['updated'] = $data['updated'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['domain'] === null) {
            $invalidProperties[] = "'domain' can't be null";
        }
        if ($this->container['is_resolving'] === null) {
            $invalidProperties[] = "'is_resolving' can't be null";
        }
        if ($this->container['is_used_for_blog_post'] === null) {
            $invalidProperties[] = "'is_used_for_blog_post' can't be null";
        }
        if ($this->container['is_used_for_site_page'] === null) {
            $invalidProperties[] = "'is_used_for_site_page' can't be null";
        }
        if ($this->container['is_used_for_landing_page'] === null) {
            $invalidProperties[] = "'is_used_for_landing_page' can't be null";
        }
        if ($this->container['is_used_for_email'] === null) {
            $invalidProperties[] = "'is_used_for_email' can't be null";
        }
        if ($this->container['is_used_for_knowledge'] === null) {
            $invalidProperties[] = "'is_used_for_knowledge' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id The unique ID of this domain.
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->container['domain'];
    }

    /**
     * Sets domain
     *
     * @param string $domain The actual domain or sub-domain. e.g. www.hubspot.com
     *
     * @return self
     */
    public function setDomain($domain)
    {
        $this->container['domain'] = $domain;

        return $this;
    }

    /**
     * Gets primary_landing_page
     *
     * @return bool|null
     */
    public function getPrimaryLandingPage()
    {
        return $this->container['primary_landing_page'];
    }

    /**
     * Sets primary_landing_page
     *
     * @param bool|null $primary_landing_page primary_landing_page
     *
     * @return self
     */
    public function setPrimaryLandingPage($primary_landing_page)
    {
        $this->container['primary_landing_page'] = $primary_landing_page;

        return $this;
    }

    /**
     * Gets primary_email
     *
     * @return bool|null
     */
    public function getPrimaryEmail()
    {
        return $this->container['primary_email'];
    }

    /**
     * Sets primary_email
     *
     * @param bool|null $primary_email primary_email
     *
     * @return self
     */
    public function setPrimaryEmail($primary_email)
    {
        $this->container['primary_email'] = $primary_email;

        return $this;
    }

    /**
     * Gets primary_blog_post
     *
     * @return bool|null
     */
    public function getPrimaryBlogPost()
    {
        return $this->container['primary_blog_post'];
    }

    /**
     * Sets primary_blog_post
     *
     * @param bool|null $primary_blog_post primary_blog_post
     *
     * @return self
     */
    public function setPrimaryBlogPost($primary_blog_post)
    {
        $this->container['primary_blog_post'] = $primary_blog_post;

        return $this;
    }

    /**
     * Gets primary_site_page
     *
     * @return bool|null
     */
    public function getPrimarySitePage()
    {
        return $this->container['primary_site_page'];
    }

    /**
     * Sets primary_site_page
     *
     * @param bool|null $primary_site_page primary_site_page
     *
     * @return self
     */
    public function setPrimarySitePage($primary_site_page)
    {
        $this->container['primary_site_page'] = $primary_site_page;

        return $this;
    }

    /**
     * Gets primary_knowledge
     *
     * @return bool|null
     */
    public function getPrimaryKnowledge()
    {
        return $this->container['primary_knowledge'];
    }

    /**
     * Sets primary_knowledge
     *
     * @param bool|null $primary_knowledge primary_knowledge
     *
     * @return self
     */
    public function setPrimaryKnowledge($primary_knowledge)
    {
        $this->container['primary_knowledge'] = $primary_knowledge;

        return $this;
    }

    /**
     * Gets secondary_to_domain
     *
     * @return string|null
     */
    public function getSecondaryToDomain()
    {
        return $this->container['secondary_to_domain'];
    }

    /**
     * Sets secondary_to_domain
     *
     * @param string|null $secondary_to_domain secondary_to_domain
     *
     * @return self
     */
    public function setSecondaryToDomain($secondary_to_domain)
    {
        $this->container['secondary_to_domain'] = $secondary_to_domain;

        return $this;
    }

    /**
     * Gets is_resolving
     *
     * @return bool
     */
    public function getIsResolving()
    {
        return $this->container['is_resolving'];
    }

    /**
     * Sets is_resolving
     *
     * @param bool $is_resolving Whether the DNS for this domain is optimally configured for use with HubSpot.
     *
     * @return self
     */
    public function setIsResolving($is_resolving)
    {
        $this->container['is_resolving'] = $is_resolving;

        return $this;
    }

    /**
     * Gets manually_marked_as_resolving
     *
     * @return bool|null
     */
    public function getManuallyMarkedAsResolving()
    {
        return $this->container['manually_marked_as_resolving'];
    }

    /**
     * Sets manually_marked_as_resolving
     *
     * @param bool|null $manually_marked_as_resolving manually_marked_as_resolving
     *
     * @return self
     */
    public function setManuallyMarkedAsResolving($manually_marked_as_resolving)
    {
        $this->container['manually_marked_as_resolving'] = $manually_marked_as_resolving;

        return $this;
    }

    /**
     * Gets is_ssl_enabled
     *
     * @return bool|null
     */
    public function getIsSslEnabled()
    {
        return $this->container['is_ssl_enabled'];
    }

    /**
     * Sets is_ssl_enabled
     *
     * @param bool|null $is_ssl_enabled is_ssl_enabled
     *
     * @return self
     */
    public function setIsSslEnabled($is_ssl_enabled)
    {
        $this->container['is_ssl_enabled'] = $is_ssl_enabled;

        return $this;
    }

    /**
     * Gets is_ssl_only
     *
     * @return bool|null
     */
    public function getIsSslOnly()
    {
        return $this->container['is_ssl_only'];
    }

    /**
     * Sets is_ssl_only
     *
     * @param bool|null $is_ssl_only is_ssl_only
     *
     * @return self
     */
    public function setIsSslOnly($is_ssl_only)
    {
        $this->container['is_ssl_only'] = $is_ssl_only;

        return $this;
    }

    /**
     * Gets is_used_for_blog_post
     *
     * @return bool
     */
    public function getIsUsedForBlogPost()
    {
        return $this->container['is_used_for_blog_post'];
    }

    /**
     * Sets is_used_for_blog_post
     *
     * @param bool $is_used_for_blog_post Whether the domain is used for CMS blog posts.
     *
     * @return self
     */
    public function setIsUsedForBlogPost($is_used_for_blog_post)
    {
        $this->container['is_used_for_blog_post'] = $is_used_for_blog_post;

        return $this;
    }

    /**
     * Gets is_used_for_site_page
     *
     * @return bool
     */
    public function getIsUsedForSitePage()
    {
        return $this->container['is_used_for_site_page'];
    }

    /**
     * Sets is_used_for_site_page
     *
     * @param bool $is_used_for_site_page Whether the domain is used for CMS site pages.
     *
     * @return self
     */
    public function setIsUsedForSitePage($is_used_for_site_page)
    {
        $this->container['is_used_for_site_page'] = $is_used_for_site_page;

        return $this;
    }

    /**
     * Gets is_used_for_landing_page
     *
     * @return bool
     */
    public function getIsUsedForLandingPage()
    {
        return $this->container['is_used_for_landing_page'];
    }

    /**
     * Sets is_used_for_landing_page
     *
     * @param bool $is_used_for_landing_page Whether the domain is used for CMS landing pages.
     *
     * @return self
     */
    public function setIsUsedForLandingPage($is_used_for_landing_page)
    {
        $this->container['is_used_for_landing_page'] = $is_used_for_landing_page;

        return $this;
    }

    /**
     * Gets is_used_for_email
     *
     * @return bool
     */
    public function getIsUsedForEmail()
    {
        return $this->container['is_used_for_email'];
    }

    /**
     * Sets is_used_for_email
     *
     * @param bool $is_used_for_email Whether the domain is used for CMS email web pages.
     *
     * @return self
     */
    public function setIsUsedForEmail($is_used_for_email)
    {
        $this->container['is_used_for_email'] = $is_used_for_email;

        return $this;
    }

    /**
     * Gets is_used_for_knowledge
     *
     * @return bool
     */
    public function getIsUsedForKnowledge()
    {
        return $this->container['is_used_for_knowledge'];
    }

    /**
     * Sets is_used_for_knowledge
     *
     * @param bool $is_used_for_knowledge Whether the domain is used for CMS knowledge pages.
     *
     * @return self
     */
    public function setIsUsedForKnowledge($is_used_for_knowledge)
    {
        $this->container['is_used_for_knowledge'] = $is_used_for_knowledge;

        return $this;
    }

    /**
     * Gets correct_cname
     *
     * @return string|null
     */
    public function getCorrectCname()
    {
        return $this->container['correct_cname'];
    }

    /**
     * Sets correct_cname
     *
     * @param string|null $correct_cname correct_cname
     *
     * @return self
     */
    public function setCorrectCname($correct_cname)
    {
        $this->container['correct_cname'] = $correct_cname;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime|null
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime|null $created created
     *
     * @return self
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime|null
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime|null $updated updated
     *
     * @return self
     */
    public function setUpdated($updated)
    {
        $this->container['updated'] = $updated;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


