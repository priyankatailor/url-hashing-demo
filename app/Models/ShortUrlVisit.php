<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrlVisit extends Model
{
    protected $guarded = [];

    protected $fillable = ['short_url_id','ip_address','operating_system','operating_system_version','browser','browser_version','visited_at'];
}
