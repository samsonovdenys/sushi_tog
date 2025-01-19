<!-- <div class="left_tab_body">
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

            
            <div class="create_item_buttons">
                <button id="create_item_button_cancel" class="button_component bg_red divided">Chiudi</button>
                <button id="create_item_button_confirm" class="button_component bg_green divided">Conferma</button>
            </div>
        </div>


        
        <button id="add_plate_button" class="button_component color_green">Aggiungi un piatto</button>
        
        <ul id="order_list_items"></ul>
    </div>

    <button id="btn_ordine_al_gruppo" class="button_component bg_yellow">Invia Ordine al Gruppo</button>
    <p class="text_component">I piatti selezionati verranno inseriti nell'Ordine #1</p>

</div> -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-mode="add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content  m-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleziona la quantità</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Nome del piatto e contatore -->
                <div class="d-flex justify-content-between align-items-center">
                    <!-- <span class="dish-name">Sushi Roll</span> -->
                    <span><input id="input_code" type="text" class="form-control" placeholder="codice piatto" value="A001"></span>
                    <!-- Contatore -->
                    <div class="quantity-counter d-flex align-items-center ps-3">
                        <button class="btn btn-outline-secondary w-28" id="btn_minus"><i class="fa-solid fa-minus"></i></button>
                        <!-- <span class="mx-3" id="input_quantity">1</span> -->
                        <span><input id="input_quantity" type="number" class="input_component create_item_input text-center m-3" placeholder="1" min="1" max="100" value="1"></span>
                        <button class="btn btn-outline-secondary w-28" id="btn_plus"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="create_item_button_cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                <button id="create_item_button_confirm" type="button" class="btn btn-primary">Salva</button>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade show active" id="my-order" role="tabpanel" aria-labelledby="my-order-tab">
    <div>
        <ul id="order_list_items" class="list-group mt-5 shadow">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div><i class="fa-solid fa-utensils"></i> A285</div>
                <div>
                    <span class="badge bg-primary rounded-pill">14</span>
                    <!-- Icona per attivare il popup (modal) -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                A list item
                <div>
                    <span class="badge bg-primary rounded-pill">11</span>
                    <!-- Icona per attivare il popup (modal) -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                A list item
                <div>
                    <span class="badge bg-primary rounded-pill">7</span>
                    <!-- Icona per attivare il popup (modal) -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                A list item
                <div>
                    <span class="badge bg-primary rounded-pill">999</span>
                    <!-- Icona per attivare il popup (modal) -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                </div>
            </li>
        </ul>
    </div>
    <!-- Contenuto per 'Il mio ordine' -->

    <!-- Button at the bottom right of the body -->
    <button class="btn btn-primary position-fixed" data-bs-toggle="modal" data-bs-target="#exampleModal" style="bottom: 150px; right: 20px;"><i class="fa-solid fa-plus fa-2x"></i></button>
</div>

@section('footer_btns')
<button id="begin_order_btn" type="button" class="btn btn-warning btn-lg w-100 mb-2">Invia Ordine al Gruppo</button>
<button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
@endsection