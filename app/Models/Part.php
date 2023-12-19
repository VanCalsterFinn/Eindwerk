<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "active",
        "assembly",
        "barcode_hash",
        "category",
        "component",
        "creation_date",
        "default_expiry",
        "default_location",
        "default_supplier",
        "description",
        "full_name",
        "image",
        "IPN",
        "is_template",
        "keywords",
        "last_stocktake",
        "link",
        "minimum_stock",
        "name",
        "notes",
        "pk",
        "purchaseable",
        "revision",
        "salable",
        "starred",
        "thumbnail",
        "trackable",
        "units",
        "variant_of",
        "virtual",
        "responsible",
        "allocated_to_build_orders",
        "allocated_to_sales_orders",
        "building",
        "in_stock",
        "ordering",
        "required_for_build_orders",
        "stock_item_count",
        "suppliers",
        "total_in_stock",
        "unallocated_stock",
        "variant_stock",
        "tags",
    ];
}
