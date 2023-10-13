<?php

class Country {

    protected $ticket_results;

    public function __construct($tickets_file, $results_file)
    {
        $obj_tickets = new File($tickets_file);
        $obj_results = new File($results_file);

        $entries = $obj_tickets->get_array_content();
        $results = $obj_results->get_array_content();

        $obj_ticket = new Ticket($entries, $results);

        $this->ticket_results = $obj_ticket->winner();
    }
}