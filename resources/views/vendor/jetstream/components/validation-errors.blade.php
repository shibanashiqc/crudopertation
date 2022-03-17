@if ($errors->any())
    <div {{ $attributes }}>
        <div style="text-align:center;color:red;" class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

        <ul style="text-align:center;color:red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
