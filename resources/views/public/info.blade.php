<x-public.app :title="$title">
<section class="public-heading m-l-r-main body-content">
    <div class="public-titles">
        <h2 class="bold text-light-red">
            POWERBASE
        </h2>
        <p class="medium">
            L’application gratuite pour la gestion de vos commandes internes
        </p>
    </div>
        <ul class="d-flex flex-wrap flex-r flex-gap-24 public-heading-link-container ">
            <li>
                <a href="#boss"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('navigation.go_boss')}}"
                   aria-label="{{__('navigation.go_boss')}}">
                    Patrons
                </a>
            </li>
            <li>

                <a href="#storekeeper"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('navigation.go_storekeeper')}}"
                   aria-label="{{__('navigation.go_storekeeper')}}">
                    Magasiniers
                </a>
            </li>
            <li>
                <a href="#electrician"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('navigation.go_electricians')}}"
                   aria-label="{{__('navigation.go_electricians')}}">
                    Electriciens
                </a>
            </li>
        </ul>



</section>
<section class="public-intro ">
    <div class="m-l-r-main body-content d-flex flex-row flex-wrap flex-gap-24 flex-a-i-center">
    <div class="first-left">
        <h2 class="bold">
            Découvrez <span class="uppercase colored">Powerbase</span>
        </h2>
        <p>
            Cette application Web permet à aux entreprises d’électricité de centraliser la gestion des produits,
            commandes, stocks et projets. Elle facilite le travail des électriciens, magasiniers et administrateurs
            grâce à une interface simple et adaptée aux rôles de chacun.
        </p>
    </div>
    <div class="second-right">
        <img src="{!! asset('assets/img/power.png') !!}" alt="{{__('admin/animals.animal_image')}}" width="600" height="392"
             class="border-radius-16 public-content-img">
    </div>
    </div>
</section>
<section class="public-electrician " id="electrician">
    <div class="body-content m-l-r-main">
        <div class="public-top flex-a-i-center">
            <div class="first-left">
                <img src="{!! asset('assets/img/worker.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
            </div>
            <div class="second-right">
                <h2 class="bold">
                    Espace électricien
                </h2>
                <p>
                    Les électriciens peuvent consulter le catalogue des produits avec des images et des informations
                    détaillées, rechercher du matériel, ajouter des articles à leur panier et passer des commandes
                    associées
                    à un projet. Un système de rappel permet également de limiter les oublis de commande.
                </p>
                <a href="#storekeeper"
                   lang="{{app()->getLocale()}}"
                   hreflang="{{app()->getLocale()}}"
                   class="public-heading-link uppercase"
                   title="{{__('public.go_register')}}"
                   aria-label="{{__('public.go_register')}}">
                    Découvrir l'espace magasinier
                </a>
            </div>
        </div>
        <div class="public-bottom">
            <ul>
                <li>
                    <img src="{!! asset('assets/img/b7.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/img/b6.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/img/b8.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="public-advantages body-content m-l-r-main">
    <div class="m-l-r-main body-content d-flex flex-row flex-wrap flex-a-i-center flex-gap-24">
        <div class="first-left">
            <h2 class="bold">
                Votre atout sur votre concurrence
            </h2>
            <p>
                L’application améliore la communication entre les équipes, réduit les erreurs liées aux commandes par téléphone ou papier et permet une meilleure organisation des ressources. Elle offre également une meilleure traçabilité des produits, des projets et des interventions.
            </p>
        </div>
        <div class="second-right">
            <img src="{!! asset('assets/img/advantage.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
        </div>
        </div>
</section>


    <section class="public-storekeeper " id="storekeeper">
        <div class="body-content m-l-r-main">
            <div class="public-top flex-a-i-center">
        <div class="first-left">
            <img src="{!! asset('assets/img/electrician-p.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
        </div>
        <div class="second-right">
            <h2 class="bold">
                Espace magasinier
            </h2>
            <p>
                Les électriciens peuvent consulter le catalogue des produits avec des images et des informations détaillées, rechercher du matériel, ajouter des articles à leur panier et passer des commandes associées à un projet. Un système de rappel permet également de limiter les oublis de commande.
            </p>
            <a href="#boss"
               lang="{{app()->getLocale()}}"
               hreflang="{{app()->getLocale()}}"
               class="public-heading-link uppercase"
               title="{{__('public.go_register')}}"
               aria-label="{{__('public.go_register')}}">
                Découvrir l'espace patron
            </a>
        </div>
        </div>

        <div class="public-bottom">
            <ul>
                <li>
                    <img src="{!! asset('assets/img/electrician-d.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/img/electrician-c.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/img/electrician-cc.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
            </ul>
        </div>
        </div>
    </section>

