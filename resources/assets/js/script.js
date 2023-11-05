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
    let new_group_button = $("#new_group_button");
    let new_name = $("#new_name");
    let btn_start_order = $("#btn_start_order");
    let ul = $("#dish_codes_ul");


    //
    btn_start_order.on("click", function () {
        let join_link = $("#join_link").text();

        window.location.href = join_link;
    });

    //
    new_group_button.on("click", function () {

        var newGroupName = new_group_name.val();
        var newName = new_name.val();
        window.location.href = "http://localhost:8080/group_details/"+newGroupName+"/"+newName;

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

        $.each(order_list, function (key, value) {
            var li = $("<li><span>" + key + "</span> <span>" + value + "</span></li>");
            ul.prepend(li);
        });

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
        fetchDataMakeUl();
        $(".left_tab_body").css("display", "none");
        $(".right_tab_body").css("display", "block");

        $("#tab_right_btn").addClass("underlined");
        $("#tab_left_btn").removeClass("underlined");
    });

    // When the "Send Order to Group" button is clicked, call the updateGruppo function, update the UI, and upload data
    $("#btn_ordine_al_gruppo").on("click", function () {

        console.log("Send Order to Group ...");
        $(".left_tab_body").css("display", "none");
        $(".right_tab_body").css("display", "block");

        $("#tab_right_btn").addClass("underlined");
        $("#tab_left_btn").removeClass("underlined");


        const data = {};
        data.order = order_list;
        data.user_id = userId;
        data.group_id = groupId;

        console.log(data, data.user_id, data.group_id, data.order);
        const result = fetchDataMakeUl(data);

    });

    async function fetchDataMakeUl(data={}) {
        const csrfToken = $("meta[name='csrf-token']").attr("content");
        let origin = location.origin;

        if (Object.keys(data).length === 0){
            data.group_id = groupId;
        }

        console.log("fetchDataMakeUl : ");
        console.log("data : ", data);

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
        ul.empty();

        result.forEach(function(item) {
            var li = $("<li><span class='dish_code'>" + item.plate_code + "</span>-<span class='dish_quantity'>" + item.total_quantity + "</span><ul class='right_tab_ul_level_3'><li>Me <span class='user_quantity'>" + item.total_quantity + "</span></li></ul></li>");
            ul.append(li);
        });
    }

});


