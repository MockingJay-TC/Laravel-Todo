<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Todos</title>
</head>

<body>
    <div class="text-center pt-10">
        <h2 class="text-2xl">What next you need To-Do</h2>
        <x-alert />
        <form method="post" action="/todos/create" class="py-5">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
            <input type="submit" value="create" class="p-2 border rounded-lg shadow-sm" />
        </form>
    </div>


</body>

</html>