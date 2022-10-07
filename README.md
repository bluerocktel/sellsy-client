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
    - [Operations](#usage_query_operations)
  - [Examples](#usage_examples)
    - [Index](#usage_query_index)
    - [Show](#usage_query_show)
    - [Create](#usage_query_create)
    - [Update](#usage_query_update)
    - [Delete](#usage_query_delete)
- [Contribute](#contribute)
- [Credits](#credits)
- [License](#license)


## Introduction
<a name="introduction"></a>

> This package supports the Sellsy API at version 2. If you're looking for a client to query the version 1, checkout [TeknooSoftware/sellsy-client](https://github.com/TeknooSoftware/sellsy-client).  

This client is a PHP implementation of the Sellsy API. It's a wrapper around the Guzzle HTTP client. It's designed to be as simple as possible to use.

- You may read...  

```php
$units   = new Bluerock\Sellsy\Api\UnitsApi();
$results = $units->index()->entities();
```

- You may search...  

```php
$units = new Bluerock\Sellsy\Api\CompaniesApi();
$results = $units->search([
  'email'       => 'contact@example.com',
  'type'        => 'prospect',
  'is_archived' => false,
])->entities();
```

- And also write.  

```php
use Bluerock\Sellsy\Entities;

$contacts = new Bluerock\Sellsy\Entities\Contact();
$contacts->store(new Entities\Contact([
    'civility'   => 'mr',
    'first_name' => 'Jean',
    'last_name'  => 'MOULIN',
    'email'      => 'user@example.com',
    'sync'       => new Entities\ContactSync(),
]));
```

The package is still a work in progress. If you're missing some endpoint implementation, do not hesitate to contribute or open an issue on this repo. You'll find below an array of the endpoints implementation status.

### Client's Endpoints status

✅ = Fully implemented  
🆚 = Partially implemented  
🅾️ = Not yet implemented  

| Category | Endpoint | Status |   
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
| **Prospection** | Individuals | 🅾️ |  
| **Prospection** | Opportunities | 🅾️ |  
| **Prospection** | Calendar | 🅾️ |  
| **Prospection** | Emails | 🅾️ |  
| **Prospection** | Comments | 🅾️ |  
| **Prospection** | Tasks | 🅾️ |  
| **Prospection** | PhoneCalls | 🅾️ |  
| **Prospection** | CRM Activities | 🅾️ |  
| **Prospection** | Estimates | 🅾️ |  
| **Catalog** | Items | 🅾️ |  
| **Catalog** | Units | ✅ |  
| **Catalog** | Taxes | ✅ |  
| **Invoicing** | Accounting | 🅾️ |  
| **Invoicing** | Purchase (OCR) | 🅾️ |  
| **Invoicing** | Payments | 🅾️ |  
| **Invoicing** | Invoices | 🅾️ |  
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

## Installation
<a name="installation"></a>

| PHP version | Client version |  
| :--------: | :------: |  
| `>=8.1` | `^2.0` |  
| `^8.0` | `^2.0` |  
| `^7.4` | `^1.0` |  

Get the library using composer :  

```
composer require bluerock/sellsy-client
```

Alternatively, you can specify the desired version :  

```
composer require bluerock/sellsy-client:^1.0
composer require bluerock/sellsy-client:dev-dev-2.x
```

## Usage
<a name="usage"></a>

## Authenticate
<a name="usage_auth"></a>

> ℹ At this moment, this package only supports "Personnal" OAuth client credentials authentication.  

Before calling any API, you **MUST** provide your credentials using the `Config` class :  

```php
use Bluerock\Sellsy\Core\Config;

Bluerock\Sellsy\Core\Config::getInstance()
      ->set('client_id', 'f48f0fgm-2703-5689-2005-27403b5adb8d')
      ->set('client_secret', 'av8v94jx0ildsjje50sm9x1hnmjsg27bnqyryc0zgbmtxxmzpjzlw2vnj9aockwe')
      ->set('url', 'https://api.sellsy.com/v2/'): // optional, this is the default value.
```

[Learn more](https://api.sellsy.com/doc/v2/#section/Authentication) about Sellsy API v2 credentials.

## Querying the API
<a name="usage_query"></a>

### The basics
<a name="usage_query_basic"></a>

Each domain (eg: `Contacts`, `Items`, `Taxes`) is represented by a class. Each class contains methods that represent the endpoints of the related domain.  
The easiest way to start querying the API is by initializing the corresponding class :  

```php
use Bluerock\Sellsy\Api\ContactsApi;

$contacts = new ContactsApi();
$contacts->index();
$contacts->show($contact_id);
[...]
```

You may also make use of the `Client` helper that holds all API namespaces and returns instance based on the called method.    

```php
use Bluerock\Sellsy\Core\Client;

# Creating an instance...
$client = new Client();
$client->contacts()->show($contact_id);

# ... or statically.
Client::taxes()->index();
```

### Operations & methods
<a name="usage_query_operations"></a>

This client is using the CRUD operations keywords to name API enpoint methods. :  

| Client Keyword | Related operation |  
|---|---|  
| `index` | List resources. |  
| `show` | Get a single resource. |  
| `create` | Create a single resource. |  
| `update` | Update a single resource. |   
| `destroy` | Delete a single resource. |   
| `search` | Search resources. |   

When issuing a request using one of these methods, you'll get back the api class object containing a response. If something goes wrong, a `RequestException` will be thrown.  

When the request gives back one or multiple items in the response (generally on `index`, `show` or `search` endpoints), the client will parse them into DataTransfertObjects for you.  
Call `entity()` or `entities()` on the given response to get thoses objects back : 

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

If there are embed entities in the response, they will be automatically parsed into subsequent DTOs.
Sometime you just want a raw response, when this happens you can use the `json()` method :  

```php
var_dump(
  Bluerock\Sellsy\Core\Client::taxes()->index()->json()
);

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

You can always call `->toArray()` method on a entity or collection DTO to get back an array representation of it.
The same goes for sending entities to Sellsy API (generally on `create` or `update` endpoints), the related methods will ask for a DTO as parameter.  

```php
use Bluerock\Sellsy\Entities;

$contacts = new ContactsApi();

$contacts->store(new Entities\Contact([
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
    'sync' => new Entities\ContactSync(),
]));
```

Here are the available methods on the response : 

```php
use Bluerock\Sellsy\Api\ContactsApi;

$contacts = new ContactsApi();

$api = $contacts->index();   # List
$api = $contacts->get(123);  # Get

$api->entity();      # Get single resource entity, when available
$api->entities();    # Get resource entities collection, when available (for listing/search)
$api->pagination();  # Get the pagination object, when available
$api->json();        # Get raw json data from response, as associative array
$api->response();    # Get the \Illuminate\Http\Client\Response object
``` 

Under the hood, this client uses the [Laravel HTTP client](laravel.com/docs/7.x/http-client), which is a minimal wrapper around the [Guzzle HTTP client](https://docs.guzzlephp.org/en/stable/). By calling the `response()` method, you get a `Response` object containing a variety of methods that may be used to inspect the response :  

```php
$api->response()->body(): string;
$api->response()->json(): array|mixed;
$api->response()->status(): int;
$api->response()->ok(): bool;
$api->response()->successful(): bool;
$api->response()->failed(): bool;
$api->response()->serverError(): bool;
$api->response()->clientError(): bool;
$api->response()->header($header): string;
$api->response()->headers(): array;
```

Also, make sure to have a look at [spatie/data-transfer-object](https://github.com/spatie/data-transfer-object) package to learn more about DTOs.

## Examples
<a name="usage_examples"></a>

#### Index
<a name="usage_query_list"></a>

To list a resource, use the `index()` method. This method accept query parameters as only argument.  

```php
$contacts = new ContactsApi();

$index = $contacts->index();

$index->entities();    // The API entities
$index->pagination();  // The pagination DTO
```

#### Show
<a name="usage_query_show"></a>

To show a resource, use the `show()` method. This method accept the resource id as first parameter : 

```php
$contacts = new ContactsApi();

$contacts->show(123)->entity();
```

This returns a `Bluerock\Sellsy\Entities\Contact` instance :  

```php
Bluerock\Sellsy\Entities\Contact^ {
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
Bluerock\Sellsy\Entities\Contact^ {
  +id: 35520506
  +email: "contact+atest@sellsy.com"
  [...]
  +invoicing_address: Bluerock\Sellsy\Entities\Address^ {
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
    +geocode: Bluerock\Sellsy\Entities\Geocode^ {
      +lat: 42.1040
      +lng: 6.43010
    }
  }
}
```

#### Create
<a name="usage_query_create"></a>

When creating a resource, the `store()` method should be called. This method expect the entity object as first argument and `$query` parameters as second argument :  

```php
use Bluerock\Sellsy\Entities\Contact;
use Bluerock\Sellsy\Entities\ContactSync;
use Bluerock\Sellsy\Entities\ContactSocials;

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

The API returns the entity, therefore you can chain `->entity()` to retreive the created entity. 


#### Update
<a name="usage_query_update"></a>

When updating a resource, the `update()` method should be called. This method expect the Contact entity to be updated as first parameter and `$query` parameters as second argument :  

```php
use Bluerock\Sellsy\Entities\Contact;

$contacts = new ContactsApi();

$contacts->update(new Contact([
    'id'         => 35536947,
    'first_name' => 'Jean',
    'last_name'  => 'CASTEX',
    'note'       => '',
]));
```

The API returns the entity, therefore you can chain `->entity()` to retreive the created entity. 

#### Delete
<a name="usage_query_delete"></a>

When deleting a resource, the `destroy()` method should be called. This method only expect the resource id to be deleted :  

```php
$contacts->delete(123)->json();
```

## Contribute
<a name="contribute"></a>

Feel free to contribute to the package !  
If you find any security issue, please contact me at thomas@hydrat.agency instead of creating a public github issue.  

[First contribution guide](https://github.com/firstcontributions/first-contributions/blob/master/README.md)


## Credits
<a name="credits"></a>

- [BluerockTel](https://bluerocktel.com)
- [Thomas Georgel](https://github.com/tgeorgel)
- [All Contributors](../../contributors)

## License
<a name="license"></a>

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.