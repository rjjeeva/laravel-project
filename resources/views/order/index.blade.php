<x-app-layout>
    <div class="p-8 text-white">
        <h1 class="text-2xl font-bold mb-4">Place Your Water Can Order</h1>

        <form action="" method="POST">
            @csrf

            <label class="block text-gray-300 mb-2">Quantity</label>
            <input type="number" name="quantity" class="text-black p-2 rounded">

            <button class="mt-4 bg-blue-600 px-4 py-2 rounded">Submit</button>
        </form>
    </div>
</x-app-layout>
