



    <x-layout >



        <div class="flex flex-row justify-evenly  ">
            <div>
                <h1 class="  text-2xl text-center font-bold text-green-700">Users</h1>
                <div class="overflow-scroll  mt-[50px] h-[500px]">
                @foreach($users as $user)
                <div class="flex items-center m-2">
                    @if($user->profile_pic!==null)
                        <img src="{{asset('profile_image').'/'.$user->profile_pic}}" alt="User Profile Picture" class="w-[50px] h-[50px] rounded-full">
                    @else
                        <img src="{{asset('profile_image').'/default.jpeg'}}" alt="User Profile Picture" class="w-10 h-10 rounded-full">

                    @endif                    <a href="/profile/{{$user->id}}" class="ml-2  font-semibold">{{$user->name}}</a>
                </div>
                @endforeach
                </div>
            </div>



            <div>
                <div class="">

                    <div class="flex items-center">

                        @if(Auth::user()->profile_pic!==null)
                            <img src="{{asset('profile_image').'/'.Auth::user()->profile_pic}}" alt="User Profile Picture" class="w-[55px] h-[55px] rounded-full">
                        @else
                            <img src="{{asset('profile_image').'/default.jpeg'}}" alt="User Profile Picture" class="w-10 h-10 rounded-full">

                        @endif
                        <a  href="/profile/{{Auth::user()->id}}" class="ml-2  font-semibold">{{Auth::user()->name}}</a>
                    </div>
                    <a href="/logout" class="ml-4 font-bold text-3xl text-red-600 ">Logout</a>
                    <br>
                    <a href="/posts/create" class="mt-7 text-white  inline-block font-bold px-4 py-2 bg-black rounded">Create Post</a>

                </div>
            <div class="overflow-scroll  mt-[100px] h-[90vh]">


        @foreach($postsWithUsers as $post)
        <div class=" w-[700px] mt-[100px]  flex  justify-center   ">
            <div class="w-full border-2  max-w-xl p-6 bg-white rounded-lg shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center align-middle ">
                        @if($post->profile_pic!==null)
                            <img src="{{asset('profile_image').'/'.$post->profile_pic}}" alt="User Profile Picture" class="w-[55px] h-[55px] rounded-full">
                        @else
                            <img src="{{asset('profile_image').'/default.jpeg'}}" alt="User Profile Picture" class="w-10 h-10 rounded-full">

                        @endif
                            <div>
                        <a href="/profile/{{$post->user_id}}" class="ml-2   font-semibold">{{$post->name}}</a>
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
        @endforeach
            </div>
         </div>
        </div>
    </x-layout>
