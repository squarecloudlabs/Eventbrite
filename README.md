# Eventbrite

Eventbrite APIs for Laravel 4.

### Installation

Begin by installing this package through Composer.

```js
{
    "require": {
        "casinelli/eventbrite": "dev-master"
    }
}
```

### Getting started

To create a new event:
```php
$eventbrite = new \Casinelli\Eventbrite\Eventbrite("YOUR_APP_KEY", "YOUR_USER_KEY");

// Creates a new event
$eventbrite->createEvent('Dine with Inez', 'A huge feast of oil and mayo!!!', $startDate, $endDate, $timezone, $details);
```

*Better documentation coming soon.*
