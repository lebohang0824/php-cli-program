<?php

class File {

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function get_array_content()
    {
        $csv_content = [];

        if (isset($this->filename)) {

            $file = fopen($this->filename,"r");

            while(! feof($file)) {
                $csv_content[] = fgetcsv($file);
            }

            fclose($file);

        }

        return $csv_content;
    }

    public function create($content)
    {
        $file = fopen($this->filename, "w");
        fwrite($file, $content);
        fclose($file);
    }

}
