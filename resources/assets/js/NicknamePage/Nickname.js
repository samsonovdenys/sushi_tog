let new_user_name = $("#new_name");


    let beginOrder = $("#begin_order_btn");

//
beginOrder.on("click", function () {
    let newUserName = encodeURIComponent(new_user_name.val());
    window.location.href = "http://localhost:8080/order/" + newUserName;
});