<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b class="bg-danger text-white">{{\Illuminate\Support\Facades\Auth::user()->name}}به وبسایت هنر های دستی خوش اومدی</b>
            <b style="float:left">تعداد کاربران:
                <span class="bg-danger text-white">{{count($users)}}</span>

            </b>
        </h2>
    </x-slot>

    <div class="py-12">



        <div class="container">
            <div class="row-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>













    </div>
</x-app-layout>
