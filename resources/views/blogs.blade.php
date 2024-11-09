@extends('app')
@section('content')
    
<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    {{--  --}}
    <h1 class="text-2xl">{{ config('app.name') }} Blog</h1>
    <br>
    <!-- blog arama -->
    <form class="flex items-center gap-4">
        <input type="text" name="search" class="border-2 rounded-md px-4 py-2 focus:outline-none focus-visible:ring-[#FF2D20] dark:border-gray-700 dark:focus-visible:ring-white" placeholder="Search blog..." />
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Ara</button>
    </form>

    <br>

    {{-- blogs grid flex --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @foreach($blogs as $blog)
            {{-- <div class="p-4 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold">{{ $blog->title }}</h2>
                <p class="mt-4 text-gray-600">{{ Str::limit($blog->description, 50) }}</p>
                <div class="mt-4 flex items-center gap-2">
                    <span class="text-sm text-gray-500">Published on {{ $blog->created_at->format('F d, Y') }}</span>
                    <a href="{{ $blog->slug }}" class="text-sm text-blue-500 hover:text-blue-600">Daha Fazla</a>
                </div>
            </div> --}}


            <div class="card px-2 bg-base-100 image-full w-full shadow-xl">
                <figure>
                  <img
                    src="storage/{{ $blog->thumbnail }}"
                    alt="storage/{{ $blog->thumbnail }}" />
                </figure>
                <div class="card-body ">
                  <h2 class="card-title">{{ $blog->title }}</h2>
                  <p>{{ Str::limit($blog->description, 100) }}</p>
                  <div class="card-actions justify-end">
                    <span class="text-sm text-gray-500">Yayınlandı {{ $blog->created_at->format('F d, Y') }}</span>
                    &nbsp;
                    <button class="btn btn-primary">Oku</button>
                  </div>
                </div>
              </div>


        @endforeach
    </div>
    
    <!-- pagination links -->
    @if($blogs->hasPages())
        <div class="flex justify-center mt-4">
            
            @if($blogs->currentPage() > 1)
                <a href="{{ $blogs->previousPageUrl() }}" class="text-sm text-blue-500 hover:text-blue-600">Previous</a>
            @endif
            @for($i = 1; $i <= $blogs->lastPage(); $i++)
                <a href="{{ $i }}" class="text-sm text-gray-500 hover:text-gray-600 {{ $i == $blogs->currentPage()? 'font-bold' : '' }}">{{ $i }}</a>
            @endfor
            
            @if($blogs->currentPage() < $blogs->lastPage())
            <a href="{{ $blogs->nextPageUrl() }}" class="text-sm text-blue-500 hover:text-blue-600">Next</a>
            @endif
            &nbsp;&nbsp;
            <!-- show current page number -->
            <span class="text-sm text-gray-500">Page {{ $blogs->currentPage() }} of {{ $blogs->lastPage() }}</span>
            <!-- show total blog count -->
            <span class="text-sm text-gray-500">Total Blogs: {{ $blogs->count() }}</span>
            {{-- <!-- show search input -->
            <form class="mt-4 ml-4" action="{{ route('blogs.search') }}">
                <input type="text" name="query" class="border-2 border-gray-400 px-4 py-2 rounded-md focus:outline-none" placeholder="Search Blogs...">
                <button type="submit" class="ml-2 text-sm text-gray-500 hover:text-gray-600">Search</button>
            </form> --}}
            <!-- show sort options -->
            {{-- <div class="mt-4 ml-4">
                <label class="text-sm text-gray-500">Sort by:</label>
                <select name="sort" class="border-2 border-gray-400 px-4 py-2 rounded-md focus:outline-none">
                    <option value="created_at" {{ $request->sort == 'created_at'?'selected' : '' }}>Newest First</option>
                    <option value="created_at DESC" {{ $request->sort == 'created_at DESC'?'selected' : '' }}>Oldest First</option>
                    <option value="title" {{ $request->sort == 'title'?'selected' : '' }}>Title A-Z</option>
                    <option value="title DESC" {{ $request->sort == 'title DESC'?'selected' : '' }}>Title Z-A</option>
                </select>
            </div> --}}
            <!-- show filter options -->
            {{-- <div class="mt-4 ml-4">
                <label class="text-sm text-gray-500">Filter by:</label>
                <select name="category" class="border-2 border-gray-400 px-4 py-2 rounded-md focus:outline-none">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $request->category == $category->id?'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <!-- show pagination links -->
        </div>
    @endif    
</div>

@endsection