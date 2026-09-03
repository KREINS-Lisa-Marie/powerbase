<x-public.app title="{{__('general.worker_contact')}}">
<section class="m-l-r-main body-content contact-us-section border-radius-16">
    <h2 class="bold page-title">
        {{__('public/contact.contact_us')}}
    </h2>
    <div class="d-flex flex-r flex-gap-24 flex-a-i-center">
        <div class="first-left">
            <p>
                {{__('public/contact.for_questions')}}
            </p>
        </div>
        <div class="second-right">
            <dl>
                <x-admin.components.definition-term>
                    {{__('worker/contact.warehouse')}}
                </x-admin.components.definition-term>
                <x-admin.components.definition>
                    <a href="tel:00834927394" title="{{__('worker/contact.call')}}">
                        00834927394
                    </a>
                </x-admin.components.definition>
                <x-admin.components.definition-term>
                    {{__('worker/contact.email')}}
                </x-admin.components.definition-term>
                <x-admin.components.definition>
                    <a href="mailto:info@magasin.be" title="{{__('worker/contact.send_mail_to')}}">
                        info@powerbase.be
                    </a>
                </x-admin.components.definition>
            </dl>
        </div>
    </div>
</section>
    <x-public.footer></x-public.footer>
</x-public.app>
