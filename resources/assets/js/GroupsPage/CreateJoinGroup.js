let new_group_name = $("#new_group_name");
let new_group_button = $("#new_group_button");
let join_group_id = $("#join_group_id");
let join_group_button = $("#join_group_button");

//
new_group_button.on("click", function () {
    let newGroupName = encodeURIComponent(new_group_name.val());
    console.log(newGroupName);
    window.location.href = "http://localhost:8080/crete_group/" + newGroupName;
});

//
join_group_button.on("click", function () {
    let joinGroupId = encodeURIComponent(join_group_id.val());
    window.location.href = "http://localhost:8080/join/" + joinGroupId;
});
