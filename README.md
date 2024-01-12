# Sellsy API V2 PHP client

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/bluerock/sellsy-client.svg?style=flat-square)](https://packagist.org/packages/bluerock/sellsy-client)
[![Total Downloads](https://img.shields.io/packagist/dt/bluerock/sellsy-client.svg?style=flat-square)](https://packagist.org/packages/bluerock/sellsy-client)

- [Introduction](#introduction)
- [Installation](#installation)
- [Usage](#usage)
  - [Authenticate](#usage_auth)
  - [Query the API](#usage_query)
    - [The basics](#usage_query_basic)
    - [Requests](#usage_requests)
    - [Responses](#usage_responses)
  - [Examples](#usage_examples)
- [Developments status](#dev_status)
- [Contribute](#contribute)
- [Credits](#credits)
- [License](#license)


## Introduction
<a name="introduction"></a>

This package is a PHP client for the Sellsy API. It's a light wrapper around the Guzzle HTTP client. It's designed to be as simple as possible to use, while being robust.

The client **only supports the V2 of Sellsy API**. If you're looking for a V1 client, checkout [TeknooSoftware/sellsy-client](https://github.com/TeknooSoftware/sellsy-client) instead.  

To ensure a consistent data exchange between Sellsy and this client, we're making use of DTO classes to define the structure of the shared entities. Thoses classes are defined in the `Bluerock\Sellsy\Entities` namespace : 

```php
use Bluerock\Sellsy\Entities;
use Bluerock\Sellsy\Api;

# create a new Contact instance using the related DTO
$contact = new Entities\Contact([
    'civility'      => 'mr',
    'first_name'    => 'Jean',
    'last_name'     => 'MOULIN',
    'email'         => 'user@example.com',
    'website'       => 'example.com',
    'mobile_number' => '0612121212',
    'position'      => 'Directeur',
    'social'        => new Entities\ContactSocials([
        'twitter' => 'https://twitter.com/u/example',
    ]),
]);

# store the freshly created Contact into Sellsy
$api = new Api\ContactsApi();
$response = $api->store($contact);

var_dump(
    $response->json()
);
```

This also mean you will get back DTO entities from the Sellsy API when performing GET requests : 

```php
$api = new Bluerock\Sellsy\Api\CompaniesApi();

# ... GET single entity
$company = $api->find("123")->entity();

# ... GET collection of entities (index, search..)
$companies = $api->index()->entities();
```

If you're unfamiliar with DTOs or need some documentation on it, make sure to have a look at the [spatie/data-transfer-object](https://github.com/spatie/data-transfer-object) package, used by this client.

Please keep in mind that this package is still in development. If you're missing an [endpoint implementation](#dev_status), do not hesitate to [contribute](#contribute) or open an issue on this repository.

## Installation
<a name="installation"></a>

#### Requirements

- PHP `>= 7.4`
- Composer

#### Installation via composer

```bash
composer require bluerock/sellsy-client               # latest compatible version 

composer require bluerock/sellsy-client:^1.0          # specific version 
composer require bluerock/sellsy-client:dev-dev-2.x   # development branch 
```

## Usage
<a name="usage"></a>

## Authenticate
<a name="usage_auth"></a>

This package supports the following authentication methods : 
 - "Personnal" OAuth client credentials
 
Before querying Sellsy API, you must provide your credentials using the `Config` class :  

```php
$config = Bluerock\Sellsy\Core\Config::getInstance();

$config->set('client_id', 'f48f0fgm-2703-5689-2005-27403b5adb8d')
      ->set('client_secret', 'av8v94jx0ildsjje50sm9x1hnmjsg27bnqyryc0zgbmtxxmzpjzlw2vnj9aockwe')
      ->set('url', 'https://api.sellsy.com/v2/'): // not required: this is the default value.
```

Learn more about Sellsy API v2 credentials on the [official documentation](https://api.sellsy.com/doc/v2/#section/Authentication).


### Connect to multiple Sellsy accounts
<a name="usage_auth_multi_account"></a>

You can connect to many Sellsy accounts at the same time. You just need to configure each instance,
then switch to one or another with `Config::switchInstance()` (returns a `Config` object for that specific account)
 
```php
// Configure the first Sellsy account
Bluerock\Sellsy\Core\Config::switchInstance('first-sellsy')
    ->set('client_id', 'id-1')
    ->set('client_secret', 'secret1');

// Configure another one
Bluerock\Sellsy\Core\Config::switchInstance('other-sellsy')
    ->set('client_id', 'id-2')
    ->set('client_secret', 'secret2');

// From now, each request is on the 'other-sellsy' account
// ...

// To switch back to the first account
Bluerock\Sellsy\Core\Config::switchInstance('first-sellsy');
```


## Querying the API
<a name="usage_query"></a>

### The basics
<a name="usage_query_basic"></a>

Each API domain is represented by a plurialized class (eg: `Contacts`, `Items`, `Taxes`). Each class contains methods used to perform requests agaisn't the domain's endpoints.  

The easiest way to start querying the API is by initializing the corresponding class :  

```php
use Bluerock\Sellsy\Api\ContactsApi;

$contacts = new ContactsApi();
$contacts->index();
$contacts->search($filters);
$contacts->show($contact_id);
$contacts->store($contact);
```

You may also make use of the `Client` facade that holds all domains to easily instanciate the corresponding class by calling a method :      

```php
use Bluerock\Sellsy\Core\Client;

# via an instance...
$client = new Client();
$client->contacts()->show($contact_id);

# ... or statically.
Client::taxes()->index();
```

### Requests 
<a name="usage_requests"></a>

This client is using the Laravel CRUD operations keywords to name methods :  

| HTTP Operation | Client Method | Related operation |  
|---|---|---|  
| GET | `index` | List resources. |  
| GET | `show` | Get a single resource. |  
| POST | `create` | Create a single resource. |  
| UPDATE | `update` | Update a single resource. |   
| DELETE | `destroy` | Delete a single resource. |   
| GET | `search` | Search resources. |   

Any additional method described in the domain's documentation would follow the camel case convention. For example, additional [Companies](https://api.sellsy.com/doc/v2/#tag/Companies) methods would look like this : 

| Operation | Client Method |  
|---|---|  
| Get a company address. | `CompaniesApi::showAddress(...)` |  
| Update a company address. | `CompaniesApi::updateAddress(...)` |  
| Link a contact at one company. | `CompaniesApi::linkContact(...)` |  

### Responses 
<a name="usage_responses"></a>

When issuing a request, you will get back a `Bluerock\Sellsy\Core\Response` object holding methods to verify and read the response.  

You can inspect the response using any of those methods : 

```php
$response->entity();      # Get single resource entity, when available
$response->entities();    # Get resource entities collection, when available (for listing/search)
$response->pagination();  # Get the pagination object, when available
$response->type();        # Returns the type of the data, between "listing" and "single" 
$response->json();        # Get raw json data from response, as an associative array
$response->base();        # Get the underlying \Illuminate\Http\Client\Response object

$response->body(): string;
$response->json(): array|mixed;
$response->status(): int;
$response->ok(): bool;
$response->successful(): bool;
$response->failed(): bool;
$response->serverError(): bool;
$response->clientError(): bool;
$response->header($header): string;
$response->headers(): array;
``` 

By default, the Request will throw a `RequestException` if the request returns an error (status code `4xx —> 5xx`). You can easily catch this exception and handle it as you wish :  

```php
/**
 * @return \Bluerock\Sellsy\Entities\Contact|false
 * @throws \Illuminate\Http\Client\RequestException
 */
public function maybeFindMyContact($contact_id)
{
    try {
        return Bluerock\Sellsy\Core\Client::contacts()
                    ->show($contact_id)
                    ->entity();
    } catch (\Illuminate\Http\Client\RequestException $e) {
        # return false if the contact is not found (404 error).
        if ($e->response->clientError() && $e->response->status() === 404) {
          return false;
        }

        # throw the exception for any other status code.
        throw $e;
    }
}
```


#### Some notes on response & DTOs  

To retrieve the DTO entities from the Response, you may call one of `entity()` and `entities()` methods : 

```php  
var_dump(
  Bluerock\Sellsy\Core\Client::taxes()->index()->entities()
);

// Output :
Bluerock\Sellsy\Collections\TaxCollection^ {
  #iterator: ArrayIterator {#5776
    -storage: array:6 [
      0 => Bluerock\Sellsy\Entities\Tax^ {
        +id: 4099258
        +rate: 20
        +label: ""
      }
      1 => Bluerock\Sellsy\Entities\Tax^ {
        +id: 4099259
        +rate: 10
        +label: ""
      }
    ]
  }
}
```

If some additionnal entities are embed in the response, they will be automatically parsed into subsequent DTOs.  

If you need to read the raw response, it is always possible to use the `json()` method :  

```php
var_dump(
  Bluerock\Sellsy\Core\Client::taxes()->index()->json()
);

// Output :
array:2 [
  "data" => array:6 [
    0 => array:4 [
      "id" => 4099258
      "is_active" => true
      "rate" => 20
      "label" => ""
    ]
    1 => array:4 [
      "id" => 4099259
      "is_active" => true
      "rate" => 10
      "label" => ""
    ]
  ],
  "pagination" => array:4 [
    "limit" => 100
    "count" => 6
    "total" => 6
    "offset" => "WyI0MDk5MjYzIl0="
  ]
]
```

## Examples
<a name="usage_examples"></a>

#### Index
<a name="usage_query_list"></a>

Listing a resource, is done by using the `index()` method, which accept query parameters as only argument.  

```php
$contactsApi = new ContactsApi();

$response = $contactsApi->index([
  'limit'  => 10,
  'offset' => 0,
  'embed'  => [
      'invoicing_address',
      'main_contact',
      'dunning_contact',
      'invoicing_contact',
      'smart_tags',
  ],
]);

$response->entities();    // The API entities
$response->pagination();  // The pagination DTO
```

#### Show
<a name="usage_query_show"></a>

The show method accept the resource id as first parameter and query parameters as second : 

```php
$response = $contactsApi->show('123', [
    'embed' => [
        'smart_tags'
    ],
]);

$response->entity();    // The API entity
```

This would return a `Bluerock\Sellsy\Entities\Contact` instance :  

```php
Bluerock\Sellsy\Entities\Contact^ {
  +id: 12345
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
  +social: Bluerock\Sellsy\Entities\ContactSocials^ {
    +twitter: null
    +facebook: null
    +linkedin: null
    +viadeo: null
  }
  +sync: Bluerock\Sellsy\Entities\ContactSync^ {
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
    "id" => 567
    "type" => "staff"
  ]
}
```

#### Create
<a name="usage_query_create"></a>

The store method, used to create a resource, expect the entity object as first argument and may have `$query` parameters as second argument :  

```php
use Bluerock\Sellsy\Entities;

$contactsApi->store(new Entities\Contact([
    'civility'      => 'mr',
    'first_name'    => 'Jean',
    'last_name'     => 'MOULIN',
    'email'         => 'user@example.com',
    'website'       => 'example.com',
    'mobile_number' => '0612121212',
    'position'      => 'Directeur',
    'sync'          => new Entities\ContactSync(),
    'social'        => new Entities\ContactSocials([
        'twitter' => 'https://twitter.com/u/example',
    ]),
]));

$response->entity();  // The created entity
$response->json();    // The Sellsy response
```


#### Update
<a name="usage_query_update"></a>

The update method expect the resource to be updated as first parameter and `$query` parameters as second argument :  

```php
use Bluerock\Sellsy\Entities;

$contactsApi->update(new Entities\Contact([
    'id'         => 35536947,
    'first_name' => 'Jean',
    'last_name'  => 'CASTEX',
    'note'       => '',
]));

$response->entity();  // The updated entity
$response->json();    // The Sellsy response
```

Here, the "id" parameter is extracted from the given Contact entity.

#### Delete
<a name="usage_query_delete"></a>

When deleting a resource, the destroy method should be called. This method only expect the resource id to be deleted :  

```php
$contactsApi->delete(123)->json();
```

## Developments status
<a name="dev_status"></a>

✅ = Fully implemented  
🆚 = Partially implemented  
🅾️ = Not yet implemented  

| Category | Domain | Status |   
| :--------: | :------: | :---: |  
| **Core** | Batch | 🅾️ |  
| **Core** | API Management | 🅾️ |  
| **Core** | Webhooks | 🅾️ |  
| **Core** | Listings | 🅾️ |  
| **Core** | Activities | 🅾️ |  
| **Core** | Custom Activities | 🅾️ |  
| **Core** | Files | 🅾️ |  
| **Prospection** | Companies | ✅ |  
| **Prospection** | Contacts | ✅ |  
| **Prospection** | Individuals | ✅ |  
| **Prospection** | Opportunities | 🅾️ |  
| **Prospection** | Calendar | 🅾️ |  
| **Prospection** | Emails | 🅾️ |  
| **Prospection** | Comments | 🅾️ |  
| **Prospection** | Tasks | 🅾️ |  
| **Prospection** | PhoneCalls | 🅾️ |  
| **Prospection** | CRM Activities | 🅾️ |  
| **Prospection** | Estimates | 🅾️ |  
| **Catalog** | Items | 🆚️ |  
| **Catalog** | Units | ✅ |  
| **Catalog** | Taxes | ✅ |  
| **Invoicing** | Accounting | 🅾️ |  
| **Invoicing** | Rate Categories | ✅ |  
| **Invoicing** | Purchase (OCR) | 🅾️ |  
| **Invoicing** | Payments | 🅾️ |  
| **Invoicing** | Invoices | 🆚️ |  
| **Invoicing** | Credit Notes | 🅾️ |  
| **Account** | Currencies | 🅾️ |  
| **Account** | Custom Fields | 🅾️ |  
| **Account** | Countries | 🅾️ |  
| **Account** | Smart Tags | 🅾️ |  
| **Account** | Documents | 🅾️ |  
| **Account** | Staffs | 🅾️ |  
| **Account** | Subscription | 🅾️ |  
| **Account** | Quotas | 🅾️ |  
| **Account** | Conformities | 🅾️ |  
| **Account** | Notifications | 🅾️ |  
| **Account** | Fiscal Year | 🅾️ |  

## Contribute
<a name="contribute"></a>

Feel free to contribute to the package !  
If you find any security issue, please contact me at thomas@bluerocktel.com instead of creating a public github issue.  

[First contribution guide](https://github.com/firstcontributions/first-contributions/blob/master/README.md)


## Credits
<a name="credits"></a>

- [BlueRockTEL](https://bluerocktel.com)
- [Thomas Georgel](https://github.com/tgeorgel)
- [All Contributors](../../contributors)

## License
<a name="license"></a>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.