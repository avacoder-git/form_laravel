<x-home-master>



    @section('content')


        <a href="{{route('users.admin')}}" class="btn btn-primary">Admin</a>

        <table class="table border">

            <thead>

            <th>Id</th>
            <th>Ismi</th>
            <th>Familiyasi</th>
            <th>rasm</th>
            <th>Aktivligi</th>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->family_name}}</td>
                    <td><img src="{{$user->image}}" alt="" height="100px"></td>
                    <td>
                        @if($user->is_active)

                            <span class="badge bg-success">Active</span>

                        @else
                            <span class="badge bg-danger">Unactive</span>
                        @endif

                    </td>

                </tr>

            @endforeach
            </tbody>


        </table>

    @endsection



</x-home-master>
