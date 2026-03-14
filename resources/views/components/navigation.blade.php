<header class="">
    <h1 class="" role="heading" aria-level="1">
        Powerbase
    </h1>

    <nav class="" role="navigation" aria-label="Main">
        <h2 class="" aria-level="2" role="heading">Navigation principale</h2>

        <a href="/"
           lang=""
           hreflang=""
           class=""
           title="Logo de Powerbase — Aller vers la page d'accueil"
           aria-label="Aller vers la page d’accueil">
            svg logo klein
        </a>
        <a href="/"
           lang=""
           hreflang=""
           class=""
           title="Logo de Powerbase — Aller vers la page d'accueil"
           aria-label="Aller vers la page d’accueil">
            svg logo gross
        </a>

        <a href="#content" class="" title="Aller au contenu principal" aria-label="Aller au contenu principal">Aller au contenu principal</a>

        <input type="checkbox" id="burger_menu" name="burger_menu">
        <label for="burger_menu" class="">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2H22" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                <path d="M2 11H22" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                <path d="M2 20H22" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </label>
        <ul class="">
            <li class="">
                <a href="{{route('worker.homepage', ['locale' => __('general.currentLocale')])}}" class="" title="Aller vers la page Accueil" aria-label="Aller vers la page Accueil">Accueil</a>
        </li>
        <li class="">
            <a href="{{route('worker.products', ['locale' => __('general.currentLocale')])}}" title="Aller vers la page Nos animaux" class="" aria-label="Aller vers la page Nos animaux">Produits</a>
        </li>
        <li class="">
            <a href="{{route('worker.order', ['locale' => __('general.currentLocale')])}}" class="" title="Aller vers la page Contact" aria-label="Aller vers la page Contact">Commande</a>
        </li>
            <li class="">
                <a href="{{route('worker.contact', ['locale' => __('general.currentLocale')])}}" class="" title="Aller vers la page Contact" aria-label="Aller vers la page Contact">Contact</a>
            </li>
            <li class="">
                <a href="{{route('worker.profile', ['locale' => __('general.currentLocale')])}}" class="" title="Aller vers la page Contact" aria-label="Aller vers la page Contact">Profil</a>
            </li>
            <li class="">
                <a href="{{route('worker.contact', ['locale' => __('general.currentLocale')])}}" class="" title="Aller vers la page Contact" aria-label="Aller vers la page Contact">EN</a>
            </li>
        </ul>
    </nav>

</header>
