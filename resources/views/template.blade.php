<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Livewire</title>
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="p-5 bg-white dark:bg-gray-900 antialiased">
    @yield('content')
    @livewire('dynamic-modal')
    @livewireScripts
    <script>
        function priceMask() {
            return {
                price: '',

                formatPrice() {
                    let value = this.price.replace(/\D/g, ''); // Remove tudo que não é dígito
                    value = (value / 100).toFixed(2) + ''; // Divide por 100 e fixa duas casas decimais
                    value = value.replace(".", ",");
                    value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
                    this.price = value;
                }
            }
        }
    </script>
</body>
</html>

