document.addEventListener("DOMContentLoaded", function () {
    let order_list = {};
    let group_list = {};
    let create_item_button = document.querySelector(".create_item_button");
    let create_item_button_cancel = document.querySelector(
        ".create_item_button_cancel"
    );
    let left_tab_body_create_item = document.querySelector(
        ".left_tab_body_create_item"
    );
    let create_item_button_confirm = document.querySelector(
        ".create_item_button_confirm"
    );

    // Quando il pulsante `Crea nuovo elemento` viene premuto, fai apparire il div `create_item`
    create_item_button.addEventListener("click", function () {
        left_tab_body_create_item.style.display = "block";
        create_item_button.disabled = true;
    });

    // Quando il pulsante `Annulla` viene premuto, fai sparire il div `create_item`
    create_item_button_cancel.addEventListener("click", function () {
        left_tab_body_create_item.style.display = "none";
        create_item_button.disabled = false;
    });

    // Quando il pulsante `Conferma` viene premuto, inserisce in lista i dati dai input
    create_item_button_confirm.addEventListener("click", function () {
        var dish_code = document.querySelector("#input_code").value;
        // console.log(dish_code);
        var quantity = document.querySelector("#input_quantity").value;
        // console.log(quantity);

        console.log("-----------------------------------------");

        if (order_list[dish_code]) {
            order_list[dish_code] = order_list[dish_code] + +quantity;

            let qty = order_list[dish_code];
            delete order_list[dish_code];
            order_list[dish_code] = qty;
        } else {
            order_list[dish_code] = +quantity;
        }

        console.log("-----------------------------------------");

        document.querySelector("#input_code").value =
            document.querySelector("#input_code").defaultValue;
        document.querySelector("#input_quantity").value = 1;

        let ul = document.querySelector("#order_list_items");

        // Remove all list items
        while (ul.firstChild) {
            ul.removeChild(ul.firstChild);
        }

        Object.entries(order_list).forEach((entry) => {
            const [key, value] = entry;

            // console.log("Object.entries(order_list).forEach");
            // console.log(key, value);

            // Crea un nuovo elemento nella lista ul
            var li = document.createElement("li");
            li.innerHTML =
                "<span>" + key + "</span>" + " " + "<span>" + value + "</span>";
            // Aggiungi l'elemento alla lista ul
            document.querySelector(".order_list").prepend(li);
        });
        // console.log("console.log(order_list)");
        // console.log(order_list);

        // Fai sparire il div `left_tab_body_create_item`
        // document.querySelector(".left_tab_body_create_item").style.display = "none";
    });

    // Quando il pulsante `-` viene premuto, diminuisci il valore dell'input
    document
        .querySelector(".create_item_quantity_minus")
        .addEventListener("click", function () {
            var quantity = document.querySelector("#input_quantity").value;
            if (quantity > 1) {
                quantity--;
            }
            document.querySelector("#input_quantity").value = quantity;
        });

    // Quando il pulsante `+` viene premuto, incrementa il valore dell'input
    document
        .querySelector(".create_item_quantity_plus")
        .addEventListener("click", function () {
            var quantity = document.querySelector("#input_quantity").value;
            if (quantity < 100) {
                quantity++;
            }
            document.querySelector("#input_quantity").value = quantity;
        });

    // Quando il pulsante `Il tuo ordine` viene premuto, fai apparire il div `left_tab_body`
    document.querySelector("#tab_left").addEventListener("click", function () {
        document.querySelector(".left_tab_body").style.display = "block";
        document.querySelector(".right_tab_body").style.display = "none";

        document.querySelector("#tab_left").classList.add("underlined");
        document.querySelector("#tab_right").classList.remove("underlined");
    });

    // Quando il pulsante `Ordine del gruppo` viene premuto, fai apparire il div `right_tab_body`
    document.querySelector("#tab_right").addEventListener("click", function () {
        updateGruppo(order_list);
        document.querySelector(".left_tab_body").style.display = "none";
        document.querySelector(".right_tab_body").style.display = "block";

        document.querySelector("#tab_right").classList.add("underlined");
        document.querySelector("#tab_left").classList.remove("underlined");
    });

    // Quando il pulsante `Invia Ordine al Gruppo` viene premuto, fai apparire il div `right_tab_body`
    document
        .querySelector("#btn_ordine_al_gruppo")
        .addEventListener("click", function () {
            updateGruppo(order_list);
            document.querySelector(".left_tab_body").style.display = "none";
            document.querySelector(".right_tab_body").style.display = "block";

            document.querySelector("#tab_right").classList.add("underlined");
            document.querySelector("#tab_left").classList.remove("underlined");

            var ul = document.getElementById("dish_codes_ul");

            // Remove all list items
            while (ul.firstChild) {
                ul.removeChild(ul.firstChild);
            }



            // console.log("-----------------------------------------");

            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

            let origin = location.origin;

            // Create the fetch request
            fetch(origin+'/manage_order', {
                method: "POST",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json", // Specify the content type as JSON
                    "X-CSRF-TOKEN": csrfToken, // Replace csrfToken with the actual CSRF token value
                  },
                body: JSON.stringify(order_list), // Convert the object to a JSON string
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(
                            `HTTP Error! Status: ${response.status}`
                        );
                    }
                    return response.json(); // Parse the response body as JSON
                })
                .then((data) => {
                    // Handle the response data here
                    console.log("Response Data:", data);
                })
                .catch((error) => {
                    // Handle any errors that occurred during the fetch
                    console.error("Error:", error);
                });



            console.log("-----------------------------------------");


            for (const [key, value] of Object.entries(order_list)) {
                console.log(key, value);

                // Crea un nuovo elemento nella lista ul
                var li = document.createElement("li");
                li.innerHTML =
                    '<span class="dish_code">' +
                    key +
                    '</span>-<span class="dish_qantity">' +
                    value +
                    '</span><ul class="right_tab_ul_level_3"><li>Me <span class="user_quantity">' +
                    value +
                    "</span></li></ul>";
                // Aggiungi l'elemento alla lista ul
                document.querySelector("#dish_codes_ul").append(li);
            }
        });

    function updateGruppo(order_list) {
        // console.log (order_list);
        // Loop through the NodeList object.
        for (let i = 0; i <= order_list.length - 1; i++) {
            // console.log (order_list);
        }
    }

    function updateUlGruppo() {
        const ul = document.getElementsByClassName("order_list");
        console.log(ul);
        const listItems = ul.getElementsByTagName("li");

        // Loop through the NodeList object.
        for (let i = 0; i <= listItems.length - 1; i++) {
            console.log(listItems[i]);
        }
    }
});
