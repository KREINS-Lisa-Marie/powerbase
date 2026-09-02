@php
    $vehicle_options = [
        [
            'name' => 'Camionette',
        'value' => '1',
        ],
        [
            'name' => 'Voiture',
            'value' =>'0',
        ],
];


    $job_options = [
        [
            'name' => 'Electricien',
        'value' => 'electricien',
        ],
        [
            'name' => 'Magasinier',
            'value' =>'magasinier',
        ],
            [
            'name' => 'Admin',
            'value' =>'admin',
        ],
];
@endphp



<main class="admin product" id="content">
    @can('create', \App\Models\Product::class)
    <x-admin.page-bar>
        {{__('admin/products.create_a_product')}}
    </x-admin.page-bar>
    <div class="main-container">
        <x-admin.return-button class=""></x-admin.return-button>
        <form wire:submit.prevent="store" {{-- x-data
              x-on:submit.prevent="console.log('handler fired'); $wire.triggerStore = true; console.log('triggerStore now', $wire.triggerStore)" x-data x-on:submit.prevent="$wire.triggerStore = true"--}}  class="profile-form volunteers-edit" enctype="multipart/form-data">
            @csrf
            <fieldset class="contact-information max-w-admin-web big-section">

                <x-admin.components.subtitle>
                    {{__('admin/products.general_information')}}
                </x-admin.components.subtitle>
                <p class="obligations m-b-32 ">
                    {{__('worker/order.mandatory_field')}}
                </p>
                <div class="contact-information-list">
                    <dl>
                        <div>
                            <x-admin.components.fields.text name="product_name" value="" placeholder="John" wire="product_name"
                                                            id="product_name">
                                {{__('admin/products.product_name')}}*
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.text name="brand" value="" placeholder="Johnson" wire="brand"
                                                            id="brand">
                                {{__('admin/products.brand')}}*
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.textarea wire="product_description" id="product_description"
                                                                name="product_description"
                                                                placeholder="{{__('admin/products.placeholder_description')}}">
                                {{__('admin/products.description')}}
                            </x-admin.components.fields.textarea>
                        </div>
                    </dl>


                    <dl>
                        <div>
                            <x-admin.components.fields.textarea wire="product_notes" name="product_notes" id="product_notes" value=""
                                                                placeholder="{{__('admin/products.placeholder_note')}}">
                                {{__('admin/products.notes')}}
                            </x-admin.components.fields.textarea>
                        </div>

                        <div>
                            <x-admin.components.fields.text wire="ref_article" name="ref_article"
                                                              id="ref_article"
                                                              value="" placeholder="22">
                                {{__('admin/products.ref_article')}}*
                            </x-admin.components.fields.text>
                        </div>
                        <div>
                            <x-admin.components.fields.number wire="quantity" name="quantity"
                                                              id="quantity"
                                                              value="" placeholder="22">
                                {{__('admin/products.stock_number')}}*
                            </x-admin.components.fields.number>
                        </div>
                    </dl>

                    <div>
                        <div class="text-field" >
                           {{-- <label for="gtin" class="field__label">
                                {{__('admin/products.gtin')}}
                            </label>
                            <input wire:model.live.blur="gtin" type="text" name="gtin" id="gtin" placeholder="DHH34HK43BF2" aria-required="true" class="field__input">
                            <button type="button" x-data x-on:click="$dispatch('open-gtin-scanner')">
                                {{ __('admin/products.scan_gtin') }}
                            </button>--}}
               {{--             <label for="gtin" class="field__label">
                                {{__('admin/products.gtin')}}
                            </label>
                            <input wire:model.live.blur="gtin" type="text" name="gtin" id="gtin" placeholder="DHH34HK43BF2" aria-required="true" class="field__input">
                            @error('gtin')
                            <p class="mb-32 error">{{$message}}</p>
                            @enderror
                            <button type="button" x-data x-on:click="$dispatch('open-gtin-scanner')">
                                {{ __('admin/products.scan_gtin') }}
                            </button>--}}
                        </div>

                        <div class="text-field">
                            <label for="gtin" class="field__label">{{__('admin/products.gtin')}}*</label>
                            <input wire:model.live.blur="gtin" type="text" name="gtin" id="gtin" placeholder="DHH34HK43BF2" aria-required="true" class="field__input">
                            @error('gtin')
                            <p class="mb-32 error">{{$message}}</p>
                            @enderror
                            <button type="button" x-data x-on:click="$dispatch('open-gtin-scanner')">
                                {{ __('admin/products.scan_gtin') }}
                            </button>
                        </div>
                        {{--
                        Boite du scanner. Caché par defaut
                        --}}
                        <div
                            x-data="{
        visible: false, //scanner visible maintenant? Non
        html5QrCode: null,      //camera scanner
        open() {    //tourne quand bouton open cliqué
        this.visible = true;        //scanner visible maintenant!
        this.$nextTick(() => this.start());     //allume camera
        },
        close() { this.stop(); this.visible = false; }, //Quand on click annuler
        start() {       //Allume camera et cherche qrcode
            this.html5QrCode = new Html5Qrcode('reader');
            const config = { fps: 10, qrbox: { width: 250, height: 250 } };     //check 10x/sec
            this.html5QrCode.start(
                { facingMode: 'environment' },  //back camera
                config,
                (decodedText, decodedResult) => this.onScanSuccess(decodedText, decodedResult), //tourne si qrcode trouvé
                (errorMessage) => { /* parse error, ignore it */ }
            ).catch((err) => {
                alert('Camera unavailable - check HTTPS and permissions.'); //peut pas ouvrir la camera
                this.close();
            });
        },
        onScanSuccess(decodedText, decodedResult) {     //quand code a été reconnu
            const gtin = this.extractGtin(decodedText);
            if (!gtin) return;  //si pas gtin, continuer a scanner
            const input = document.getElementById('gtin');
            input.value = gtin;
            input.dispatchEvent(new Event('input', { bubbles: true }));
            input.dispatchEvent(new Event('blur', { bubbles: true }));
            this.close();      //fermer scan
        },
        extractGtin(raw) {      //extrait un bon gtin depuis qrcode
            let m = raw.match(/\/01\/(\d{14})/);
            if (m) return m[1];
            m = raw.match(/^01(\d{14})/);
            if (m) return m[1];
            const digits = raw.replace(/\D/g, '');
            return [8, 12, 13, 14].includes(digits.length) ? digits : null;
        },
        stop() {        //arrête caméra
            if (!this.html5QrCode) return;
            this.html5QrCode.stop().then(() => {
                this.html5QrCode.clear();       //vider vue caméra
                this.html5QrCode = null;
            }).catch(() => {
                this.html5QrCode = null;
            });
        },
    }"
                            x-on:open-gtin-scanner.window="open()"
                            x-show="visible"  {{--seulement ouvert si open--}}
                        >
                            <div id="reader" width="600px"></div>{{--image du scanner--}}
                            <button id="close" type="button" x-on:click="close()">
                                {{ __('admin/products.cancel') }}
                            </button>
                        </div>







                        <div>
                            <x-admin.components.fields.file name_id="product_image" wire="product_image"
                                                            name="product_image">
                                {{__('admin/products.product_image')}}
                            </x-admin.components.fields.file>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <x-admin.components.fields.textarea wire="comment" name="comment" id="comment" value="{!! $comment !!}"
                                                            placeholder="{{__('admin/products.placeholder_comment')}}">
                            {{__('admin/products.comment')}}
                        </x-admin.components.fields.textarea>
                    </div>
                </div>
            </fieldset>

            <div class="split-row">
                <div class="admin-information-buttons">
                    <x-admin.components.form-button>
                        {{__('admin/products.create_product')}}
                    </x-admin.components.form-button>
                </div>
            </div>

        </form>
    </div>
    @endcan
</main>


@once
    <script src="https://unpkg.com/qr-scanner@1.4.2/qr-scanner.umd.min.js"></script>
@endonce
@once
    <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
@endonce

{{--
https://scanapp.org/html5-qrcode-docs/docs/intro
https://github.com/mebjas/html5-qrcode
--}}
