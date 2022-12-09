<x-layout>

    <x-usersetting heading="Manage Posts and Details">
        <!-- component -->
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

            <div
                class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <table class="min-w-full">

                    <tbody class="bg-white">
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Id
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Author
                            </th>

                            <th colspan="2"
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>

                        </tr>

                        @foreach ( $posts as $post )

                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">
                                    <a href="/posts/{{$post->slug}}">
                                        {{$post->id}}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">
                                    <a href="/posts/{{$post->slug}}">
                                        {{$post->title}}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">
                                        {{$post->author->name}}
                                </div>
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                                <a href="/user/posts/{{$post->id}}/edit"
                                    class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-600 hover:text-white focus:outline-none">Edit</button>
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">

                                    <form method="POST" action="/user/posts/{{$post->id}}">
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
    </x-usersetting>
</x-layout>
