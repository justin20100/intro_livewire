<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <meta name="author"
          content="TECG-CPW">
    <meta name="description"
          content="Une table manipulable via Livewire">
    <meta name="keywords"
          content="livewire, table, triable, cherchable">

    <title>Mes contacts</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
</head>
<body class="mx-auto max-w-3xl bg-white mt-4">
<main class="container w-full">
    <h1 class="text-2xl font-black mb-8 uppercase text-center tracking-wider text-blue-800">Mes Contacts</h1>
    <div class="flex flex-col gap-2 mb-8">
        <form action="/">
            <div class="flex gap-2 items-center">
                <label for="per-page"
                       class="font-bold">Per Page:</label>
                <select name="per-page"
                        class="pl-4 p-2 rounded-lg shadow-md bg-blue-800 text-white"
                        id="per-page">
                    <option value="10" {{$perPage == 10 ? 'selected' : ''}}>10</option>
                    <option value="15" {{$perPage == 15 ? 'selected' : ''}}>15</option>
                    <option value="25" {{$perPage == 25 ? 'selected' : ''}}>25</option>
                </select>
                <button type="submit"
                        class="px-4 py-2 rounded-lg shadow-md bg-blue-800 text-white uppercase tracking-wider">Change
                    pagination
                </button>
            </div>
        </form>
        <form action="/">
            <div class="flex gap-2 items-center">
                <label for="search-term"
                       class="font-bold">Search term or email:</label>
                <input type="search"
                       class="p-2 border border-1 border-gray-200 rounded-md shadow-inner"
                       name="search-term"
                       id="search-term"
                       value="{{$searchTerm}}"
                       placeholder="name or email"
                >
                <button type="submit"
                        class="px-4 py-2 rounded-lg shadow-md bg-blue-800 text-white uppercase tracking-wider">search
                </button>
            </div>
        </form>
    </div>

    <x-table :qp="$qp" :contacts="$contacts->items()"/>
    <div class="pageNavigation">
        {{$contacts->appends($qp)->links('pagination::tailwind')}}
    </div>

</main>
</body>
</html>
