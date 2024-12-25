@extends('Home.homelayouts.hometemplate')
@section('main_content')

 <div class="container">
    <h1>Search Results</h1>

    <h1>Search Results for "{{ $query }}"</h1>

    @if($results->isEmpty())
        <p>No results found for "{{ $query }}".</p>
    @else
        <ul>
            @foreach($results as $result)
                <li>
                    <h2><a href="{{ route('searchshow', $result->id) }}">{{ $result->product_name }}</a></h2>
                    <p>{{ \Str::limit($result->content, 150) }}</p> <!-- Show a short snippet of the content -->
                    <a href="{{ route('searchshow', $result->id) }}">Read More</a>
                </li>
            @endforeach
        </ul>
    @endif

    

 </div>

@endsection