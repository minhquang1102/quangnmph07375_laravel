@extends('layout.master');

{{-- section thay doi phan yield trong master voi ten tuong ung --}}
@section('title','News Page');
@section ('content-title','News Page');
@section('content')
    
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Product</th>
        <th>Category</th>
        <th>Action</th>
    </thead>
    <tbody>


        
        @foreach ($news as $newsItem)
            {{-- {{dd($products)}} --}}
            <tr>
                <td> {{$newsItem->id}} </td>
                <td> {{$newsItem->name}} </td>
                <td> {{$newsItem->description}} </td>
                {{-- <td> {{$newsItem->news_products_count}} </td> --}}
                <td>  @foreach ($newsItem->newsProducts as $product)
                        <p>{{$product->name}}</p>

                @endforeach </td>
                <td> {{$newsItem->categoryNews->name}} </td>
                <td>
                    <a class="btn btn-warning" >Edit</a>
                    <form action="{{route('news.delete',$newsItem->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
{{$news}}
@endsection