# Postal-code-validator

Validate Formatting of World-Wide Postal Codes according this [Libaddressinput](https://github.com/googlei18n/libaddressinput) available at [AddressDataService](https://chromium-i18n.appspot.com/ssl-address)

### Breaking Changes:

+ Whitespace is always ignored in the regex.
+ Added the ability to check case sensitivity.

## Usage

### Check If Country Is Supported

    use Sirprize\PostalCodeValidator\Validator;
    
    $validator = new Validator();
    $validator->hasCountry('CH'); // returns true

### Check If Postal Code Is Properly Formatted

    use Sirprize\PostalCodeValidator\Validator;
    
    $validator = new Validator();
    $validator->isValid('CH', 'usjU87jsdf'); // returns false
    $validator->isValid('CH', '3007'); // returns true
    $validator->isValid('CA', 'h0h0h0'); // returns true
    $validator->isValid('CA', 'h0h0h0', true); // returns false, enable case sensitive regex.

### Get The Possible Formats For a Specific Country

    use Sirprize\PostalCodeValidator\Validator;
    
    $validator = new Validator();
    $validator->getFormats('GB'); // returns array('@@## #@@', '@#@ #@@', '@@# #@@', '@@#@ #@@', '@## #@@', '@# #@@')

## Formatting

+ `#` = `0-9`
+ `@` = `a-zA-Z`

## Country Codes

Postal-code-validator uses [ISO 3166](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2) 2-letter country codes

## License

See LICENSE.
