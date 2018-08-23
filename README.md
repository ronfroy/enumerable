Enumerable
===

### Installation
```
composer require `ronfroy/enumerable`
```


### Declaration

```
use Enumerable\Enumerable;

/**
 * Status enum
 */
class Status extends Enumerable
{
    const IN_PROGRESS = 'in_progress';
    const PENDING = 'pending';
    const DISABLE = 'disable';
}

```

### Usage

```
Status::IN_PROGRESS; // value notation

new Status(Status::IN_PROGRESS); // object notation

```


### Documentation


Methods:

- `__construct()` Instantiate a new enum as object
- `__toString()` Display the enum value as string
- `__invoke` Return the enum value
- `equals()` Tests whether enum instances or value are equal

Static methods:

- `getAll()` returns all possible values as an array (name in key, value in value)
- `isValidName()` Check if tested name is valid on enum set
- `isValidValue()` Check if tested value is valid on enum set
