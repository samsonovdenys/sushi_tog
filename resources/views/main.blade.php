@extends('layouts.app')

{{-- @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
        @endauth
    </div>
@endif --}}

{{-- BODY --}}
<!-- header -> menu-burger, App-title, search-section  -->
@section('content')


    <main>

        <div style="display: flex;">
            <button id="tab_left" class="divided underlined">
                <h3>Il tuo ordine (8)</h3>
            </button>
            <button id="tab_right"class="divided">
                <h3>Ordine del gruppo (49)</h3>
            </button>
        </div>

        <div class="tab_body">
            <!-- Il contenuto del TAB 'Il tuo ordine' -->
            <div class="left_tab_body"><!-- start = left_tab_body -->
                <div class="left_tab_body_create_item"><!-- start = left_tab_body_create_item -->
                    <h2 style="font-size:26px; color:lightseagreen;">Aggiungi un piatto</h2>
                    <div class="create_item_inputs"> <!-- start = create_item_inputs -->

                        <div class="create_item_inputs_left divided">
                            <h2>Codice Piatto</h2>
                            <input id="input_code" type="text" class="create_item_input"
                                placeholder="codice piatto" value="A001">
                        </div>

                        <div class="create_item_inputs_right divided">
                            <h2>Quantità</h2>
                            <button class="create_item_quantity_minus">
                                <h3>-</h3>
                            </button>
                            <input id="input_quantity" type="number" class="create_item_input" placeholder="1"
                                min="1" max="100" value="1">
                            <button class="create_item_quantity_plus">
                                <h3>+</h3>
                            </button>
                        </div>

                    </div> <!-- end = create_item_inputs -->

                    <!-- Annulla e Conferma buttons -->
                    <div class="create_item_buttons">
                        <button class="create_item_button_cancel divided">
                            <h2>Chiudi</h2>
                        </button>
                        <button class="create_item_button_confirm divided">
                            <h2>Conferma</h2>
                        </button>
                    </div>

                </div><!-- end = left_tab_body_create_item -->
                <hr>
                <!-- Button Crea nuovo piatto -->
                <button class="add_plate_button">
                    <h4 style="font-size:16px; color:lightseagreen;">Aggiungi un piatto</h4>
                </button>
                <ul id="order_list_items" class="order_list">
                    <!-- Dishes codes from js -->
                </ul>
                <button id="btn_ordine_al_gruppo">
                    <h2>Invia Ordine al Gruppo</h2>
                </button>
                <div>
                    <h3 style="color: lightgray;">I piatti selezionati verranno inseriti nell'Ordine #3</h3>
                </div>
            </div><!-- end = left_tab_body -->
            <div class="right_tab_body">
                {{-- <ul class="right_tab_ul_level_0">
                    ul class="right_tab_ul_level_1" id="order_1">
                    <li>
                        <span>Order #1</span>-<span>(completato)</span>
                    </li>
                </ul>
                <ul class="right_tab_ul_level_1" id="order_2">
                    <li>
                        <span>Order #2</span>-<span>(incompleto)</span>
                    </li>
                </ul> --}}
                <ul class="right_tab_ul_level_1" id="order_3">
                    <li>
                        <span style="color:white;">Order #1</span><!---<span>(in corso)</span>-->
                        <ul class="right_tab_ul_level_2" id="dish_codes_ul">
                            <li>
                                <span class="dish_code">835A</span>-<span class="dish_qantity">5</span>
                                <ul class="right_tab_ul_level_3">
                                    <li>Andrea <span class="user_quantity">1</span></li>
                                    <li>Marco <span class="user_quantity">3</span></li>
                                    <li>Stefano <span class="user_quantity">1</span></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
    </main>
@endsection

</body>
</html>
