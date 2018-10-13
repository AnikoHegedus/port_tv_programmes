<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $table = 'port_tv_programmes';
    protected $guarded = [];
    
    public function getByChannel($channel)
    {
        return $query->select('head', 'body', 'logo', 'name')
        ->where('company', '=', $company);
       $list_of_programmes = App\Programme::where('channel', $channel)->count();
       var_dump($list_of_programmes);
    }
}
