<x-worker.app>
<section>
    <x-worker.title>
        Produits
    </x-worker.title>

    <label for="search"></label>
    <input type="search" name="" id="">

    @for($i<=8; $i= 0; $i++)
        <x-worker.product-card>
    @endfor
</section>
</x-worker.app>
