@php
    $totalDays = $rental->start_date->diffInDays($rental->end_date) + 1; // inclusive
@endphp

@component('mail::message')
# Rental Confirmation of ID# {{ $rental->id }}

Dear {{ $rental->customer->cus_name }},

Thank you for renting a car with us. Here are your rental details:

- **Car:** {{ $rental->car->name }} (Model: {{ $rental->car->model }}, Brand: {{ $rental->car->brand }}, Car Type: {{ $rental->car->car_type }})
- **Start Date:** {{ $rental->start_date->format('F d, Y') }}
- **End Date:** {{ $rental->end_date->format('F d, Y') }}
- **Car Info:** You have booked a car for **{{ $totalDays }} day(s)** from {{ $rental->start_date->format('F d, Y') }} to {{ $rental->end_date->format('F d, Y') }}.
- **Total Cost:** ৳{{ number_format($rental->total_cost, 2) }}


@component('mail::button', ['url' => url('/')])
Go to Website
@endcomponent

We hope you have a great experience!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
