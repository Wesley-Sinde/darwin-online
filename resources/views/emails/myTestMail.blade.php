<!DOCTYPE html>
<html>

<head>
    <title>oNLINE</title>
</head>

<body>
    {{-- <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p> --}}

    <p>Address {{ Auth::User()->Address }} </p>
    <?php
    //dd($details);
    if ($details) {
        $total = 0;
    }
    foreach ($details as $detail) {
        $total += $detail->Price;
    }
    ?>

    {{-- {{ $details->Category }} --}}
    @component('mail::message')

        Hello {{ Auth::user()->CustFName }}.

        @component('mail::table')
            | Category | Colour | Price |
            | ------------- |:-------------:| --------:|

            @foreach ($details as $detail)
                | {{ $detail->Category }} | {{ $detail->Colour }} | ${{ $detail->Price }} |
            @endforeach
            | Col 3 is | Right-Aligned | $20 |
        @endcomponent

        Your Total is ${{ $total }}
        Thanks,

        {{ config('app.name') }}
    @endcomponent


</body>

</html>
