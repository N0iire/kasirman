<?php

class Enkripsi
{

    public $word;
    public $ciphering = "AES-128-CTR";
    public $option = 0;
    // Non-NULL Initialization Vector for encryption
    public $encryption_iv = '1234567891011121';
    private $encryption_key = "kasirman";

    public function encr()
    {
        $encrypted = openssl_encrypt($this->word, $this->ciphering, $this->encryption_key, $this->option, $this->encryption_iv);
        return $encrypted;
    }

    public function decr()
    {
        $encrypted = openssl_decrypt($this->word, $this->ciphering, $this->encryption_key, $this->option, $this->encryption_iv);
        return $encrypted;
    }
}
