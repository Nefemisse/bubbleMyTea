@extends('mainDashboard')
@if ($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }} </div>
@endif
@section('content')
    <h1>Welcome back {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}!</h1>
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <div>
                <!-- Button trigger modal -->
                <button class="topbtn" data-bs-toggle="modal" data-bs-target="#test">Modify my information</button>
            </div>
            <div>
                <a href="/orderHistory"><button class="topbtn">Order history</button></a>
            </div>
            <div>
                <form action="{{ url('deleteProfil/' . Auth::user()->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="botbtn">Delete account</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="test" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">My Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <form action="{{ url('updateProfil/' . Auth::user()->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-3">
                                            <label for="">new FirstName</label>
                                            <input type="text" name="firstname" value="{{ Auth::user()->firstname }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">new Lastname</label>
                                            <input type="text" name="lastname" value="{{ Auth::user()->lastname }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">new Adress</label>
                                            <input type="tel" name="adress" value="{{ Auth::user()->adress }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">new Phone</label>
                                            <input type="text" name="phone_number"
                                                value="{{ Auth::user()->phone_number }}" class="form-control">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection('content')
