<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\Article;
use App\Models\Paiement;
use App\Models\StatutLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Location extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ["article_id", "dateDebut","dateFin","client_id","user_id","statut_location_id","prix","created_at","updated_at"] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function statuts(){
        return $this->belongsTo(StatutLocation::class , "statut_location_id","id");
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }
    public function article(){
        return $this->belongsTo(Article::class);
    }
    public function getPrixForHumansAttribute(){
        return number_format($this->prix , 0 , ',',' '). ' ' . env("CURRENCY","FG") ;
    }
}
