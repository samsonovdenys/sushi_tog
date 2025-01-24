$(document).ready(function () {
    require('./WelcomePage/Welcome');
    require('./GroupsPage/CreateJoinGroup');
    require('./GroupsPage/OverviewPage');
    require('./NicknamePage/Nickname');

    let order_list = {};
    let userId = $("#user_id").attr("data-user_id");
    let groupId = $("#group_id").attr("data-group_id");

    let add_plate_button = $("#add_plate_button");
    let create_item_section = $(".create_item_section");

    let ul = $("#order_list_items");
    let group_ul = $("#dish_codes_ul");

    let dishCodes = document.querySelectorAll(".dish_li");

    const modal = document.getElementById("exampleModal");

    addListenersToUl(dishCodes);


    // When the "Add Plate" button is clicked, show the "create_item" div and hide the button
    add_plate_button.on("click", function () {
        create_item_section.css("display", "block");
        add_plate_button.css("display", "none");
    });


    
    // When the "Cancel" button is clicked, hide the "create_item" div and show the "Add Plate" button
    $("#create_item_button_cancel").on("click", function () {
        create_item_section.css("display", "none");
        add_plate_button.css("display", "block");
    });

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



    // When the "Your Order" button is clicked, show the "left_tab_body" and hide the "right_tab_body"
    $("#tab_left_btn").on("click", function () {
        $(".left_tab_body").css("display", "flex");
        $(".right_tab_body").css("display", "none");

        $("#tab_left_btn").addClass("underlined");
        $("#tab_right_btn").removeClass("underlined");
    });

    // When the "Group Order" tab button is clicked, call the updateGruppo function and toggle tab styles
    $("#tab_right_btn").on("click", function () {
        $(".left_tab_body").css("display", "none");
        $(".right_tab_body").css("display", "block");

        $("#tab_right_btn").addClass("underlined");
        $("#tab_left_btn").removeClass("underlined");
    });



    // When the "Send Order to Group" button is clicked, call the updateGruppo function, update the UI, and upload data
    $("#btn_ordine_al_gruppo").on("click", function () {
        console.log("Sending Order to Group ...");
        // $(".left_tab_body").css("display", "none");
        // $(".right_tab_body").css("display", "block");

        // $("#tab_right_btn").addClass("underlined");
        // $("#tab_left_btn").removeClass("underlined");

        const data = {};
        data.order = order_list;
        data.user_id = userId;
        data.group_id = groupId;

        // console.log(data, data.user_id, data.group_id, data.order);
        const result = fetchDataMakeUl(data);
        order_list = {};
        ul.empty();
        create_item_section.css("display", "none");
        add_plate_button.css("display", "block");
    });



    async function fetchDataMakeUl(data = {}) {
        const csrfToken = $("meta[name='csrf-token']").attr("content");
        let origin = location.origin;

        if (Object.keys(data).length === 0) {
            data.group_id = groupId;
        }

        console.log("fetchDataMakeUl : ");
        console.log("_ data : ", data);

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

        makeUl(result);
    }

    function makeUl(result) {
        group_ul.empty();

        // Itera sull'oggetto restituito
        for (const plateCode in result) {
            console.log(result);
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
                            <i class="fa-solid fa-ellipsis-vertical"></i>
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
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                            </div>
                        </li>`;
            }

            li += `</ul></div></div>`;

            // var li = `<a class="text-decoration-none dish_li" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            //             <div><i class="fa-solid fa-utensils"></i>${plateCode}</div><span class='dish_quantity'>${total}</span>
            //         </a>
            //         <div class="collapse" id="collapseExample">
            //             <div class="card card-body border-0 p-1">
            //                 <ul id="dish_codes_ul" class="list-group shadow-sm">`;
            // for (const user in details) {
            //     li += `<li class="list-group-item d-flex justify-content-between align-items-center">
            //                         <div>${user}</div>
            //                         <div>
            //                             <span class="badge bg-primary rounded-pill">${details[user]}</span>
            //                             <!-- Icona per attivare il popup (modal) -->
            //                             <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
            //                                 <i class="fa-solid fa-ellipsis-vertical"></i>
            //                             </button>
            //                         </div>
            //                     </li>`;
            // }

            // li += `</ul></div></div>`;

            console.log("li: ");
            // console.log(li);

            // var li = "<li><div class='dish_li'><span class='dish_code'>" + plateCode + "</span>-<span class='dish_quantity'>" + total + "</span></div>";
            //     li += "<ul class='right_tab_ul_level_3'>";

            // for (const user in details) {
            //     li += "<li>" + user + " - <span class='user_quantity'>" + details[user] + " pezzi </span></li>";
            // }
            //     li += "</ul></li><hr>";

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
