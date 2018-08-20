Enumerable
===

### Installation
```
composer require `ronfroy/enumerable`
``


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


