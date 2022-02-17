# Sellsy API V2 PHP client

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/hydrat-agency/sellsy-client.svg?style=flat-square)](https://packagist.org/packages/hydrat-agency/sellsy-client)
[![Total Downloads](https://img.shields.io/packagist/dt/hydrat-agency/sellsy-client.svg?style=flat-square)](https://packagist.org/packages/hydrat-agency/sellsy-client)

- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
  - [Authenticate](#usage_auth)
  - [Query the API](#usage_query)
    - [The basics](#usage_query_basic)
    - [Operations](#usage_query_operations)
    - [Show a resource](#usage_query_show)
    - [Create a resource](#usage_query_create)
- [Contribute](#contribute)
- [Credits](#credits)
- [License](#license)


⚠️ This client is used to query the Sellsy API V2.  
If you're looking for a client to query the V1 API, checkout [TeknooSoftware/sellsy-client](https://github.com/TeknooSoftware/sellsy-client) instead.

## Introduction
<a name="introduction"></a>

// TODO
## Installation
<a name="installation"></a>

This library requires PHP >= `7.4`.  

Grab the library using composer :  

```
composer require hydrat-agency/sellsy-client
```

## Usage
<a name="usage"></a>

## Authenticate
<a name="usage_auth"></a>

This package only supports Single user OAuth authentication.  
Before calling any api class nor the client helper, you MUST provide your credentials via the `Config` class :  

```php
use Hydrat\Sellsy\Api\ContactsApi;
use Hydrat\Sellsy\Core\Client;
use Hydrat\Sellsy\Core\Config;

$config = Config::getInstance();

$config->set('url', 'https://api.sellsy.com/v2/') // optionnal, this is the default value.
       ->set('client_id', 'f48f0fgm-2703-5689-2005-27403b5adb8d')
       ->set('client_secret', 'av8v94jx0ildsjje50sm9x1hnmjsg27bnqyryc0zgbmtxxmzpjzlw2vnj9aockwe');

$this->v2 = new Client();
```

[Learn more](https://api.sellsy.com/doc/v2/#section/Authentication) about Sellsy API v2 credentials.

## Query the API
<a name="usage_query"></a>

### The basics
<a name="usage_query_basic"></a>

Using the Client helper : 

```php
use Hydrat\Sellsy\Core\Client;

$client = new Client();

$client->contacts()->index()
$client->contacts()->show($client_id)
$client->contacts()->update()
$client->contacts()->create()

// Or statically :
Client::contacts()->index()
```

Using the API class : 

```php
use Hydrat\Sellsy\Api\ContactsApi;

$contacts = new ContactsApi();

$contacts->index()
$contacts->show($client_id)
$contacts->update()
$contacts->create()
```

### Operations
<a name="usage_query_operations"></a>

ℹ️ To illustrate this part of the documentation we will query the [ContactsApi](https://api.sellsy.com/doc/v2/#tag/Contacts).

This client is using the CRUD operations keywords to name API methods :  

| Client Keyword | Related operation |
|---|---|---|
| `index` | List resources. | 
| `show` | Get a single resource. |
| `create` | Create a single resource. | 
| `update` | Update a single resource. |  
| `destroy` | Delete a single resource. |  

e.g: To list Contacts, you should use `index()` method :  

```php
use Hydrat\Sellsy\Api\ContactsApi;

$contacts = new ContactsApi();

$contacts->index()->entity(); # Get resources entities
$contacts->index()->json();   # Get raw data from response
```

#### List a resource
<a name="usage_query_list"></a>

To show a resource, we use the `index()` method. This method accept query parameters as argument.  

```php
$contacts = new ContactsApi();

$index = $contacts->index();

$index->entities();    // The api entities
$index->pagination();  // The pagination object
```

#### Show a resource
<a name="usage_query_show"></a>

To show a resource, we use the `show()` method. This method accept the contact ID as first parameter : 

```php
$contacts = new ContactsApi();

$contacts->show(35520506)->entity();
```

This returns a `Hydrat\Sellsy\Entities\Contact` instance :  

```php
Hydrat\Sellsy\Entities\Contact^ {
  +id: 35520506
  +civility: "ms"
  +first_name: "Amélie"
  +last_name: "PETIT"
  +email: "contact+atest@sellsy.com"
  +website: null
  +phone_number: null
  +mobile_number: null
  +fax_number: null
  +position: "Gérante"
  +birth_date: null
  +avatar: null
  +note: ""
  +social: Hydrat\Sellsy\Entities\ContactSocials^ {
    +twitter: null
    +facebook: null
    +linkedin: null
    +viadeo: null
  }
  +sync: Hydrat\Sellsy\Entities\ContactSync^ {
    +mailchimp: true
    +mailjet: true
    +simplemail: true
  }
  +is_archived: false
  +invoicing_address_id: null
  +delivery_address_id: null
  +invoicing_address: null
  +delivery_address: null
  +created: "2022-02-16T15:56:17+01:00"
  +owner: array:2 [
    "id" => 214007
    "type" => "staff"
  ]
}
```

As described in the [Sellsy documentation](https://api.sellsy.com/doc/v2/#operation/get-contact), you may also send query parameters `embed` and `field`. This can be done by specifying the query parameters as the second argument of the `show()` method :  

```php
$query = [
  'embed' => [
    'invoicing_address',
  ],
  'field' => [
    'first_name',
    'email',
  ],
];

$contacts->show(123, $query)->entity();
```

When specifing `$embed` entities, the client will automatically parse them into subsequent entity classes :  

```php
Hydrat\Sellsy\Entities\Contact^ {
  +id: 35520506
  +civility: "ms"
  +first_name: "Amélie"
  +last_name: "PETIT"
  +email: "contact+atest@sellsy.com"
  [...]
  +invoicing_address: Hydrat\Sellsy\Entities\Address^ {
    +id: 128934588
    +name: "Domicile"
    +address_line_1: "34 Rue du moulin"
    +address_line_2: ""
    +address_line_3: ""
    +address_line_4: ""
    +postal_code: "75001"
    +city: "Paris"
    +country: "France"
    +country_code: "FR"
    +is_invoicing_address: true
    +is_delivery_address: false
    +geocode: Hydrat\Sellsy\Entities\Geocode^ {
      +lat: 42.1040
      +lng: 6.43010
    }
  }
}
```

#### Create a resource
<a name="usage_query_create"></a>

When creating a resource, the `store()` method should be called. This method expect the entity object as first parameter :  

```php
use Hydrat\Sellsy\Entities\Contact;
use Hydrat\Sellsy\Entities\ContactSync;
use Hydrat\Sellsy\Entities\ContactSocials;

$contacts = new ContactsApi();

$contacts->store(new Contact([
    'civility'      => 'mr',
    'first_name'    => 'Jean',
    'last_name'     => 'MOULIN',
    'email'         => 'user@example.com',
    'website'       => 'example.com',
    'mobile_number' => '0612121212',
    'position'      => 'Directeur',
    'social'        => new ContactSocials([
        'twitter' => 'https://twitter.com/u/example',
    ]),
    'sync'          => new ContactSync(),
]));
```

The API returns the entity, and therefore you can chain `->entity()` to retreive the created entity.  
The `store()` method accept a `$query` parameters variable as second argument.  


#### Update a resource
<a name="usage_query_update"></a>

When updating a resource, the `update()` method should be called. This method expect the Contact entity to be updated :  

```php
use Hydrat\Sellsy\Entities\Contact;

$contacts = new ContactsApi();

$contacts->update(new Contact([
    'id'         => 35536947,
    'first_name' => 'Jean',
    'last_name'  => 'CASTEX',
    'note'       => '',
]));
```

The API returns the entity, and therefore you can chain `->entity()` to retreive the created entity. 
The `store()` method accept a `$query` parameters variable as second argument.  

#### Delete a resource
<a name="usage_query_delete"></a>

When deleting a resource, the `destroy()` method should be called. This method expect the Contact ID to be deleted :  

```php
$contacts->delete(35536947)->json();
```

This client return DTO objects, and expect DTO objects as argument when updating or creating entities in the API.
Under the hood, we are using the [spatie/data-transfer-object](https://github.com/spatie/data-transfer-object) library, so make sure to consult their ducumentation to use DTO Entities objects properly.


## Contribute
<a name="contribute"></a>

Feel free to contribute to the package !  
If you find any security issue, please contact me at thomas@hydrat.agency instead of creating a public github issue.  

[First contribution guide](https://github.com/firstcontributions/first-contributions/blob/master/README.md)


## Credits
<a name="credits"></a>

- [Thomas Georgel](https://github.com/tgeorgel)
- [All Contributors](../../contributors)

## License
<a name="license"></a>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.