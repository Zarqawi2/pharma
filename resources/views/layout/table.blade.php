<table class="table rad-10 table-borderless table-light mt-3 rounded-20 table-responsive-sm table-hover">
    <thead>
      <tr class="text-center">
        <th scope="col">Cashier</th>
        <th scope="col">Barcode</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Price At</th>
        <th scope="col">Expire Date</th>
        <th scope="col">Created At</th>
        <th scope="col">Sold At</th>
        <th scope="col">Piece</th>
        @if(Request::segment(1) != 'Saller') <!-- ama bo awaya button undo tanha la bashy sale habet  -->
        <th scope="col">Undo</th>
        @endif
      </tr>
    </thead>
    <tbody>
     @foreach ($sold as $s)
      <tr class="text-center pt-2">
        <td>{{$s->casher->name}}</td>
        <td>
          @if($s->one_buy->type == 0)
          {!! DNS1D::getBarcodeSVG("$s->buy_id", 'C128' , 1,25 , 'dark' , false)!!}
          @else
          {!! DNS2D::getBarcodeSVG("$s->buy_id", 'QRCODE' , 1.5,1.5)!!}
          @endif
        </td>
        <td>{{$s->one_buy->name}}</td>
        <td>{{number_format($s->one_buy->price , 0 ,'.' , '.')}} IQD</td>
        <td>{{number_format($s->price_at , 0 ,'.' , '.')}} IQD</td>
        <td>{{$s->one_buy->expire}}</td>
        <td>{{$s->one_buy->created_at}}</td>
        <td>{{$s->created_at}}</td>
        <td class="bg-dark text-white">{{$s->piece_at}}</td>
        @if(Request::segment(1) != 'Saller')
        <td class="bg-danger text-white " onclick="undo(`{{$s->id}}`)"><i class="ion-arrow-return-left"></i></td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>