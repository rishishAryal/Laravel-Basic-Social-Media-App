
    <x-layout>

        <div class="flex justify-center items-center">
            <div class="mt-12">
                <form method="post" action="/profile/{{Auth::user()->id}}/edit" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="bio" class="text-2xl font-bold text-gray-700 tracking-wide">Edit Bio</label>
                        <textarea name="bio"  id="bio"

                                  class="w-full mt-4  text-lg py-2 border border-gray-300 focus:outline-none focus:border-indigo-500"
                                  rows="4" cols="50"
                        >{{old('bio', $user->bio)}}</textarea>
                        @error('bio')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-8">
                        <label for="name" class="text-2xl font-bold text-gray-700 tracking-wide">Edit Your Username</label>
                        <input name="name"  id="name"
                           value=" {{old('name', $user->name)}}"
                                  class="w-full mt-4  text-lg py-2 border border-gray-300 focus:outline-none focus:border-indigo-500"

                        >
                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-8">
                        <label for="profile_pic" class="text-2xl font-bold text-gray-700 tracking-wide">Add new Profile picture</label>
                        <input name="profile_pic"  id="profile_pic"
                               class="w-full text-lg py-2  mt-4   "
                               type="file">
                        @error('profile_pic')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-10">
                        <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                            Edit
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
