
<x-home-master>


    @section('content')

        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header"><h1>Create a User</h1></div>
                <div class="card-body">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="name"required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="family_name" name="family_name" required>
                        <label for="family_name">Family Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <img height="100px" id="img" src="" alt="">

                    <div class="form-group">
                        <label for="image" class="btn btn-secondary">Add an image</label>
                        <input type="file" class="d-none" name="image" id="image">
                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ol>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ol>
                        </div>
                    @endif
                </div>
            </div>
        </form>

    @endsection


</x-home-master>
