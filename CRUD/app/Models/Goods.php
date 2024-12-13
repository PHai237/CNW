<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Goods extends Model
{
    public $timestamps = false;
    use HasFactory;

    function getBrand() {
        $brand = Company::where('id', $this->company_id)->first();
        return $brand->company_id;
    }

    function getPhoneNumber() {
        $phoneNum = Company::where('id', $this->company_id)->first();
        return $phoneNum->company_id;
    }

    function getEmail() {
        $email = Company::where('id', $this->company_id)->first();
        return $email->company_id;
    }
}
