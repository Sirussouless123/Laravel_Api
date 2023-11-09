<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

     /**
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_number',
        'total_vat',
        'total_price_excluding_vat',
        'total_price',
        'user_id',
    ];

     /**
     * @var array<string, string>
     */
    protected $casts = [
        'total_vat' => 'decimal:2',
        'total_price_excluding_vat' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * @return BelongsTo<User, Invoice>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
