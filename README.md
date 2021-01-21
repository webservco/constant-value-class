# webservco/constant-value-class

A Constant Value Class implementation.

Based on the article ["Expressive, type-checked constants for PHP"](https://www.webfactory.de/blog/expressive-type-checked-constants-for-php).

---

## Example

### Constant Value Class

Please see `tests/unit/WebServCo/ConstantValueClass/Example.php`

### Usage

```php
class Shipment
{
    public function send(Type $type) : bool
    {
        // ...
    }
}
$shipment = new Shipment();
$shipment->send(Type::import());

// or
$type = 2; // request parameter, user input, etc
$shipment->send(Type::fromValue($type));

// get value (eg. for form select)
echo Type::import()->value(); // outputs "1"

// comparison
$import = Type::fromValue(2);
if (Type::import() === $import) {
    // === works as long as the object is created in the current script run
    // not for example created elsewhere and stored serialized in session.
}
```

---
