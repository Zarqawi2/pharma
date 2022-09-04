<div class="text-center p-2 rad-10 p-2 bg-white">
    <br>
    <img src="{{ asset('/assets/img/logo.png') }}" width="100" srcset="">
    <br>
    <br>
    @foreach ($sold as $s)
        <div class="row">
            <div class="col"><small>{{ $s->one_buy->name }}</small></div>
            <div class="col"><small>{{ $s->piece_at }}</small></div>
            <div class="col"> <small>{{ number_format($s->price_at * $s->piece_at, 0, '.', '.') }} IQD</small></div>
            {{-- bo darkrdny nrxakay nrxy awkata karaty zmaray danakany akay --}}
        </div>
    @endforeach


    @php
        $sum = 0;
        for ($i = 0; $i < count($sold); $i++) {
            $result = $sold[$i]['price_at'] * $sold[$i]['piece_at'];
            $sum += $result;
        }
    @endphp

    <span class="badge badge-dark text-white rad-20 p-3 mx-2  mt-3 ">All money : {{number_format($sum , 0 , '.' , '.')}} IQD</span>
</div>
<a href="clean" class="btn btn-danger  mt-2 rad-20 w-100">Clean</a>
