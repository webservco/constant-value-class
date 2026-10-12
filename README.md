# webservco/constant-value-class

A PHP library.

Type-checked constants for PHP 7: a class whose only instances are its own constant values, so it can stand in for an enum.

> **Note:** PHP 8.1 and later have native [enumerations](https://www.php.net/manual/en/language.enumerations.php). Prefer those in new code.

- Requires: PHP 7.4 or 8.1+
- Based on: ["Expressive, type-checked constants for PHP"](https://www.webfactory.de/blog/expressive-type-checked-constants-for-php)

---

## Installation

```shell
composer require webservco/constant-value-class
```

---

## Usage

Implement the interface, use the trait, and add a static method for each constant.

```php
use WebServCo\ConstantValueClass\ConstantValueClassInterface;
use WebServCo\ConstantValueClass\ConstantValueClassTrait;

final class ShipmentType implements ConstantValueClassInterface
{
    use ConstantValueClassTrait;

    private const EXPORT = 1;
    private const IMPORT = 5;

    public static function export(): self
    {
        return self::constant(self::EXPORT);
    }

    public static function import(): self
    {
        return self::constant(self::IMPORT);
    }
}
```

Type-hint against the class, then pass a named instance or build one from a raw value.

```php
function send(ShipmentType $type): void
{
}

send(ShipmentType::import());
// From user input. Throws InvalidArgumentException for an unknown value.
send(ShipmentType::fromValue(5));

// 5 (int)
ShipmentType::import()->value();
// "5"
(string) ShipmentType::import();
// true
ShipmentType::fromValue(5) === ShipmentType::import();
```

---

## Contracts

| Interface | Implementation | Purpose |
| --- | --- | --- |
| `ConstantValueClassInterface` | `ConstantValueClassTrait` | `value()`, `fromValue()` and `__toString()` for the implementing class. |

Namespaces are relative to `WebServCo\ConstantValueClass\`.

---

## Notes

Only `int` and `string` constants count as values. `fromValue()` uses a strict comparison, so `fromValue('5')` throws when the constant is `5`.

Each value has only one instance per script run. That's why `===` works. An instance restored from a serialized session is a different object, though, so compare `value()` there.

---

## Development

```shell
# Lint, code style, static analysis (PHPStan, Phan, PHPMD, Psalm) and unit tests.
composer all
# Run unit tests.
composer test:d
```

---

## License

[MIT](LICENSE)
