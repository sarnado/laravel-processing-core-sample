<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * App\Models\Transaction
 *
 * @property string $id
 * @property int $user_id
 * @property int $currency_id
 * @property string $amount
 * @property string $fee
 * @property string $status
 * @property string $payload_type
 * @property mixed $payload
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePayloadType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUserId($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot(): void
    {
        parent::boot();

        // Setup id as guid, when create new row in db
        static::creating(function (Model $model)
        {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }
}
