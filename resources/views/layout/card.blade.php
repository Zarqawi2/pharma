<div class="row justify-content-center m-2">
    @foreach ($buy as $b)
        <div class="card rad-20 m-2 text-center" style="width: 20rem;">
            <div class=" mt-5" style="min-height:0px"> 
                @if($b->type == 0)
                {!! DNS1D::getBarcodeSVG("$b->id", 'C128' , 1.2,45 , 'dark' , false)!!}
                @else
                {!! DNS2D::getBarcodeSVG("$b->id", 'QRCODE')!!}
                @endif
            </div>
            <div class="card-body mt-0 text-center">
                @if ($b->debt == 1)
                <span class="badge badge-warning rad-20 mt-2 btn-sm text-white" style="position:absolute;top:0 ;left :0 ;
                transform: rotate(-30deg);">Debt !</span>
                @endif
                <small class="card-title">Barcode : {{ $b->id }}</small><br>
                <small class="card-title">Name : {{ $b->name }}</small><br>
                <small class="card-title">Count : {{ $b->count }}</small><br>
                <small class="card-title">Price : {{number_format($b->price , 0 ,'.' , '.')}} IQD</small><br>
                <small class="card-title">Expire : {{ $b->expire }}</small><br>
                <small class="card-title">Created : {{ $b->created_at }}</small><br>
                <span class="btn bg-gradient-success w-25 rad-20 mt-2 text-white btn-sm" data-toggle="modal"
                    data-target="#edit{{ $b->id }}">Edit</span>
                <span class="btn bg-gradient-danger w-25 rad-20 mt-2 text-white btn-sm" data-toggle="modal"
                    data-target="#delete{{ $b->id }}">Delete</span>

                <div class="modal fade" id="delete{{ $b->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content rad-40">
                            <div class="modal-body">
                                <span> Want deleted {{ $b->name }} ?</span>
                                <form action="Buy/1/{{ $b->id }}" method="">
                                    @csrf
                                    <button class="btn bg-gradient-danger w-25 mt-2 rad-20 text-white">Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="edit{{ $b->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content rad-40">
                            <div class="modal-body">
                                <form action="Buy/2/{{ $b->id }}" method="">
                                    @csrf
                                    <div class="row m-4 justify-content-center">

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <input type="text" placeholder="Barcode"
                                                value="{{ $b->id }}" name="id"
                                                class="form-control rad-40 " />
                                        </div>

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <input type="text" placeholder="Name Supplier"
                                                value="{{ $b->name }}" name="name"
                                                class="form-control rad-40 " />
                                        </div>

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <select class="form-control rad-40" name="supplier">
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}" class=" rad-40">
                                                        {{ $supplier->name_supplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <input type="number" placeholder="Count"
                                                value="{{ $b->count }}" name="count"
                                                class="form-control rad-40" />
                                        </div>

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <input type="text" placeholder="price"
                                                value="{{ $b->price }}" name="price"
                                                class="form-control rad-40 " />
                                        </div>

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <input  value="{{ $b->expire }}" name="expire"
                                                class="form-control rad-40 " />
                                        </div>

                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <select class="form-control rad-40 " name="debt">
                                                <option value="0" class=" rad-40">No</option>
                                                <option value="1" class=" rad-40">Yes</option>
                                            </select>
                                        </div>

                                        
                                        <div class="col col-12 col-lg-8 mt-3 text-center">
                                            <select class="form-control rad-40 " name="type">
                                                <option value="0" class=" rad-40">Barcode</option>
                                                <option value="1" class=" rad-40">Qrcode</option>
                                            </select>
                                        </div>

                                    </div>
                                    <button
                                        class="btn bg-gradient-success text-white mt-3 w-25 rad-20">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endforeach
</div>
