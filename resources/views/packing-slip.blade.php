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
        <div class="bg-gray-50 text-black/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <h1>QLS Assessment</h1>
                        </div>
                    </header>

                    <main class="mt-6">
                        <h2>Verzendlabel aanmaken</h2>
                        @error('company_id', 'brand_id')
                            <div>{{ $message }}</div>
                        @enderror
                        <form method="POST" action="/">
                            @csrf

                            <input type="hidden" name="company_id" value="{{ $company_id }}">
                            <input type="hidden" name="brand_id" value="{{ $brand_id }}">

                            <label for="product_combination_id">Product Combination ID</label><br />
                            <input id="product_combination_id" type="text" name="product_combination_id" value="{{ $product_combination->value }}"><br />

                            <fieldset>
                                <legend>Receiver contact</legend>
                                <label for="name">Naam</label><br />
                                <input id="name" type="text" name="name"><br />
                                <label for="companyname">Bedrijfsnaam</label><br />
                                <input id="companyname" type="text" name="companyname"><br />
                                <label for="street">Straatnaam</label><br />
                                <input id="street" type="text" name="street"><br />
                                <label for="housenumber">Huisnummer</label><br />
                                <input id="housenumber" type="text" name="housenumber"><br />
                                <label for="postalcode">Postcode</label><br />
                                <input id="postalcode" type="text" name="postalcode"><br />
                                <label for="locality">Regio</label><br />
                                <input id="locality" type="text" name="locality"><br />
                                <label for="country">Land</label><br />
                                <input id="country" type="text" name="country"><br />
                            </fieldset>

                            <input type="submit">
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
