<?php
namespace GuardTor;

//Fingerprint class to generate fingerprint keys from data
 
class Fingerprint
{
    protected $basechar = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
    //characters in each segment, max 5 segments
    public $segment_chars = 4;
    //number of segment in the key
    private $num_segments = 4;
    //Host name
    public $hostname = 'manomite.net';
    
    public function codeGenerate($software = 'GuardPower', $dynamic = false)
    {
        $date = date('d-m-Y');
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = json_encode($software.$this->hostname.$ip.$date);
        $key = sha1($key);
        $key_formated = '';
        for ($i= 0; $i < strlen($key); $i++) {
            if ($i>0 && $i % 5 == 0) {
                $key_formated .= strtoupper(substr($key, $i, 5)) . '-';
            }
        }
        if ($dynamic) {
            return $this->parse(trim($key_formated, '-'));
        }
        return trim($key_formated, '-');
    }
        
    private function parse()
    {
        $key_string = '';
        $segment = '';
        for ($i = 0; $i < $this->num_segments; $i++) {
            $segment = '';
            for ($j = 0; $j < $this->segment_chars; $j++) {
                $segment .= $this->basechar[ rand(0, strlen($this->basechar)-1) ];
            }
            $key_string .= $segment;
            if ($i < ($this->num_segments - 1)) {
                $key_string .= '-';
            }
        }
        return $key_string;
    }
}