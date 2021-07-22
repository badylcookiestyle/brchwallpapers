@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>So here u can delete some wallpapers</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col"> </th>



            </tr>
            </thead>
            <tbody id="products-body">
            @forelse($wallpapers as $wallpaper)


                <td> <img src="{{asset('images/wallpapers/'.$wallpaper->image_path)}}" alt="profile Pic" height="200" width="200"></td>

                <td><button class="btn btn-lg btn-danger ml-2" id="delete-wallpaper" data-id="{{$wallpaper->id}}">Delete</button></td>



                </tr>
            @empty
                <h3>There're no wallpapers</h3>
            @endforelse
            <div class="d-flex my-2">
                {{ $wallpapers->links() }}
                <button type="button" class="btn btn-outline-primary ml-5 btn-sm" data-toggle="modal"
                        data-target="#addProductModal">
                    Add new product
                </button>
            </div>
            </tbody>
        </table>
    </div>
    @push('scripts')
        <script type="text/javascript"  src="{{asset('js/deleteWallpaper.js')}}">
        </script>
    @endpush

@endsection
