<!-- LEFT-TAB CONTENT -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
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
        <ul id="order_list_items" class="list-group mt-5 shadow"><li class="list-group-item d-flex justify-content-between align-items-center">
        </ul>
    </div>
    <!-- Contenuto per 'Il mio ordine' -->

    <!-- Button at the bottom right of the body -->
    <button class="btn btn-primary position-fixed" data-bs-toggle="modal" data-bs-target="#exampleModal" data-mode="add" style="bottom: 150px; right: 20px;"><i class="fa-solid fa-plus fa-2x"></i></button>
</div>

