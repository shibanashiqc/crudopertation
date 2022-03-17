<x-guest-layout>

    <style>
    @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);
    </style>

    <div class="min-w-screen min-h-screen bg-gray-100 px-5 py-5">

        <div class="w-full mx-auto bg-white px-5 py-10 text-gray-600 mb-10">
            <div class="max-w-5xl mx-auto md:flex">
                <div class="md:w-1/4 md:flex md:flex-col">
                    <div class="text-left w-full flex-grow md:pr-5">
                        <h1 class="text-4xl font-bold mb-5">Pricing</h1>
                        <h3 class="text-md font-medium mb-5">We are providing low rate services*</h3>
                    </div>
                    <div class="w-full mb-2">
                        <p class="text-xs"></p>
                    </div>
                </div>
                @foreach ( $product as $products )
                <div class="md:w-3/4">
                    <div class="max-w-4xl mx-auto md:flex">
                        <div class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                            <div class="w-full flex-grow">
                                <h2 class="text-center font-bold uppercase mb-4">{{ $products->name }}</h2>
                                <h3 class="text-center font-bold text-4xl mb-5">${{ $products->sale_price }}<span class="text-sm">/mo</span></h3>
                                <ul class="text-sm mb-8">
                                    {!! $products->description !!}.

                                </ul>
                            </div>
                            <div class="w-full">

                                <form method="POST" action="{{ route('cart.item.id', ['id' => $products->id]) }}">
                                    @csrf
                                <button type="submit"class="font-bold bg-gray-600 hover:bg-gray-700 text-white rounded-md px-10 py-2 transition-colors w-full">Buy Now</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </x-guest-layout>
