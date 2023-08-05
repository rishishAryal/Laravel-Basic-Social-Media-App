<x-layout>

<div class="flex justify-center items-center">
    <div class="mt-12">
        <form method="post" action="/posts/create" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="post_caption" class="text-2xl font-bold text-gray-700 tracking-wide">Post Caption</label>
                <textarea name="post_caption"  id="post_caption"
                       required
                       class="w-full mt-4  text-lg py-2 border border-gray-300 focus:outline-none focus:border-indigo-500"
                          rows="4" cols="50"
                >{{old('post_caption', ' ')}}</textarea>
                @error('post_caption')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-8">
                <label for="post_image" class="text-2xl font-bold text-gray-700 tracking-wide">Select an Image</label>
                <input name="post_image"  id="post_image"
                       class="w-full text-lg py-2  mt-4   "
                       type="file">
                @error('post_image')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-10">
                <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                    Post
                </button>
                <a href="/" class=" text-center mt-3 btn bg-red-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold block font-display focus:outline-none focus:shadow-outline hover:bg-red-600
                                shadow-lg">
                    Cancel
                </a>
            </div>
        </form>

    </div>


</div>
</x-layout>
