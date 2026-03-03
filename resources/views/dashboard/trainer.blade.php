@extends('layouts.app') {{-- Se você tiver um layout base --}}

@section('content')
{{-- TODO: Seu HTML existente aqui, com as seguintes substituições: --}}

{{-- 
Substitua no HTML:

1. "Coach Marcus" -> {{ $trainer->full_name }}
2. "4 sessions today" -> {{ $trainer->sessions_today }} sessions today
3. Avatar URL -> {{ $trainer->avatar }}
4. "42" -> {{ $metrics->total_clients }}
5. "+4 this month" -> +{{ $metrics->new_clients_month }} this month
6. "128" -> {{ $metrics->active_sessions }}
7. "-2%" -> {{ $metrics->sessions_trend }}%
8. "94.2%" -> {{ $metrics->avg_completion }}%
9. "42,000 kcal" -> {{ $metrics->kcal_text }} kcal

Links:
- href="{{ route('dashboard.calendar') }}"
- href="{{ route('workout-plans.create') }}"
- href="{{ route('clients.index') }}"
- href="{{ route('reports.generate') }}"
- href="{{ route('privacy') }}"
- href="{{ route('support') }}"
- href="{{ route('community') }}"
- href="{{ route('notifications.index') }}"
- href="{{ route('settings.index') }}"
- href="{{ route('activity.index') }}"

Para loops:
@foreach($todaySchedule as $session)
@foreach($newClientAlerts as $alert)
@foreach($clientActivities as $activity)
--}}

@stop