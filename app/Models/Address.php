<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Address extends Model
{
    use \App\Helpers\ISOSerialization;

    protected $table = "address";

    protected $fillable = [
        'id',
        'client_id',
        'zipCode',
        'streetAddress',
        'complement',
        'neighborhood',
        'cod_ibge',
    ];

    protected $hidden = ['zipCode', 'streetAddress', 'complement', 'neighborhood'];
    protected $appends = ['dctZipCode', 'dctStreetAddress', 'dctComplement', 'dctNeighborhood'];

    public function getDctZipCodeAttribute()
    {
        return empty($this->zipCode) ? null : decrypt($this->zipCode);
    }

    public function getDctStreetAddressAttribute()
    {
        return empty($this->streetAddress) ? null : decrypt($this->streetAddress);
    }

    public function getDctComplementAttribute()
    {
        return empty($this->complement) ? null : decrypt($this->complement);
    }

    public function getDctNeighborhoodAttribute()
    {
        return empty($this->neighborhood) ? null : decrypt($this->neighborhood);
    }

    public function setDctZipCodeAttribute($value)
    {
        $this->zipCode = encrypt($value);
    }
    
    public function setDctStreetAddressAttribute($value)
    {
        $this->streetAddress = encrypt($value);
    }

    public function setDctComplementAttribute($value)
    {
        $this->complement = encrypt($value);
    }

    public function setDctNeighborhoodAttribute($value)
    {
        $this->neighborhood = encrypt($value);
    }

}
