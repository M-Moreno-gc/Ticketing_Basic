<?php
namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Close extends Model
{
    protected $table = 'tickets_cerrados';
   protected $fillable = [ 'ticket_id', 'user_id', 'problema', 'categoria', 'prioridad', 'fecha',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
