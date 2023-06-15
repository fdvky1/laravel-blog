<div class="lg:flex lg:flex-wrap lg:justify-center px-8 lg:px-1 lg:px-16 pb-16">
    <div class="px-3 mx-auto 2xl:mx-8 my-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-600 md:ml-16 lg:ml-24 xl:ml-0 mb-4">{{ $post->title }}</h1>
            <div class="prose lg:prose-xl xl:prose-2xl mx-auto">
                <article class="not-prose unreset">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
    <div class="w-full max-w-screen-md xl:w-1/4 2xl:w-1/3 xl:mt-24 mx-auto 2xl:mx-0">
        <div class="w-full mb-4">
            <div class="rounded-lg shadow-lg bg-white w-full p-4 mt-4 ">
            @if (auth()->check())
            <h3 class="text-lg font-bold text-center md:text-xl lg:text-2xl mb-3 text-gray-700">Write your comment</h3>
            @php $wysiwygFieldName = 'body'; @endphp
            <script>
                var tinyConfig{{ $wysiwygFieldName }} = {
                    branding: false,
                    path_absolute: '/',
                    selector: '#wysiwyg{{ $wysiwygFieldName }}',
                    menubar: 'edit insert format',
                    toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter',
                    schema: 'html5',
                    relative_urls: false,
                    remove_script_host: true,
                    document_base_url: '{{config('app.url')}}/',
                    height: 250,
                    min_height: 250,
                    autoresize_min_height: 250,
                    setup: function (editor) {
                        var toggleState = false;               
                        editor.on('init change', function () {
                        editor.save();
                        });
                        editor.on('change', function (e) {
                        @this.set('{{ $wysiwygFieldName }}', editor.getContent());
                        });
                    },
                };
                tinymce.init(tinyConfig{{ $wysiwygFieldName }});
            </script>
                    <form wire:submit.prevent="comment">
                        <div class="mt-1">
                            @php $wysiwygFieldName = 'body'; @endphp
                            <div wire:ignore>
                                <textarea 
                                    id="wysiwyg{{ $wysiwygFieldName }}" 
                                    rows="20" 
                                    wire:model.lazy="{{ $wysiwygFieldName }}"
                                    wire:key="wysiwyg{{ time().$wysiwygFieldName }}"></textarea>
                            </div>
                            <script>
                            if ((typeof tinyMCE != 'undefined') && (typeof tinyMCE.get("wysiwyg{{ $wysiwygFieldName }}").initialized !== null)) {
                                tinyMCE.get("wysiwyg{{ $wysiwygFieldName }}").remove();
                                tinyMCE.execCommand("mceToggleEditor", false, "wysiwyg{{ $wysiwygFieldName }}");
                            }
                            </script>
                        </div>
                        <button type="submit" class="py-2 px-3 bg-gray-500 hover:bg-gray-600 focus:bg-gray-700 text-white rounded-lg mt-6">submit</button>
                    </form>
                </div>
            @else
            <p class="text-lg"><a href="/login" class="underline font-bold">Login</a> To submit a comment</p>
            @endif
        </div>
        <div>
            @foreach(\App\Models\Comment::all()->where('post_id', $post->id)->reverse() as $comment)
                <div class="w-full py-3 px-2 border rounded-md shadow-md bg-gray-100 mt-1">
                    <div class="flex justify-between">
                        <h6 class="font-bold text-gray-800 text-base">{{$comment->user->name}}</h6>
                        <h6 class="font-light text-gray-700 text-sm">{{$comment->created_at}}</h6>
                    </div>
                    <div class="prose mt-2">{!! $comment->body !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>