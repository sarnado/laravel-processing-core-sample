<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ServiceAccount
 *
 * @property int $id
 * @property int $currency_id
 * @property string $account
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServiceAccount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ServiceAccount extends Model
{
    use HasFactory;
}
