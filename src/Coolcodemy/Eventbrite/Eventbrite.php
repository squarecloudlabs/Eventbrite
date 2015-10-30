<?php namespace Coolcodemy\Eventbrite;

/**
 * Allows for managing eventbrite.com stuff, like event creation, venue and
 * tickets creation, etc.
 * TODO: Allow to set venue, organizer, and tickets to an event.
 * Userful Links:
 * http://developer.eventbrite.com/doc/#methods
 * http://developer.eventbrite.com/doc/tickets/ticket_new/
 * http://developer.eventbrite.com/doc/venues/venue_new/
 * http://developer.eventbrite.com/doc/events/event_new/
 */
class Eventbrite {

    protected $app_key;

    protected $user_key;

    public function __construct($app_key, $user_key)
    {
        $this->app_key = $app_key;
        $this->user_key = $user_key;
    }

    public function createEvent($title, $description, $startDate, $endDate, $timezone, $details)
    {
        $data = [
            'title' => $title,
            'description' => $description,
            'start_date' => $startDate->toIso8601String(),
            'end_date' => $endDate->toIso8601String(),
            'timezone' => $timezone,
            'privacy' => 1,
            'capacity' => isset($details['capacity']) ? $details['capacity'] : 50,
            'status' => isset($details['status']) ? $details['status'] : 'live'
        ];

        return $this->call('https://www.eventbrite.com/json/event_new', $data);
    }

    public function updateEvent(array $values)
    {
        return $this->call('https://www.eventbrite.com/json/event_update', $values);
    }

    public function createTicket(array $values)
    {
        return $this->call('https://www.eventbrite.com/json/ticket_new', $values);
    }

    protected function call($url, array $data)
    {
        $data_string = http_build_query($data);
        $data_string = urldecode($data_string);
        $data_string = str_replace(' ', '+', $data_string);

        $full_url = $url . '?' . $data_string;

        return response()->json(file_get_contents($full_url));
    }

}