<section class="public-why body-content m-l-r-main">
    <div class="first-left">
        <h2 class="bold">
            Pourquoi nous?
        </h2>
    </div>
    <div class="second-right">
        <p>
            L’application améliore la communication entre les équipes, réduit les erreurs liées aux commandes par téléphone ou papier et permet une meilleure organisation des ressources. Elle offre également une meilleure traçabilité des produits, des projets et des interventions.
        </p>
    </div>
</section>

    <div class="public-big-btn big-btn-white">
        <div class="m-l-r-main body-content">


    <a href="{{route('auth.register', ['locale' => app()->getLocale()])}}" title="{{__('footer.go_to_page_register')}}" class="bold d-flex flex-a-i-center j-c-space-b">
        Commencez maintenant
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
            <path d="M16 50C16 31.2 31.2 16 50 16C68.8 16 84 31.2 84 50C84 68.8 68.8 84 50 84C31.2 84 16 68.8 16 50ZM80 50C80 33.4 66.6 20 50 20C33.4 20 20 33.4 20 50C20 66.6 33.4 80 50 80C66.6 80 80 66.6 80 50Z" fill="black"/>
            <path d="M46.6008 66.5937L63.2008 49.9937L46.6008 33.3938L49.4008 30.5937L68.8008 49.9937L49.4008 69.3938L46.6008 66.5937Z" fill="black"/>
            <path d="M66 48L66 52L32 52L32 48L66 48Z" fill="black"/>
        </svg>
    </a>

        </div>
    </div>



    <section class="public-boss " id="boss">
        <div class="body-content m-l-r-main">
            <div class="public-top flex-a-i-center">
        <div class="first-left">
            <img src="{!! asset('assets/img/b3.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="600" height="392" class="border-radius-16 public-content-img">
        </div>
        <div class="second-right">
            <h2>
                Espace patron
            </h2>
            <p>
                Les électriciens peuvent consulter le catalogue des produits avec des images et des informations détaillées, rechercher du matériel, ajouter des articles à leur panier et passer des commandes associées à un projet. Un système de rappel permet également de limiter les oublis de commande.
            </p>
            <a href="{{route('auth.register', ['locale' => app()->getLocale()])}}"
               lang="{{app()->getLocale()}}"
               hreflang="{{app()->getLocale()}}"
               class="public-heading-link uppercase"
               title="{{__('public.go_register')}}"
               aria-label="{{__('public.go_register')}}">
                Créer un compte
            </a>
        </div>
        </div>
        <div class="public-bottom">
            <ul>
                <li>
                    <img src="{!! asset('assets/img/b4.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/img/b5.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
                <li>
                    <img src="{!! asset('assets/img/b1.jpg') !!}" alt="{{__('admin/animals.animal_image')}}" width="392" height="288" class="border-radius-16 public-content-img">
                </li>
            </ul>
        </div>
        </div>
    </section>

    <div class="public-big-btn big-btn-color ">

        <div class="m-l-r-main body-content">
            <a href="{{route('public.contact', ['locale' => app()->getLocale()])}}" title="{{__('footer.go_to_page_contact')}}" class="bold">
                Besoin de plus d’informations?
                Contactez-nous!
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" fill="none">
                <path
                    d="M16 50C16 31.2 31.2 16 50 16C68.8 16 84 31.2 84 50C84 68.8 68.8 84 50 84C31.2 84 16 68.8 16 50ZM80 50C80 33.4 66.6 20 50 20C33.4 20 20 33.4 20 50C20 66.6 33.4 80 50 80C66.6 80 80 66.6 80 50Z"
                    fill="white"/>
                <path
                    d="M46.6008 66.5937L63.2008 49.9937L46.6008 33.3938L49.4008 30.5937L68.8008 49.9937L49.4008 69.3938L46.6008 66.5937Z"
                    fill="white"/>
                <path d="M66 48L66 52L32 52L32 48L66 48Z" fill="white"/>
            </svg>
        </div>
    </div>


    <x-public.footer></x-public.footer>




</x-public.app>
