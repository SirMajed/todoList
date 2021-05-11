<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/tailwindcss@0.3.0/dist/tailwind.min.css" rel="stylesheet">

    <title>Todo</title>

</head>

<body
    class="h-screen pb-14 bg-right bg-cover h-screen overflow-hidden flex items-center justify-center bg-gradient-to-r"
    style="--tw-gradient-from: #41295a;
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to, #2F0743);">

    <div class="w-full flex items-center justify-center">


        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">



            <div class="flex">
                <h1 class="text-grey-darkest flex-2"><b>My Todo List</b></h1>


                <div class="flex-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6  text-purple-900" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>



            {!! Form::open(['method' => 'POST', 'action' => 'TasksController@store']) !!}
            <div style="padding-top: 10px">

                <input name="name"
                    class="text-gray-600 dark:text-gray-400 focus:outline-none focus:border focus:border-purple-600 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-4 text-sm border-gray-300 rounded border shadow"
                    placeholder="Write your task" />
                <br>

                <button type="submit"
                    class="bg-purple-900 transition duration-150 ease-in-out hover:bg-purple-800 rounded text-white px-12 py-2 text-sm">Add
                    Task</button>
                {!! Form::close() !!}
                <hr style="margin-top: 10px">
            </div>
            {{-- The below code for the table that displays the tasks --}}
            <table
                class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="px-6 py-4">
                            @if ($task->isFinished == 1)
                            <p class="line-through">{{ $task->name }}</p>
                            @endif
                            {{$task->isFinished == 0 ? $task->name : '' }}
                        </td>

                        <td>
                            <form style="margin: 0; padding: 0;" method="PATCH"
                                action="{{ action('TasksController@edit', $task->id) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PATCH">

                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </form>
                        </td>

                        <td class="pl-1 pr-1"></td>
                        
                        <td>
                            <form method="POST" action="{{ action('TasksController@destroy', $task->id) }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-900" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>





    </div>
</body>

</html>
