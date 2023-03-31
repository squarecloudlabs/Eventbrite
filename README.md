# Eventbrite
( Note this is very out of data ... not recomended )

Eventbrite APIs for Laravel 5.

### Installation

Begin by installing this package through Composer.

```js
{
    "require": {
        "sqrc/eventbrite": "dev-master"
    }
}
```

### Getting started

To create a new event:
```php
$eventbrite = new \Sqrc\Eventbrite\Eventbrite("YOUR_APP_KEY", "YOUR_USER_KEY");

// Creates a new event
$eventbrite->createEvent('Hackfest for all', 'Code for 30 Hours straight.', $startDate, $endDate, $timezone, $details);
```

*Better documentation coming soon.*

### Laravel 5

I have just taken this package on and am testing for Laravel 5 compatibility.
