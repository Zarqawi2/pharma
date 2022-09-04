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

    <form action="Supplier/0/0" method="post" class="text-center">
        @csrf
        <div class="row m-4 justify-content-center">
            <div class="col col-12 col-lg-4 mt-3 text-center">
                <input type="text" placeholder="Name Supplier" name="name_supplier"
                    class="form-control rad-40 border-0" />
            </div>

            <div class="col col-12 col-lg-4 mt-3 text-center">
                <input type="text" placeholder="Email Supplier" name="email_supplier"
                    class="form-control rad-40 border-0" />
            </div>

            <div class="col col-12 col-lg-4 mt-3 text-center">
                <input type="text" placeholder="Address Supplier" name="address_supplier"
                    class="form-control rad-40 border-0" />
            </div>

            <div class="col col-12 col-lg-4 mt-3 text-center">
                <input type="text" placeholder="Phone Supplier" name="phone_supplier"
                    class="form-control rad-40 border-0" />
            </div>
        </div>
        <button class="btn btn-white mt-3 w-25 rad-20">Add</button>
    </form>

    <hr>
    <div class="row justify-content-center">
        @foreach ($supplier as $sup)
        <div class="card text-center rad-20 m-2" style="width: 15rem;">
            <i class="ion-android-bus text-gardient-success" style="font-size:70px"></i>
            <div class="card-body">
                <small class="card-title">Name : {{ $sup->name_supplier }}</small><br>
                <small class="card-title">Email : {{ $sup->email_supplier }}</small><br>
                <small class="card-title">Address : {{ $sup->address_supplier }}</small><br>
                <small class="card-title">Phone : {{ $sup->phone_supplier }}</small>
                <br>
                <br>
                <span class="btn bg-gradient-success rad-10 text-white btn-sm" data-toggle="modal"
                    data-target="#edit{{ $sup->id }}">Edit</span>
                <span class="btn bg-gradient-danger rad-10 text-white btn-sm" data-toggle="modal"
                    data-target="#delete{{ $sup->id }}">Delete</span>
            </div>

            <div class="modal fade" id="delete{{ $sup->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rad-40">
                        <div class="modal-body">
                            <span> Want deleted {{ $sup->name_supplier }} ?</span>
                            <form action="Supplier/1/{{ $sup->id }}" method="">
                                @csrf
                                <button class="btn bg-gradient-danger w-25 mt-2 rad-20 text-white">Yes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="edit{{ $sup->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rad-40">
                        <div class="modal-body">
                            <form action="Supplier/2/{{ $sup->id }}" method="">
                                @csrf
                                <div class="row m-4 justify-content-center">
                                    <div class="col col-12 col-lg-8 mt-3 text-center">
                                        <input type="text" placeholder="Name Supplier" value="{{ $sup->name_supplier }}"
                                            name="name_supplier" class="form-control rad-40 " />
                                    </div>

                                    <div class="col col-12 col-lg-8 mt-3 text-center">
                                        <input type="text" placeholder="Email Supplier"
                                            value="{{ $sup->email_supplier }}" name="email_supplier"
                                            class="form-control rad-40" />
                                    </div>

                                    <div class="col col-12 col-lg-8 mt-3 text-center">
                                        <input type="text" placeholder="Address Supplier"
                                            value="{{ $sup->address_supplier }}" name="address_supplier"
                                            class="form-control rad-40" />
                                    </div>

                                    <div class="col col-12 col-lg-8 mt-3 text-center">
                                        <input type="text" placeholder="Phone Supplier"
                                            value="{{ $sup->phone_supplier }}" name="phone_supplier"
                                            class="form-control rad-40 " />
                                    </div>
                                </div>
                                <button class="btn bg-gradient-success text-white mt-3 w-25 rad-20">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        @endforeach
    </div>
</div>
@endsection
