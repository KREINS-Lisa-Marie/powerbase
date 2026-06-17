<x-worker.app>
<section class="text-white background-dark margin-first-content-top">
    <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
        {{__('worker/contact.contact')}}
    </h2>
    <dl>
        <x-worker.definitionterm>
            {{__('worker/contact.warehouse')}}
        </x-worker.definitionterm>
        <x-worker.definition>
            <a href="tel:00834927394" title="{{__('worker/contact.call')}}">
                00834927394
            </a>
        </x-worker.definition>
    </dl>
    <dl>
        <x-worker.definitionterm>
            {{__('worker/contact.email')}}
        </x-worker.definitionterm>
        <x-worker.definition>
            <a href="mailto:info@magasin.be" title="{{__('worker/contact.send_mail_to')}}">
                info@magasin.be
            </a>
        </x-worker.definition>
    </dl>
</section>
</x-worker.app>
