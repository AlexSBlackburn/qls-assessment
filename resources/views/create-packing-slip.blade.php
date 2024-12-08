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
            <form method="POST" action="/" class="w-80">
                @csrf

                <input type="hidden" name="company_id" value="{{ $company_id }}"><br />
                @error('company_id')
                    <div>{{ $message }}</div>
                @enderror
                <input type="hidden" name="brand_id" value="{{ $brand_id }}"><br />
                @error('brand_id')
                    <div>{{ $message }}</div>
                @enderror

                <label for="product_combination_id">Verzendproduct</label><br />
                <select class="p-2 border border-black rounded mb-2 w-full" name="product_combination_id" id="product_combination_id">
                    @foreach($product_combinations as $product_combination)
                        <option value="{{ $product_combination->id }}">{{ $product_combination->name }}</option>
                    @endforeach
                </select>
                @error('product_combination_id')
                    <div>{{ $message }}</div>
                @enderror

                <fieldset class="mt-4">
                    <legend>Adresgegevens ontvanger</legend>
                    <label for="name">Naam</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="name" type="text" name="name" value="{{ old('name') }}"><br />
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <label for="companyname">Bedrijfsnaam</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="companyname" type="text" name="companyname" value="{{ old('companyname') }}"><br />
                    @error('company')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <label for="street">Straatnaam</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="street" type="text" name="street" value="{{ old('street') }}"><br />
                    @error('street')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <label for="housenumber">Huisnummer</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="housenumber" type="text" name="housenumber" value="{{ old('housenumber') }}"><br />
                    @error('housenumber')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <label for="postalcode">Postcode</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="postalcode" type="text" name="postalcode" value="{{ old('postalcode') }}"><br />
                    @error('postalcode')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <label for="locality">Stad</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="locality" type="text" name="locality" value="{{ old('locality') }}"><br />
                    @error('locality')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    <label for="country">Land</label><br />
                    <input class="p-2 border border-black rounded mb-2 w-full" id="country" type="text" name="country" value="{{ old('country') }}"><br />
                    @error('country')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </fieldset>

                <input class="p-2 border border-black rounded mb-2 w-full cursor-pointer" type="submit">
            </form>
        </main>
    </body>
</html>
