<?php

class Germany extends Country implements ICountry {

    public function __construct($tickets_file, $results_file)
    {
        parent::__construct($tickets_file, $results_file);
    }

    public function write_results()
    {
        $content = "";

        foreach($this->ticket_results as $key => $val) {
            $content .= "$key - $val\n";
        }

        $file = new File("germany.txt");
        
        $file->create($content);
    }

}