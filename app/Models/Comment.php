<?php
namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comentarios';
    protected $fillable = ['ticket_id', 'user_id', 'comentario'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
