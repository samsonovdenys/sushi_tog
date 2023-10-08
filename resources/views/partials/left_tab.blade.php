<div class="left_tab_body">
    <div style="flex: 1;">
        <div class="create_item_section">
            <div class="create_item_inputs_section">

                <div class="divided">
                    <h2>Codice Piatto</h2>
                    <input style="margin: 0px auto; width: 90px;" id="input_code" type="text" class="input_component create_item_input" placeholder="codice piatto" value="A001">
                </div>

                <div class="divided">
                    <h2>Quantità</h2>
                    <div class="plus_input_minus">
                        <button id="btn_minus" class="btn_round bg_red" >-</button>
                        <input id="input_quantity" type="number" class="input_component create_item_input" placeholder="1" min="1" max="100" value="1">
                        <button id="btn_plus" class="btn_round bg_green">+</button>
                    </div>
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
