<div class="table-responsive my-4">
    <table class="dt table table-striped table-bordered w-100 overflow-auto">
        <thead class="bg-default text-light">
            <tr>
                <th>My Posts</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->articles as $article)
            <tr>
                <td class="pl-0">
                    <div class="d-flex">
                        <img src="{{ $article->thumbnail }}" alt="" height="100" width="150"
                            class="d-none d-lg-block d-md-block">
                        <div class="d-flex flex-column justify-content-around ml-3">
                            <span>
                                <strong>{{ $article->title}} </strong>
                                <p class="mb-0 mt-2">Status: {{ $article->status }}</p>
                            </span>
                            <div>
                                @if ($article->status == "Published")
                                <a href="{{ route('articles.show', $article->slug) }}" target="_blank"
                                    class="btn btn-sm btn-secondary text-capitalize d-inline-block mt-3">
                                    <i class="fa fa-eye mr-2"></i>
                                    View Post
                                </a>
                                @else
                                <a href="{{ route('preview', $article->slug) }}" target="_blank"
                                    class="btn btn-sm btn-secondary text-capitalize d-inline-block mt-3">
                                    <i class="fa fa-eye mr-2"></i>
                                    View Post
                                </a>
                                @endif

                                <a href="{{ route('articles.edit', $article->slug) }}" target="_blank"
                                    class="btn btn-sm btn-default text-capitalize d-inline-block mt-3">
                                    <i class="fa fa-edit mr-2"></i>
                                    Edit Post
                                </a>
                                
                                <form action="{{ route('articles.destroy', $article->slug) }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-sm btn-danger text-capitalize d-inline-block mt-3"
                                        type="submit">
                                        <i class="fa fa-trash mr-2"></i>
                                        Delete Post
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
