<x-worker.app>
    <x-worker.page-title>
        Bonjour Eric
    </x-worker.page-title>
        <section class="">
            <x-worker.title>
                Nouveaux produits
            </x-worker.title>
            <div class="">
            @for( $i= 0;$i<=3; $i++)

                <x-worker.product-card productname="Vis 1000"/>
            @endfor
            </div>
        </section>

        <section class="">
            <x-worker.title>
                Produits populaires
            </x-worker.title>

            <div class="">
            @for( $i= 0; $i<=7; $i++)
                <x-worker.product-card productname=""/>
            @endfor
            </div>
        </section>
</x-worker.app>
