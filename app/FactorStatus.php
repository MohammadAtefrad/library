<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

/**
 * @property int $id
 * @property string $factor_status
 * @property string $created_at
 * @property string $updated_at
 * @property Factor[] $factors
 */
class FactorStatus extends Model
{
    use CrudTrait;

    /**
     * @var array
     */
    protected $fillable = ['factor_status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factors()
    {
        return $this->hasMany('App\Factor');
    }
}
