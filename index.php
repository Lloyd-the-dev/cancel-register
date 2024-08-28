<!DOCTYPE html>
<html lang="en">
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <body style="background-color: #a0d2eb;">
        <h1 class="main-heading text-5xl font-[700]">The Cancelooor</h1>

        <!-- component -->
        <div class="bg-inherit flex justify-center items-center w-4/5 my-0 mx-auto">
            <!-- Left: Image -->
            <div class="w-1/2 hidden lg:block">
                <img src="./img/confused lady.png" alt="Placeholder Image" class="object-cover w-4/5 h-4/5">
            </div>
            <!-- Right: Login Form -->
            <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
                <h1 class="text-2xl font-semibold mb-4">Login</h1>
                <form action="login.php" method="POST">
                    <!-- Email Input -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
                    </div>
                    <!-- Password Input -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-600">Password</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full" name="button">Login</button>
                </form>
            </div>
        </div>
    </body>
</html>