@if ($message = Session::get('success'))
    <div style="background-color: green; color:white;">
        <p>{{ $message }}</p>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div style="background-color: red; color:white;">
        <p>{{ $message }}</p>
    </div>
@endif

@if (Session::has('validationErrors'))
    <div style="background-color: red; color:white;">
        <ul>
            @foreach (Session::get('validationErrors') as $field => $errors)
                @foreach ($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            @endforeach
        </ul>
    </div>
@endif