@php
    $totalDays = $rental->start_date->diffInDays($rental->end_date) + 1; // inclusive
@endphp

@component('mail::message')
# New Rental Notification

Hello Admin,

A new car rental has been made:

- **Customer:** {{ $rental->customer->cus_name }} ({{ $rental->customer->user->email }})
- **Car:** {{ $rental->car->name }} (Model: {{ $rental->car->model }}, Brand: {{ $rental->car->brand }}, Car Type: {{ $rental->car->car_type }})
- **Start Date:** {{ $rental->start_date->format('F d, Y') }}
- **End Date:** {{ $rental->end_date->format('F d, Y') }}
- **Car Info:** You have booked a car for **{{ $totalDays }} day(s)** from {{ $rental->start_date->format('F d, Y') }} to {{ $rental->end_date->format('F d, Y') }}.
- **Total Cost:** ৳{{ number_format($rental->total_cost, 2) }}

Please take any necessary action.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
