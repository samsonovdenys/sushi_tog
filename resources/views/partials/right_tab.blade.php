<!-- <div class="right_tab_body">
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
            <span style="color:white;">Order #1</span>
            <ul class="right_tab_ul_level_2" id="dish_codes_ul">

                <li><div class="dish_li"><span class="dish_code">A1</span>-<span class="dish_quantity">7</span></div>
                    <ul class="right_tab_ul_level_3">
                        <li>User1 - <span class="user_quantity">6 pezzi </span></li>
                        <li>User2 - <span class="user_quantity">1 pezzi </span></li>
                    </ul>
                </li>

                <li><div class="dish_li"><span class="dish_code">A2</span>-<span class="dish_quantity">3</span></div>
                    <ul class="right_tab_ul_level_3">
                        <li>User1 - <span class="user_quantity">3 pezzi </span></li>
                    </ul>
                </li>

                <li><div class="dish_li"><span class="dish_code">A3</span>-<span class="dish_quantity">2</span></div>
                    <ul class="right_tab_ul_level_3">
                        <li>User1 - <span class="user_quantity">1 pezzi </span></li>
                        <li>User2 - <span class="user_quantity">1 pezzi </span></li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
    </ul>
</div> -->
<div class="tab-pane fade" id="group-order" role="tabpanel" aria-labelledby="group-order-tab">
    <!-- Contenuto per 'Ordine del gruppo' -->
    <!-- Accordion Section -->
    <div class="accordion mt-5 shadow" id="accordionExample">
        <!-- Primo elemento dell'Accordion -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Ordine in corso
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <a class="text-decoration-none" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <div><i class="fa-solid fa-utensils"></i> A285</div>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body border-0 p-1">
                            <ul class="list-group shadow-sm">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>Denys</div>
                                    <div>
                                        <span class="badge bg-primary rounded-pill">14</span>
                                        <!-- Icona per attivare il popup (modal) -->
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>Daniele</div>
                                    <div>
                                        <span class="badge bg-primary rounded-pill">14</span>
                                        <!-- Icona per attivare il popup (modal) -->
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondo elemento dell'Accordion -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Ordine precedente
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    567B
                </div>
            </div>
        </div>
    </div>

</div>