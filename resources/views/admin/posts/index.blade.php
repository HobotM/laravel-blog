<x-layout>

    <x-setting heading="Manage Posts">
        <!-- component -->
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">

                    <tbody class="bg-white">
                        @foreach ( $posts as $post )
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">
                                    <a href="/posts/{{$post->slug}}">
                                        {{$post->title}}
                                    </a>
                                    </div>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                    <span class="relative text-xs">Published</span>
                                </span>
                            </td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                <a href="/admin/posts/{{$post->id}}/edit"
                                    class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-600 hover:text-white focus:outline-none">Edit</button>
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">

                                    <form method="POST" action="/admin/posts/{{$post->id}}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-600 hover:text-white focus:outline-none">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">

                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
