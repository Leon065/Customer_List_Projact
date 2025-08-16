<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /** @use HasFactory<\Database\Factories\AppointmentFactory> */
    use HasFactory;
    protected $fillable = ['customer_id', 'service_id', 'appointment_time', 'status'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    // Issue: This was changed from Customer::class to Service::class.
    public function service() {
        return $this->belongsTo(Service::class);
    }
}
