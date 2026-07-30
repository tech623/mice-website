<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Enquiry extends Model
{
    use HasFactory;
    use Sortable;
    use SoftDeletes;

    protected $appends = [
        'name'
    ];

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'source',
        'event_id',
        'location',
        'status',
        'venue',
        'number_of_guests',
        'comments',
        'proposed_start_date',
        'proposed_end_date_date',
        'check_in_date',
        'check_out_date',
        'number_of_rooms',
        'number_of_room_nights',
        'client_designation',
        'meal_plan',
        'meal_package',
        'number_of_pax',
        'event_date',
        'created_by',
        'title',
        'number_of_single_room',
        'tariff_for_single_room',
        'number_of_double_room',
        'tariff_for_double_room',
        'applied_gst',
        'room_charges',
        'total_cost',
        'gst_charge',
        'tariff'
    ];

    // protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'source', 'location', 'created_at','status'];
    public $sortable = ['id', 'created_at'];

    public function getNameAttribute()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function getStatusAttribute()
    {
        // Here $value would contain the actual value from the database, if any
        $statusKey = $this->attributes['status']; // Assuming 'status' is the column name in the database

        // Retrieve status value from the constant array
        $deal_status = collect(self::DEAL_STATUS)->where('slug', $statusKey)->first();

        return $deal_status['status'] ?? "";
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            // Increment custom auto-increment columns based on the last inserted ID
            $lastId = static::max('id') ?: 0;
            $model->enquery_unique_id = 100001 + $lastId;
        });
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'event_id', 'id');
    }


    // public const DEAL_STATUS = [
    //     [
    //         'id' => 1,
    //         'status' => "Proposal Shared",
    //         'slug' => "proposal-shared"
    //     ],
    //     [
    //         'id' => 2,
    //         'status' => "Open",
    //         'slug' => "open"
    //     ],
    //     [
    //         'id' => 3,
    //         'status' => "Picked",
    //         'slug' => "picked"
    //     ],
    //     [
    //         'id' => 4,
    //         'status' => "Got Reply",
    //         'slug' => "got-reply"
    //     ],
    //     [
    //         'id' => 5,
    //         'status' => "Negotiation On",
    //         'slug' => "negotiation-on"
    //     ],
    //     [
    //         'id' => 6,
    //         'status' => "Closed Won",
    //         'slug' => "closed-won"
    //     ],
    //     [
    //         'id' => 7,
    //         'status' => "Closed Lost",
    //         'slug' => "closed-lost"
    //     ],
    // ];

    public const DEAL_STATUS = [
        [
            'id' => 1,
            'status' => "Proposal Shared",
            'slug' => "proposal-shared"
        ],
        [
            'id' => 2,
            'status' => "Negotiation On",
            'slug' => "negotiation-on"
        ],
        [
            'id' => 3,
            'status' => "Tentative",
            'slug' => "tentative"
        ],
        [
            'id' => 4,
            'status' => "Confirmed",
            'slug' => "confirmed"
        ],
        [
            'id' => 5,
            'status' => "Lost",
            'slug' => "lost"
        ],
    ];

    public const TITLE_STATUS = [
        [
            'title' => "Mr.",
            'slug' => "mr"
        ],
        [
            'title' => "Miss.",
            'slug' => "miss."
        ],
        [
            'title' => "Mrs.",
            'slug' => "mrs."
        ]
    ];

    public const DEAL_MEAL_PLAN = [
        [
            'id' => 1,
            'meal_plan' => "CP",
            'slug' => "cp"
        ],
        [
            'id' => 2,
            'meal_plan' => "MAP",
            'slug' => "map"
        ],
        [
            'id' => 3,
            'meal_plan' => "AP",
            'slug' => "ap"
        ],
        [
            'id' => 4,
            'meal_plan' => "EP",
            'slug' => "ep"
        ],
    ];

    public const DEAL_MEAL_PACKAGE = [
        [
            'id' => 1,
            'meal_package' => "Lunch & Hi-tea",
            'slug' => "lunch-and-hi-tea"
        ],
        [
            'id' => 2,
            'meal_package' => "Breakfast, Lunch & Hi-tea",
            'slug' => "breakfast-lunch-and-hi-tea"
        ],
        [
            'id' => 3,
            'meal_package' => "Breakfast, Lunch, Hi-tea and Dinner",
            'slug' => "breakfast-lunch-hi-tea-and-dinner"
        ],
        [
            'id' => 4,
            'meal_package' => "Breakfast",
            'slug' => "breakfast"
        ],
        [
            'id' => 5,
            'meal_package' => "Dinner & Breakfast",
            'slug' => "dinner-and-breakfast"
        ],
    ];

    public const GST = [
        '5',
        '12',
        '18'
    ];

    public const ROOM_OCCUPANCY = [
        'single',
        'double'
    ];

    public function enquiryCreatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function dealdata(): BelongsTo
    {
        return $this->belongsTo(Deal::class, 'id', 'enquiry_id');
    }

    public function roomOccupancyDetails(): HasMany
    {
        return $this->hasMany(RoomOccupancyDetail::class, 'enquiry_id');
    }

    public const EVENT_IDS = [
        '3',
        '8',
        '10'
    ];
}
