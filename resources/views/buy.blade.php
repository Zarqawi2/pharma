@extends('layout.nav')
@section('content')

    <div class="container">
        <br>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert text-danger text-center w-50 ml-auto mr-auto rad-20  alert-white">{{ $error }}</div>
            @endforeach
        @endif
        @if (session('result'))
            <div class="alert text-success text-center w-50 ml-auto mr-auto rad-20  alert-white">{{ session('result') }}
            </div>
        @endif


        <form action="Buy/0/0" method="post" class="text-center">
            @csrf

            <div class="row m-4 justify-content-center">
                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="text" placeholder="Barcode" name="id" class="form-control rad-40 border-0" />
                </div>

                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="text" placeholder="Name buy" name="name" class="form-control rad-40 border-0" />
                </div>

                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <select class="form-control rad-40 border-0" name="supplier">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" class=" rad-40">{{ $supplier->name_supplier }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="number" placeholder="count buy" name="count" class="form-control rad-40 border-0" />
                </div>

                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="number" placeholder="Price buy" name="price" class="form-control rad-40 border-0" />
                </div>


                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="date" name="expire" class="form-control rad-40 border-0" />
                </div>

                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <select class="form-control rad-40 border-0" name="debt">
                        <option value="0" class=" rad-40">No</option>
                        <option value="1" class=" rad-40">Yes</option>
                    </select>
                </div>

                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <select class="form-control rad-40 border-0" name="type">
                        <option value="0" class=" rad-40">Barcode</option>
                        <option value="1" class=" rad-40">Qrcode</option>
                    </select>
                </div>

            </div>
            <button class="btn btn-white mt-3 w-25 rad-20">Buy</button>
        </form>
        <hr>

        @include('layout.card');
       
    </div>
@endsection
