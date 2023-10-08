@extends('layouts.app')

@section('content')

    <div class="content">

        <div class="main_tabs" style="display: flex;">
            <button id="tab_left_btn" class="divided underlined">
                <h3>Il tuo ordine (8)</h3>
            </button>
            <button id="tab_right_btn"class="divided">
                <h3>Ordine del gruppo (49)</h3>
            </button>
        </div>
        <!---------------------------------------------->

        <div class="tabs_body">

            <div class="left_tab_body">
                <div style="flex: 1;">
                    <div class="create_item_section">
                        <div class="create_item_inputs">

                            <div class="divided">
                                <h2>Codice Piatto</h2>
                                <input id="input_code" type="text" class="create_item_input" placeholder="codice piatto" value="A001">
                            </div>

                            <div class="divided">
                                <h2>Quantità</h2>
                                <button id="btn_minus" class="btn_round bg_red" >-</button>
                                <input id="input_quantity" type="number" class="create_item_input" placeholder="1" min="1" max="100" value="1">
                                <button id="btn_plus" class="btn_round bg_green">+</button>
                            </div>

                        </div>

                        <!-- Annulla e Conferma buttons -->
                        <div class="create_item_buttons">
                            <button id="create_item_button_cancel" class="button_component bg_red divided">Chiudi</button>
                            <button id="create_item_button_confirm" class="button_component bg_green divided">Conferma</button>
                        </div>
                    </div>


                    <!-- Button Aggiungi nuovo piatto -->
                    <button id="add_plate_button" class="button_component color_green">Aggiungi un piatto</button>
                    <!-- ul Dishes codes from js -->
                    <ul id="order_list_items"></ul>
                </div>

                <button id="btn_ordine_al_gruppo" class="button_component bg_yellow">Invia Ordine al Gruppo</button>
                <p class="text_component">I piatti selezionati verranno inseriti nell'Ordine #1</p>

            </div>


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
    </div>
@endsection
