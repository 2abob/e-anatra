<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sequence extends Model
{
    use HasFactory;

    static function getNextSequenceValue($sequenceName)
    {
        DB::beginTransaction();

        $value = DB::table('sequences')
            ->where('name', $sequenceName)
            ->lockForUpdate()
            ->value('value');

        DB::table('sequences')
            ->where('name', $sequenceName)
            ->increment('value');

        DB::commit();

        return $value;
    }

}
