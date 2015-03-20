<?php namespace Casinelli\Eventbrite;

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

        return Response::json(file_get_contents($full_url));
    }

}
