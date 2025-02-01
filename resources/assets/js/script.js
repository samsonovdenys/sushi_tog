$(document).ready(function () {
    require("./WelcomePage/Welcome");
    require("./GroupsPage/CreateJoinGroup");
    require("./GroupsPage/OverviewPage");
    require("./NicknamePage/Nickname");
    const Loading = require("./Utils/Loading").default; // Accedi all'export di default

    
    

    let ul = $("#order_list_items");
    let group_ul = $("#dish_codes_ul");

    let dishCodes = document.querySelectorAll(".dish_li");

    const modal = document.getElementById("exampleModal");

    addListenersToUl(dishCodes);

    // Ul del Ordine del gruppo
    let userId = $("#user_id").attr("data-user_id");
    let groupId = $("#group_id").attr("data-group_id");
    let orderNumber = 1;

    let order_list = {};
    let data = {};

    // data.user_id = userId;
    // data.group_id = groupId;
    

    // When the "Conferma" button is clicked, insert data from the input fields into the list
    $("#create_item_button_confirm").on("click", function () {
        const mode = modal.getAttribute("data-mode");
        var dish_code = $("#input_code").val();
        var quantity = $("#input_quantity").val();
        console.log(mode + " 80");
        if (mode === "edit") {
            // Modifica la quantità di un piatto esistente
            if (order_list[dish_code]) {
                order_list[dish_code] = parseInt(quantity);

                // Aggiorna la lista visibile
                updateUserUl();
            }
        } else {
            // Aggiungi un nuovo piatto
            if (order_list[dish_code]) {
                order_list[dish_code] += parseInt(quantity);
            } else {
                order_list[dish_code] = parseInt(quantity);
            }

            // Aggiorna la lista visibile
            updateUserUl();
        }

        // Resetta i campi della modale
        modal.querySelector("#input_code").value = "";
        modal.querySelector("#input_quantity").value = 1;

        // Chiudi la modale
        const bootstrapModal = bootstrap.Modal.getInstance(modal);
        bootstrapModal.hide();
    });

    // When the "-" button is clicked, decrease the input value
    $("#btn_minus").on("click", function () {
        var quantity = $("#input_quantity").val();
        if (quantity > 1) {
            quantity--;
            $("#input_quantity").val(quantity);
        }
    });

    // When the "+" button is clicked, increase the input value
    $("#btn_plus").on("click", function () {
        var quantity = $("#input_quantity").val();
        if (quantity < 100) {
            quantity++;
            $("#input_quantity").val(quantity);
        }
    });

    // Seleziona il contenitore dei tab
    let tabs = document.querySelectorAll('button[data-bs-toggle="tab"]');
    tabs.forEach((tab) => {
        tab.addEventListener("shown.bs.tab", function (event) {
            let activeTabId = event.target.id; // ID del tab attivo

            if (activeTabId === "group-order-tab") {

                fetchDataMakeUl();

                document.getElementById("footer_btns").innerHTML = `
                    <button id="close_order_btn" type="button" class="btn btn-warning btn-lg w-100 mb-2">Chiudi ordine</button>
                    <button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
                `;
                $("#close_order_btn").on("click", function () {
                    $("#dish_codes_ul")
                        .children()
                        .appendTo("#dish_privious_codes_ul"); // Sposta gli elementi
                    $("#dish_codes_ul").empty(); // Svuota l'elemento originale

                    order_list = {};
                    data = {};
                    orderNumber++;
                    console.log("Coppiato la tabella con successo !");
                    console.log(orderNumber);
                });
            } else {
                document.getElementById("footer_btns").innerHTML = `
                    <button id="btn_ordine_al_gruppo" type="button" class="btn btn-warning btn-lg w-100 mb-2">Invia Ordine al Gruppo</button>
                    <button type="button" class="btn btn-secondary btn-lg w-100 mb-2">Indietro</button>
                `;
            }
        });
    });

    
    // When the "Invia Ordine al Gruppo" button is clicked, call the updateGruppo function, update the UI, and upload data
    // Delegation per evitare la perdita dell'evento dopo il cambio tab
    $(document).on("click", "#btn_ordine_al_gruppo", function () {
        console.log("Sending Order to Group ...");

        const data = {};
        data.order = order_list;

        // Esegui la funzione di elaborazione dati
        const result = fetchDataMakeUl(data);
        order_list = {};
        ul.empty();

        // Cambia tab a "Ordine al Gruppo"
        $("#group-order-tab").tab("show");
    });




    async function fetchDataMakeUl(data = {}) {
        const csrfToken = $("meta[name='csrf-token']").attr("content");
        let origin = location.origin;

        // if (Object.keys(data).length === 0) {
        //     data.group_id = groupId;
        // }
        // data.user_id = userId;
        // data.group_id = groupId;
        data.order_number = orderNumber;

        console.log("fetchDataMakeUl : ");
        console.log("_ data : ", data);

        Loading.on();
        let response = await fetch(origin + "/add_order", {
            method: "POST",
            credentials: "same-origin",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();

        if (result) {
            Loading.off();
        }
        makeUl(result);
    }

    function makeUl(result) {
        group_ul.empty();

        // Itera sull'oggetto restituito
        for (const plateCode in result) {
            // console.log(result);
            const total = result[plateCode].total;
            const details = result[plateCode].details;

            var li = `<a class="text-decoration-none m-3" data-bs-toggle="collapse" href="#${plateCode}" role="button" aria-expanded="false" aria-controls="${plateCode}">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa-solid fa-utensils"></i>
                        ${plateCode}
                    </div>
                    <div>
                        <span class="badge bg-primary rounded-pill">${total}</span>
                        <!-- Icona per attivare il popup (modal) -->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#${plateCode}">
                            <!-- <i class="fa-solid fa-ellipsis-vertical"></i> -->
                        </button>
                    </div>
                </div>
            </a>
            <div class="collapse" id="${plateCode}">
                <div class="card card-body border-0 p-1">
                    <ul class="list-group shadow-sm">`;

            for (const user in details) {
                li += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>${user}</div>
                            <div>
                                <span class="badge bg-primary rounded-pill">${details[user]}</span>
                                <!-- Icona per attivare il popup (modal) -->
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#${plateCode}">
                                    <!-- <i class="fa-solid fa-ellipsis-vertical"></i> -->
                                </button>
                            </div>
                        </li>`;
            }

            li += `</ul></div></div>`;

            group_ul.append(li);
        }

        dishCodes = document.querySelectorAll(".dish_li");
        addListenersToUl(dishCodes);
    }

    function addListenersToUl(dishCodes) {
        dishCodes.forEach(function (code) {
            code.addEventListener("click", function (event) {
                // Trova il prossimo UL rispetto al genitore LI del codice del piatto cliccato
                const parentLi = event.target.closest("li");
                const nextUl = parentLi.querySelector(".right_tab_ul_level_3");

                if (nextUl.classList.contains("expanded")) {
                    nextUl.classList.remove("expanded");
                    // nextUl.style.maxHeight = '0'; // Inizia l'animazione di chiusura
                } else {
                    // Per aprire, prima imposta max-height a 'none' per calcolare l'altezza
                    //nextUl.style.maxHeight = 'none';
                    //const height = nextUl.offsetHeight + 'px'; // Calcola l'altezza reale
                    //nextUl.style.maxHeight = '0'; // Resetta per permettere l'animazione
                    requestAnimationFrame(() => {
                        nextUl.classList.add("expanded");
                        //nextUl.style.maxHeight = height; // Inizia l'animazione di apertura
                    });
                }
            });
        });
    }

    function updateUserUl(key = "", value = "") {
        console.log(key, value);

        if (key != "") {
            order_list[key] = value;
        }

        ul.empty();

        Object.entries(order_list).forEach(function (item) {
            console.log("(order_list).forEach : ");
            let li = $(`
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    ${item[0]}
                    <div>
                        <span class="badge bg-primary rounded-pill">${item[1]}</span>
                        <!-- Icona per attivare il popup (modal) -->
                        <button
                            type="button"
                            class="btn"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal"
                            data-code="${item[0]}" 
                            data-quantity="${item[1]}"
                            data-mode="edit">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                    </div>
                </li>
            `);

            ul.prepend(li);
            // console.log("01yo");
            // console.log(li);
            // console.log(item);
            // console.log(order_list);
            // console.log(ul);

            // Add click event listener to the minus button
            li.find(".btn_minus_li").click(function (e) {
                console.log("btn minus was clicked");

                let min_li_key = e.target.getAttribute("data-key");
                let min_li_value = e.target.getAttribute("data-value");

                updateUserUl(min_li_key, min_li_value - 1); // Call your custom function with the key and an action
            });

            // Add click event listener to the plus button
            li.find(".btn_plus_li").click(function (e) {
                console.log("btn plus was clicked");

                let plus_li_key = e.target.getAttribute("data-key");
                let plus_li_value = e.target.getAttribute("data-value");

                updateUserUl(plus_li_key, +plus_li_value + 1); // Call your custom function with the key and an action
            });
        });
    }
    // Evento di apertura della modale
    if (modal) {
        modal.addEventListener("show.bs.modal", function (event) {
            // Ottieni il pulsante che ha attivato la modale
            const button = event.relatedTarget;

            // Estrai i dati dal pulsante
            const mode = button.getAttribute("data-mode"); // add/edit
            const code = button.getAttribute("data-code");
            const quantity = button.getAttribute("data-quantity");

            // Popola i campi della modale con i dati
            const inputCode = modal.querySelector("#input_code");
            const inputQuantity = modal.querySelector("#input_quantity");
            console.log(mode + " 371");
            if (mode === "edit") {
                // Modifica quantità esistente
                // const code = button.getAttribute('data-code');
                // const quantity = button.getAttribute('data-quantity');

                inputCode.value = code;
                inputQuantity.value = quantity;

                // Rendi il campo codice non modificabile
                inputCode.setAttribute("readonly", true);
                modal.setAttribute("data-mode", "edit");
            } else {
                // Rendi il campo codice modificabile
                inputCode.removeAttribute("readonly");
                modal.setAttribute("data-mode", "add");
            }

            // Imposta il contesto della modale
            // modal.setAttribute('data-mode', mode);
        });
    }
});
