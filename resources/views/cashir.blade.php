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
        <form action="Casher" method="POST" class="text-center">
            @csrf
            <div class="row m-4 justify-content-center">
                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="text" placeholder="Name Casher" name="name" class="form-control rad-40 border-0" />
                </div>
                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="text" placeholder="Email Casher" name="email" class="form-control rad-40 border-0" />
                </div>
                <div class="col col-12 col-lg-4 mt-3 text-center">
                    <input type="text" placeholder="Password Casher" name="password"
                        class="form-control rad-40 border-0" />
                </div>
                <div class="col col-12 col-lg-4 mt-4 text-center">
                    <select name="rule" class="form-control rad-40 border-0">
                        <option class="form-control rad-40 border-0" value="0">Casher</option>
                        <option class="form-control rad-40 border-0" value="1">Addmin</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-white mt-3 w-25 rad-20">Add</button>
        </form>
        <br />
        <hr>
        <br />
        <div class="row justify-content-center">
            @foreach ($cashers as $casher)
                <div class="card text-center rad-20 m-2" style="width: 15rem;">
                    <i class="ion-person text-gardient-success" style="font-size:70px"></i>
                    <div class="card-body">
                        <small class="card-title">Name : {{ $casher->name }}</small><br>
                        <small class="card-title">Email : {{ $casher->email }}</small><br>
                        <small class="card-title">Rule : {{ $casher->rule == 1 ? 'Addmin' : 'Casher' }}</small><br>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
