<x-worker.app :title="$title">
<section class="text-white background-dark margin-first-content-top">
    <h2 class="uppercase text-white fs-page-title bold page-title mb-64" aria-level="2" role="heading">
        {{__('worker/contact.contact')}}
    </h2>
    <div>
        <h3 class="worker-contact-subtitle">
            {{__('worker/contact.warehouse')}}
        </h3>
        <dl>
            <x-worker.definitionterm>
                {{__('worker/contact.phone')}}
            </x-worker.definitionterm>
            <x-worker.definition>
                @if($company->warehouse_phone != null && $company->warehouse_phone != '' && $company->warehouse_phone != ' ')
                    <a href="tel:{{$company->warehouse_phone}}" title="{{__('worker/contact.call')}}">
                        {{$company->warehouse_phone}}
                    </a>
                @else
                    <p>
                        {{__('worker/contact.not_defined_yet')}}
                    </p>
                @endif
            </x-worker.definition>
        </dl>
        <dl>
            <x-worker.definitionterm>
                {{__('worker/contact.email')}}
            </x-worker.definitionterm>
            <x-worker.definition>
                @if($company->warehouse_email != null && $company->warehouse_email != '' && $company->warehouse_email != ' ')
                    <a href="mailto:{{$company->warehouse_email}}" title="{{__('worker/contact.send_mail_to')}}">
                        {{$company->warehouse_email}}
                    </a>
                @else
                    <p>
                        {{__('worker/contact.not_defined_yet')}}
                    </p>
                @endif
            </x-worker.definition>
        </dl>
    </div>
    <div class="m-t-80">
        <h3 class="worker-contact-subtitle">
            {{__('worker/contact.global')}}
        </h3>
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
                <a href="mailto:support@powerbase.be" title="{{__('worker/contact.send_mail_to')}}">
                    support@powerbase.be
                </a>
            </x-worker.definition>
        </dl>
    </div>
</section>
</x-worker.app>
