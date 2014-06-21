php-address-format
------------------

Simple address formatting for the masses

#### Usage

```php
$af = new AddressFormat();
$formattedAddress = $af->format(array(
    'address' => '1234 Some St.',
    'address2' => 'Floor #67',
    'address3' => 'Unit #123',
    'city' => 'San Francisco',
    'subdivision' => 'CA',
    'postalCode' => '94105',
    'countryCode' => 'US'
));
```
will output
```php
array(
  '1234 Some St.',
  'Floor #67',
  'Unit #123',
  'San Francisco, CA 94105'
)
```

If a line does not have any information, it will be omitted.

No fields are required to call the formatter, but the only property that will invoke some logic is the [ISO 3166 Alpha-2 country code](http://www.iso.org/iso/country_codes.htm), for which an index can be found [here](https://www.iso.org/obp/ui/#search).

#### Contributions

Gladly accepting contributions, hopefully in the form of additional countries.  Regardless of current tests being a bit naive, please include tests for added countries to ensure the output is as expected.

#### Other implementations

* Node/JS - [arcreative/node-address-format](https://github.com/arcreative/node-address-format)
