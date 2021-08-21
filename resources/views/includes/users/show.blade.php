<x-home-master>



    @section('content')


        <a href="{{route('users.index')}}" class="btn btn-primary">Index</a>
        <a href="{{route('users.create')}}" class="btn btn-success">+</a>

    @if(Session::has('deleted'))

        <div class="alert alert-danger">{{Session::get('deleted')}}</div>
        @elseif(Session::has('created'))
            <div class="alert alert-success">{{Session::get('created')}}</div>
        @elseif(Session::has('updated'))
            <div class="alert alert-warning">{{Session::get('updated')}}</div>
        @elseif(Session::has('activeness'))
            <div class="alert alert-success">{{Session::get('activeness')}}</div>

        @endif


        <form action="{{route('admin.checkbox')}}" method="post">
            @csrf
            @method('PUT')
            <input type="submit" name="submit" class="btn btn-primary mt-3">
            <table class="table border">

                <thead>

                <th>Id</th>
                <th>Ismi</th>
                <th>Familiyasi</th>
                <th>rasm</th>
                <th>Aktivligi</th>
                <th>O'chirish</th>
                </thead>
                <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->family_name}}</td>
                        <td><img src="{{$user->image}}" alt="" height="100px"></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="checkbox_{{$user->id}}"
                                @if($user->is_active)
                                    {{"checked"}}
                                    >
                            </div>

                            @endif
                        </td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>

                @endforeach
                </tbody>


            </table>

        </form>

    @endsection

</x-home-master>
