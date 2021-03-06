Enumerable
===

[![Build Status](https://travis-ci.org/ronfroy/enumerable.svg?branch=master)](https://travis-ci.org/ronfroy/enumerable)

### Installation
```
composer require ronfroy/enumerable
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

- `__construct($value)` Instantiate a new enum as object
- `__toString()` Display the enum value as string
- `__invoke` Return the enum value
- `equals($enum)` Tests whether enum instances or value are equal

Static methods:

- `getAll()` returns all possible values as an array (name in key, value in value)
- `isValidName($name)` Check if tested name is valid on enum set
- `isValidValue($value)` Check if tested value is valid on enum set
- `compare($enum1, $enum2)` Tests whether two enum instances or value are equal
