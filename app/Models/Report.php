<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_id',
        'reason',
        'violation_type_id'
    ];

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function violationTypes()
    {
        return $this->belongsTo(ViolationType::class, 'violation_type_id');
    }
}
