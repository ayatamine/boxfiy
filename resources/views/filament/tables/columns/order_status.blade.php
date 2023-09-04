{{-- @if($getRecord()->service->data_source == 'manual')
@php
     \Filament\Tables\Columns\BadgeColumn::make('status')
        ->enum([
            Order::$CREATED => 'Pending',
            Order::$PROCESSING => 'Processing',
            Order::$PARTIAL => 'Partial',
            Order::$COMPLETED => 'Completed',
            Order::$CANCELED => 'Canceled',
        ])
        ->colors([
            'primary' => static fn ($state): bool => $state === Order::$CREATED,
            'warning' => static fn ($state): bool => $state ===  Order::$PROCESSING,
            '#c8df63' => static fn ($state): bool => $state === Order::$PARTIAL,
            'success' => static fn ($state): bool => $state === Order::$COMPLETED,
            'danger' => static fn ($state): bool => $state ===  Order::$CANCELED,
        ]),
@endphp
@endif --}}
{{-- {{ $getState() }} --}}