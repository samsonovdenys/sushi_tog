$(document).ready(function() {
    let order_list = {};
    let group_list = {};

    let userId = $('#user_id').attr('data-user_id');
    let groupId = $('#group_id').attr('data-group_id');

    let add_plate_button = $("#add_plate_button");
    let create_item_section = $(".create_item_section");
    let create_item_button_confirm = $("#create_item_button_confirm");
    let create_item_button_cancel = $("#create_item_button_cancel");

    let new_group_name = $("#new_group_name");
    let new_user_name = $("#new_name");

    let new_group_button = $("#new_group_button");

    let join_group_id = $("#join_group_id");
    let join_group_button = $("#join_group_button");


    let beginOrder = $("#begin_order_btn");
    let iniziamoBtn = $("#iniziamo_btn");
    let joinGroupBtn = $("#join_group_btn");

    let ul = $("#order_list_items");
    let group_ul = $("#dish_codes_ul");

    let dishCodes = document.querySelectorAll('.dish_li');

    addListenersToUl(dishCodes);


    joinGroupBtn.on("click", function () {
        window.location.href = "http://localhost:8080/user/";
    });

    //
    iniziamoBtn.on("click", function () {
        window.location.href = "http://localhost:8080/group/";
    });

    //
    beginOrder.on("click", function () {
        let newUserName = encodeURIComponent(new_user_name.val());
        window.location.href = "http://localhost:8080/order/" + newUserName;
    });

    //
    join_group_button.on("click", function () {
        let joinGroupId = encodeURIComponent(join_group_id.val());
        window.location.href = "http://localhost:8080/join/" + joinGroupId;
    });

    //
    new_group_button.on("click", function () {
        let newGroupName = encodeURIComponent(new_group_name.val());
        console.log(newGroupName);
        window.location.href = "http://localhost:8080/crete_group/" + newGroupName;
    });

    // When the "Add Plate" button is clicked, show the "create_item" div and hide the button
    add_plate_button.on("click", function () {
        create_item_section.css("display", "block");
        add_plate_button.css("display", "none");
    });

    // When the "Cancel" button is clicked, hide the "create_item" div and show the "Add Plate" button
    create_item_button_cancel.on("click", function () {
        create_item_section.css("display", "none");
        add_plate_button.css("display", "block");
    });

    // When the "Conferma" button is clicked, insert data from the input fields into the list
    create_item_button_confirm.on("click", function () {
        var dish_code = $("#input_code").val();
        var quantity = $("#input_quantity").val();

        if (order_list[dish_code]) {
            order_list[dish_code] = parseInt(order_list[dish_code]) + parseInt(quantity);
        } else {
            order_list[dish_code] = parseInt(quantity);
        }

        $("#input_code").val($("#input_code").prop("defaultValue"));
        $("#input_quantity").val(1);

        let ul = $("#order_list_items");
        ul.empty();
// console.log(order_list[dish_code],quantity);
/////////////////////////////////////////////////////////////
        updateUserUl();

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
        $(".left_tab_body").css("display", "none");
        $(".right_tab_body").css("display", "block");

        $("#tab_right_btn").addClass("underlined");
        $("#tab_left_btn").removeClass("underlined");


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

    async function fetchDataMakeUl(data={}) {
        const csrfToken = $("meta[name='csrf-token']").attr("content");
        let origin = location.origin;

        if (Object.keys(data).length === 0){
            data.group_id = groupId;
        }

        console.log("fetchDataMakeUl : ");
        console.log("_ data : ", data);

        let response = await fetch(origin + '/add_order', {
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
        // $.each(result, function (key, value) {
        //     var li = $("<li><span class='dish_code'>" + key + "</span>-<span class='dish_qantity'>" + value + "</span><ul class='right_tab_ul_level_3'><li>Me <span class='user_quantity'>" + value + "</span></li></ul></li>");
        //     ul.append(li);
        // });
    }

    function makeUl(result){
        group_ul.empty();

        // Itera sull'oggetto restituito
        for (const plateCode in result) {

            const total = result[plateCode].total;
            const details = result[plateCode].details;

            var li = "<li><div class='dish_li'><span class='dish_code'>" + plateCode + "</span>-<span class='dish_quantity'>" + total + "</span></div>";
                li += "<ul class='right_tab_ul_level_3'>";
            for (const user in details) {
                li += "<li>" + user + " - <span class='user_quantity'>" + details[user] + " pezzi </span></li>";
            }
                li += "</ul></li><hr>";

            group_ul.append(li);
        }

        dishCodes = document.querySelectorAll('.dish_li');
        addListenersToUl(dishCodes);
    }

    function addListenersToUl(dishCodes){
        dishCodes.forEach(function(code) {
            code.addEventListener('click', function(event) {
                // Trova il prossimo UL rispetto al genitore LI del codice del piatto cliccato
                const parentLi = event.target.closest('li');
                const nextUl = parentLi.querySelector('.right_tab_ul_level_3');

                if (nextUl.classList.contains('expanded')) {
                    nextUl.classList.remove('expanded');
                    // nextUl.style.maxHeight = '0'; // Inizia l'animazione di chiusura
                } else {
                    // Per aprire, prima imposta max-height a 'none' per calcolare l'altezza
                     //nextUl.style.maxHeight = 'none';
                     //const height = nextUl.offsetHeight + 'px'; // Calcola l'altezza reale
                     //nextUl.style.maxHeight = '0'; // Resetta per permettere l'animazione
                    requestAnimationFrame(() => {
                        nextUl.classList.add('expanded');
                        //nextUl.style.maxHeight = height; // Inizia l'animazione di apertura
                    });
                }
            });
        });
    }




    // Your custom function
    function updateUserUl(key = '', value = '') {

        console.log(key,value);

        if(key != ''){
            order_list[key] = value;
        }

        ul.empty();

        Object.entries(order_list).forEach(function(item) {

            console.log('(order_list).forEach : ');
            let li = $("<li><span>" + item[0] + "</span> <span><button data-key=\"" + item[0] + "\" data-value=\"" + item[1] + "\" class=\"btn_minus_li btn_round bg_red\">-</button>" +
            item[1] + "<button data-key=\"" + item[0] + "\" data-value=\"" + item[1] + "\"  class=\"btn_plus_li btn_round bg_yellow\">+</button></span></li>");

            ul.prepend(li);
            // console.log(li, item);

            // Add click event listener to the minus button
            li.find('.btn_minus_li').click(function(e) {
                console.log('btn minus was clicked');

                let min_li_key = e.target.getAttribute('data-key');
                let min_li_value = e.target.getAttribute('data-value');

                updateUserUl(min_li_key, min_li_value-1); // Call your custom function with the key and an action
            });


            // Add click event listener to the plus button
            li.find('.btn_plus_li').click(function(e) {
                console.log('btn plus was clicked');

                let plus_li_key = e.target.getAttribute('data-key');
                let plus_li_value = e.target.getAttribute('data-value');

                updateUserUl(plus_li_key, +plus_li_value+1); // Call your custom function with the key and an action
            });

        });




    }

});


