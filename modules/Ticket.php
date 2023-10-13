<?php

class Ticket {

    private $entries;
    private $results;

    public function __construct($entries, $results)
    {
        $this->entries = $entries;
        $this->results = $results;
    }

    public function winner() {

        $jackpot_won = false;
        $winning_results = [];

        $entries = $this->entries;
        $results = $this->results;

        $titles = $this->split_ballsets($entries[0][0]);
        $results_ballsets = $this->split_ballsets($results[1][0]);

        for($i = 1; $i < count($entries); $i++) {
            $jackpot_results = [];
            $entry_ballsets = $this->split_ballsets($entries[$i][0]);

            foreach($entry_ballsets as $key => $val) {

                // Per the structure of the tickets, 
                // Index zero is a ticket number in this case (Not relavant). 
                if ($key > 0) {
                    $entry_draw_num = $this->split_ballset_numbers($val);
                    $results_draw_num = $this->split_ballset_numbers($results_ballsets[$key -1]);
                    
                    $match_num = array_intersect($entry_draw_num, $results_draw_num);
                    $total_match = count($match_num);

                    $title = $titles[$key];
                    
                    if (empty($winning_results[$title])) {
                        $winning_results[$title] = $total_match;
                    } else {
                        $winning_results[$title] += $total_match;
                    }

                    // Check all matched numbers count to ballsets numbers
                    if ($total_match == count($entry_draw_num)) {
                        $jackpot_results[$title] = true;
                    } else {
                        $jackpot_results[$title] = false;
                    }
                }   
            }

            if (!in_array(false, $jackpot_results)) {
                $jackpot_won = true;
            }
        }
        
        if ($jackpot_won) {
            $winning_results["jackpot"] = "Jackpot is won.";
        } else {
            $winning_results["jackpot"] = "None";
        }

        return $winning_results;
    }

    private function split_ballsets($entry) {
        $entry_counterparts = explode(";", $entry);
        return $entry_counterparts;
    }

    private function split_ballset_numbers($ballset) {
        $ballset_counterparts = explode(":", $ballset);
        return $ballset_counterparts;
    }

}
