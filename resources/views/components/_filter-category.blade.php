@php
    $blogs = isset($latestBlogs) ? $latestBlogs : $blogs;
@endphp

{{-- <form action="GET">
    <div class="body widget">
        <ul class="list-unstyled categories-clouds m-b-0">
            <li><a href="javascript:void(0);" class="selected" onclick="selectCategory(this)">All Categories</a></li>
            @foreach ($blogs as $id => $blog)
                <li>
                    <a href="javascript:void(0);" value={{ $id }}
                        @if ($id == request()->query('company_id')) selected @endif> onclick="selectCategory(this)" >
                        {{ $blog->category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</form> --}}

<style>
    .selected {
        background-color: blue;
        color: white;
    }

    .selected:hover {
        background-color: blue;
        color: white;
    }

    li:hover {
        background-color: #f5f5f5;
        cursor: pointer;
        color: black;
    }
</style>
<form method="GET" action="{{ url()->current() }}">
    <div class="body widget">
        <ul class="list-unstyled categories-clouds m-b-0">
            <li>
                <a href="{{ request()->fullUrlWithQuery(['category_id' => null]) }}"
                    class="{{ request()->query('category_id') == null ? 'selected' : '' }}">
                    All Categories
                </a>
            </li>

            @foreach ($categories as $id => $category)
                <li>
                    <a href="{{ request()->fullUrlWithQuery(['category_id' => $category->id]) }}"
                        class="{{ request()->query('category_id') == $category->id ? 'selected' : '' }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</form>
