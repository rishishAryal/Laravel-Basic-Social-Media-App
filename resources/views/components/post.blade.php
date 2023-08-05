@props([$post])
<x-layout>
    <div class="mt-7 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-xl p-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <img src="user_profile_picture.jpg" alt="User Profile Picture" class="w-10 h-10 rounded-full">
                    <span class="ml-2  font-semibold">Name</span>
                </div>
                <span class="text-gray-500 text-sm">{{$post->created_at}}</span>
            </div>
            <p class="text-gray-800 text-sm ">{{$post->post_caption}}</p>
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
            <div class="mt-6">
                <h2 class="text-lg font-semibold">Comments</h2>
                <!-- Comment section - Hidden by default -->
                <div class="comment-section  mt-4">
                    <div class="flex items-start mb-4">
                        <img src="commenter_profile_picture.jpg" alt="Commenter Profile Picture" class="w-8 h-8 rounded-full">
                        <div class="ml-2">
                            <p class="font-semibold text-sm">Commenter Name</p>
                            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <!-- Add more comments as needed -->

                    <!-- Add comment input field and submit button -->
                    <div class="mt-4">
                        <input type="text" class="w-full border rounded p-2" placeholder="Write a comment...">
                        <button class="mt-2 text-sm px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Post Comment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
