<x-worker.app>
    <section class="products-page-section">
        <x-worker.title>
            {{__('worker/products.products')}}
        </x-worker.title>

        <label for="search"></label>
        <input type="search" name="" id="" placeholder="Vis de blablabla">

        <ul class="d-flex flex-wrap flex-gap-24">
            @for( $i= 0; $i<=15;$i++)
                <li>
                    <x-worker.product-card productname="Vis 1000"/>
                </li>
            @endfor
        </ul>

    </section>
</x-worker.app>
