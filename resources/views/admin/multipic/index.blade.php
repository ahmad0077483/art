<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b style="float: right">تصاویر</b>

        </h2>
    </x-slot>

    <div class="py-12">


        <div class="container">
            <div class="row-auto">
                <div style="float: right" class="col-md-8">
<div class="card-group">
    @foreach($images as $multi)
        <div class="col-4 mt-5">
            <div class="card">
                <img class="p-3" style="height: 300px;width: 300px" src="{{asset($multi->image)}}" alt="">
            </div>

        </div>

    @endforeach


</div>


                </div>








                <div style="float: right" class="col-md-4">
                    <div class="card">


                        <div style="float: right" class="card-header text-center bg-secondary ">اضافه کردن تصویر
                        </div>
                        <div class="card-body">
                            <form action="{{route('store.image')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">عکس برند</label>
                                    <input type="file" name="image[]" class="form-control" id="exampleInputPassword1" multiple="">
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>


                                <button style="margin-right:140px;" type="submit" class="btn btn-dark mt-1 ">ایجاد
                                    تصویر
                                </button>
                            </form>


                        </div>


                    </div>

                </div>


            </div>
        </div>









    </div>
</x-app-layout>
