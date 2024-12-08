<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QLS Assessment - Alex Blackburn</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <header class="flex flex-col justify-center text-center my-4">
            <h1 class="text-3xl mb-2">QLS Assessment</h1>
            <h2 class="text-lg">Verzendlabel aanmaken</h2>
        </header>

        <main class="flex justify-center mt-6">
            @error('company_id', 'brand_id')
                <div>{{ $message }}</div>
            @enderror
            <form method="POST" action="/" class="w-80">
                @csrf

                <input type="hidden" name="company_id" value="{{ $company_id }}">
                <input type="hidden" name="brand_id" value="{{ $brand_id }}">

                <label for="product_combination_id">Product Combination ID</label><br />
                <input class="p-2 border border-black rounded mb-2 w-full" id="product_combination_id" type="text" name="product_combination_id" value="{{ $product_combination->value }}"><br />

                <fieldset class="mt-4">
                    <legend>Receiver contact</legend>
                    <label for="name">Naam</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="name" type="text" name="name"><br />
                    <label for="companyname">Bedrijfsnaam</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="companyname" type="text" name="companyname"><br />
                    <label for="street">Straatnaam</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="street" type="text" name="street"><br />
                    <label for="housenumber">Huisnummer</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="housenumber" type="text" name="housenumber"><br />
                    <label for="postalcode">Postcode</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="postalcode" type="text" name="postalcode"><br />
                    <label for="locality">Regio</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="locality" type="text" name="locality"><br />
                    <label for="country">Land</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="country" type="text" name="country"><br />
                </fieldset>

                <input class="p-2 border border-black rounded mb-2 w-full cursor-pointer" type="submit">
            </form>
        </main>
    </body>
</html>
