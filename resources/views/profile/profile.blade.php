<x-layout>

    <div class="min-h-screen flex items-center justify-center flex-col">
        <div class="w-full max-w-xl p-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-center">
                @if($user->profile_pic!==null)
                <img src="{{asset('profile_image').'/'.$user->profile_pic}}" alt="User Profile Picture" class="w-[100px] h-[100px] rounded-full">
                @else
                    <img src="{{asset('profile_image').'/default.jpeg'}}" alt="User Profile Picture" class="w-[100px] h-[100px] rounded-full">

                @endif
            </div>
            <h1 class="text-3xl font-semibold text-center mt-4">{{$user->name}}</h1>
                <p class="text-gray-600 text-sm text-center mt-2">{{$user->bio}}</p>
            @if($user->id ===Auth::user()->id)
            <div class="flex justify-center mt-4">
                <a href="/profile/{{Auth::user()->id}}/edit" class="px-4 py-2 text-white bg-indigo-500 hover:bg-indigo-600 rounded-md">Edit Profile</a>
{{--                <a href="#" class="px-4 py-2 ml-4 text-indigo-500 border border-indigo-500 hover:text-white hover:bg-indigo-500 rounded-md">Message</a>--}}
            </div>
            @endif
        @if($count===0)
            <p class=" mt-3 text-red-600 text-center ">); Sorry no post yet. </p>
            @else
                <p class=" mt-3 text-red-600 text-center ">   {{$count}} posts  </p>
            @endif
            <!-- Add more sections as needed (e.g., photos, posts, etc.) -->
        </div>

        <div class="overflow-scroll   h-[700px] mt-[50px]">
        <div> @foreach($posts as $post)
                <div class=" mt-[50px]  flex  justify-center   ">
                    <div class="w-full border-2  max-w-xl p-6 bg-white rounded-lg shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center align-middle">
                                @if($user->profile_pic!==null)
                                    <img src="{{asset('profile_image').'/'.$user->profile_pic}}" alt="User Profile Picture" class="w-10 h-10 rounded-full">
                                @else
                                    <img src="{{asset('profile_image').'/default.jpeg'}}" alt="User Profile Picture" class="w-10 h-10 rounded-full">

                                @endif                                <div>
                                    <a href="/profile/{{$user->id}}" class="ml-2   font-semibold">{{$user->name}}</a>
                                    <time class="text-gray-500 block text-sm">{{$post->created_at}}</time>

                                </div>
                            </div>

                            @if(Auth::user()->id===$post->user_id)
                                <form class="mt-4" method="post" action="posts/{{$post->post_id}}/delete">
                                    @csrf
                                    @method('delete')
                                    <button class="text-3xl text-red-600">X</button>
                                </form>
                            @endif
                        </div>

                        <p class="text-gray-800 text-lg ">{{$post->post_caption}}</p>

                        @if($post->post_image)

                            <div class="border mt-2">
                                <img src="{{asset('post_image').'/'.$post->post_image}}" alt="User post Picture" class=" ">
                            </div>
                        @endif
                        <div class="flex justify-between items-center mt-4">
                            <div class="flex items-center">
                                {{--                    <button class="flex items-center text-indigo-500 hover:text-indigo-600">--}}
                                {{--                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.343 12.343a6 6 0 0 1 8.486 0M12 2a10 10 0 0 1 10 10c0 5.523-4.477 10-10 10a10 10 0 0 1-10-10A10 10 0 0 1 12 2z"></path></svg>--}}
                                {{--                        <span>Like</span>--}}
                                {{--                    </button>--}}
                                <span class="ml-4 text-sm text-gray-500">10 Likes</span>
                            </div>
                            <button class="text-indigo-500 hover:text-indigo-600 text-sm">Comment</button>
                        </div>
                        {{--                <div class="mt-6">--}}
                        {{--                    <h2 class="text-lg font-semibold">Comments</h2>--}}
                        {{--                    <!-- Comment section - Hidden by default -->--}}
                        {{--                    <div class="comment-section  mt-4">--}}
                        {{--                        <div class="flex items-start mb-4">--}}
                        {{--                            <img src="{{asset('profile_image').'/default.jpeg'}}" alt="Commenter Profile Picture" class="w-8 h-8 rounded-full">--}}
                        {{--                        <div class="ml-2">--}}
                        {{--                                <p class="font-semibold text-sm">Commenter Name</p>--}}
                        {{--                               <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <!-- Add more comments as needed -->--}}

                        {{--                        <!-- Add comment input field and submit button -->--}}
                        {{--                        <div class="mt-4">--}}
                        {{--                            <input type="text" class="w-full border rounded p-2" placeholder="Write a comment...">--}}
                        {{--                            <button class="mt-2 text-sm px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Post Comment</button>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                    </div>
                </div>
            @endforeach</div>
        </div>
    </div>

</x-layout>
