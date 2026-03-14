<x-worker.app>
    <section class="m-b-64 background-dark margin-first-content-top">
  {{--      <form action="" method="POST" class="form  web-margin-l-r-auto background-light border-r-small m-lr-24 m-b-60-150 ">

            <x-worker.title>
                Commande
            </x-worker.title>

            <fieldset>

                <p class="obligations">
                    {{__('public/contact.mandatory_fields')}}
                </p>

                <div class="">
                    <div class="field p-b-32">
                        <label for="projectname" class="field__label">
                            {{__('public/contact.concerning')}}
                        </label>
                        <select name="projectname-select" id="projectname-select"
                                class="field__select background-white p-16 border-r-big " aria-required="true">
                            <option value="">{{__('public/contact.choose_subject')}}</option>
                            <option value="information">
                                {{__('public/contact.general_info')}}</option>
                            <option value="volunteer">
                                {{__('public/contact.volunteer')}}</option>
                            <option value="volunteer">
                                {{__('public/contact.adoption_request')}}</option>
                        </select>
                    </div>


                    <x-fields.text name="firstname" id="firstname" value="" placeholder="John" wire="">

                        {{__('public/contact.first_name_mandatory')}}
                    </x-fields.text>

                    <x-fields.text name="lastname" id="lastname" value="" placeholder="Doe" wire="">

                        {{__('public/contact.lastname_mandatory')}}
                    </x-fields.text>

                    <x-fields.email value="" wire="">
                        {{__('public/contact.email_mandatory')}}
                    </x-fields.email>



                </div>


            </fieldset>
            <button type="submit" class="btn contact-form-btn background-dark color-white dark-button-background min-w-130 border-r-big margin-l-r-auto m-t-32 d-block p-16-32">{{__('public/contact.send')}}
            </button>
        </form>--}}


        <form action="" method="POST" class="form text-white ">
            <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
                Commande
            </h2>
            <fieldset>

                <p class="obligations m-b-32">
                    champs obligatoire *
                </p>

                <div class="d-flex flex-gap-32 flex-wrap flex-dir-col">

                    <div class="field">
                        <label for="project" class="field__label m-b-16 uppercase bold d-block ">
                            Nom du projet *
                        </label>
                        <select name="project-select" id="project-select"
                                class="field__select background-white p-12-16 border-radius-16 text-black d-block max-w-560 w-100" aria-required="true">
                            <option value="1">
                                Project 1
                            </option>
                            <option value="2">
                                Project 2
                            </option>
                            <option value="3">
                                Project 3
                            </option>
                            <option value="4">
                                Project 4
                            </option>
                        </select>
                    </div>
                    <div class="">
                        <label for="quantity" class="field__label m-b-16 uppercase bold d-block">
                            Nom produit

                        </label>
                        <div class="increment_fields d-flex m-t-16 ">



                            <button class="incr_control incr_control_minus ">
                                <span class="btn-icon">
             {{--                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"></path>
                                    </svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="rgb(255, 255, 255)"
                                              d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/>
                                    </svg>
                                </span>
                            </button>

                            <input class="bold incr-input t-a-center text-white" id="" type="number" max=""
                                   name="quantity" value="0">


                            <button class="incr_control incr_control_plus ">
                                <span class="btn-icon">
            {{--                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"></path>
                                    </svg>--}}

                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/>
                                    </svg>


                                </span>
                            </button>

                        </div>
                    </div>

                    <div class="">
                        <label for="quantity" class="field__label m-b-16 uppercase bold d-block">
                            Nom produit

                        </label>
                        <div class="increment_fields d-flex m-t-16 ">



                            <button class="incr_control incr_control_minus ">
                                <span class="btn-icon">
             {{--                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"></path>
                                    </svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="rgb(255, 255, 255)"
                                              d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/>
                                    </svg>
                                </span>
                            </button>

                            <input class="bold incr-input t-a-center text-white" id="" type="number" max=""
                                   name="quantity" value="0">


                            <button class="incr_control incr_control_plus ">
                                <span class="btn-icon">
            {{--                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"></path>
                                    </svg>--}}

                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/>
                                    </svg>


                                </span>
                            </button>

                        </div>
                    </div>

                    <div class="">
                        <label for="quantity" class="field__label m-b-16 uppercase bold d-block">
                            Nom produit

                        </label>
                        <div class="increment_fields d-flex m-t-16 ">



                            <button class="incr_control incr_control_minus ">
                                <span class="btn-icon">
             {{--                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"></path>
                                    </svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="rgb(255, 255, 255)"
                                              d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/>
                                    </svg>
                                </span>
                            </button>

                            <input class="bold incr-input t-a-center text-white" id="" type="number" max=""
                                   name="quantity" value="0">


                            <button class="incr_control incr_control_plus ">
                                <span class="btn-icon">
            {{--                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"></path>
                                    </svg>--}}

                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/>
                                    </svg>


                                </span>
                            </button>

                        </div>
                    </div>

                    <div class="">
                        <label for="quantity" class="field__label m-b-16 uppercase bold d-block">
                            Nom produit

                        </label>
                        <div class="increment_fields d-flex m-t-16 ">



                            <button class="incr_control incr_control_minus ">
                                <span class="btn-icon">
             {{--                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"></path>
                                    </svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="rgb(255, 255, 255)"
                                              d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/>
                                    </svg>
                                </span>
                            </button>

                            <input class="bold incr-input t-a-center text-white" id="" type="number" max=""
                                   name="quantity" value="0">


                            <button class="incr_control incr_control_plus ">
                                <span class="btn-icon">
            {{--                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"></path>
                                    </svg>--}}

                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/>
                                    </svg>


                                </span>
                            </button>

                        </div>
                    </div>

                    <div class="">
                        <label for="quantity" class="field__label m-b-16 uppercase bold d-block">
                            Nom produit

                        </label>
                        <div class="increment_fields d-flex m-t-16 ">



                            <button class="incr_control incr_control_minus ">
                                <span class="btn-icon">
             {{--                       <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"></path>
                                    </svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path fill="rgb(255, 255, 255)"
                                              d="M96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320z"/>
                                    </svg>
                                </span>
                            </button>

                            <input class="bold incr-input t-a-center text-white" id="" type="number" max=""
                                   name="quantity" value="0">


                            <button class="incr_control incr_control_plus ">
                                <span class="btn-icon">
            {{--                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"></path>
                                    </svg>--}}

                                    <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"  viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                                        <path
                                            d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/>
                                    </svg>


                                </span>
                            </button>

                        </div>
                    </div>
                </div>

            </fieldset>
            <button type="submit"
                    class="background-light-red text-white uppercase p-t-b-16 border-radius-16 max-w-560 bold submit-order-btn d-block m-l-auto w-100">
                Confirmer la commande
            </button>
        </form>



    </section>

    <section class="background-dark text-white section-end-128">
        <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
            Toutes mes commandes
        </h2>

        @for($i=0; $i<=4; $i++)
            <dl class="orders-end-64">
                <x-worker.definitionterm>
                    Commande 18293
                </x-worker.definitionterm>
                <x-worker.definition>
                    Prête
                </x-worker.definition>

                <x-worker.definitionterm>
                    Nom Projet
                </x-worker.definitionterm>
                <x-worker.definition>
                    Maison2
                </x-worker.definition>

                <x-worker.definitionterm>
                    Nombre de produits
                </x-worker.definitionterm>
                <x-worker.definition>
                    5 pièces
                </x-worker.definition>
            </dl>
                @endfor
    </section>
</x-worker.app>
