<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function __construct()
    {
        $this->is_html = true;
    }
}
