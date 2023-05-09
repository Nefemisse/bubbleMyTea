@extends('mainAdmin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif
    <h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
    <div class="card">
        <div class="card-header">The products</div>
        <div class="card-body">
            <div class="col-md-12">
                <h3>Create a new Bubble tea</h3>
                <form class="products" action="{{ url('createBbt') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <label for="name">Name</label><br>
                    <input type="text" name="name" id="name"><br>

                    <label for="Temperature">Temperature (0 for "Hot" and 1
                        for "cold")</label><br>
                    <input type="text" name="temperature" id="temperature"><br>

                    <label for="price">Price</label><br>
                    <input type="text" name="price" id="price"><br>

                    <label for="price">Quantity(0 for "Small", 1
                        for "Medium and 2 for "Large")</label><br>
                    <input type="text" name="quantity" id="quantity"><br>

                    <label for="price">Quantity of sugar(0 for "0%" and 1
                        for "30%" 2 for "50%" 3 for "100%" and ' for "120%"')</label><br>
                    <input type="text" name="sugar_quantity" id="sugar_quantity"><br>

                    <label for="description">Description</label><br>
                    <input type="text" name="description" id="description"><br>

                    <label for="img">Picture</label><br>
                    <input type="file" name="img" id="img"><br>
                    <button class="save" type="submit">Save</button>
                </form>
            </div>
            <div class="col-md-12">
                <h3>Your products</h3>
                <div class="row">
                    @foreach ($bubbleTea as $bbtData)
                        <div class="col-md-2" id="fancyJuicy">
                            <img src="{{ $bbtData->img }}" class="img-thumbnail" alt="{{ $bbtData->name }}">
                            <p>{{ $bbtData->name }} </p>
                            <div class="btn">
                                <div>
                                    <!-- Button trigger modal -->
                                    <button class="topbtn" data-bs-toggle="modal"
                                        data-bs-target="#updateBBT">Modify</button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="updateBBT" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">BBT INFOS</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-6">
                                                            <div class="card">
                                                                <form action="{{ url('update/bbt/' . $bbtData->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group mb-3">
                                                                        <label for="">new Name</label>
                                                                        <input type="text" name="name"
                                                                            placeholder="{{ $bbtData->name }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Temperature (0 for "Hot" and 1
                                                                            for "cold")</label>
                                                                        <input type="text" name="temperature"
                                                                            placeholder="{{ $bbtData->temperature }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">quantity</label>
                                                                        <input type="text" name="quantity"
                                                                            placeholder="{{ $bbtData->quantity }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Sugar_quantity</label>
                                                                        <input type="text" name="Sugar_quantity"
                                                                            placeholder="{{ $bbtData->sugar_quantity }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="">Description</label>
                                                                        <input type="text" name="Description"
                                                                            placeholder="{{ $bbtData->description }}"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="img">Picture</label><br>
                                                                        <input type="file" name="img"
                                                                            id="img"><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save changes</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ url('delete/bbt/' . $bbtData->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">The clients</div>
        <div class="card-body">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>IsAdmin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $userData)
                            <tr>
                                <td>{{ $userData->firstname }} </td>
                                <td>{{ $userData->lastname }}</td>
                                <td>{{ $userData->adress }}</td>
                                <td>{{ $userData->phone_number }}</td>
                                <td>{{ $userData->email }}</td>
                                <form action="{{ url('update/user/' . $userData->id) }}" method="post">
                                    <td><input type="checkbox" name="isAdmin"
                                            {{ $userData->isAdmin == 1 ? 'checked' : '' }}></td>
                                    <td>
                                        @csrf
                                        @method('PUT')
                                        <button class="delete" type="submit">Edit</button>
                                </form>
                                </th>
                                </td>
                                <td>
                                    <form action="{{ url('delete/user/' . $userData->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" type="submit">Delete</button>
                                    </form>
                                    </th>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection('content')
