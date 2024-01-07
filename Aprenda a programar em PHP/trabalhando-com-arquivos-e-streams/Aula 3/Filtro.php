<?php

class Filtro extends php_user_filter
{   
    public $stream;

    public function onCreate(): bool
    {   
        $this->stream = fopen("php://temp" , "w+");

        return $this->stream !== false;
    }
    public function filter($in, $out, &$consumed, $closing): int
    {   
        $exit = '';
        while ($bucket = stream_bucket_make_writeable($in)){
            $rows = explode("\n", $bucket->data);
            
            foreach($rows as $row){
                if(strpos($row, '5') !== false){
                    $exit .= "$row\n";
                    $consumed += strlen($row);
                }
            }
        }

        $exitBucket = stream_bucket_new($this->stream, $exit);
        stream_bucket_append($out, $exitBucket);

        return PSFS_PASS_ON;
    }
}