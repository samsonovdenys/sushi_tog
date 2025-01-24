let joinGroupBtn = $("#join_group_btn");
let join_link = $("#join_link");
let qrCodeContainer = $("#qr-code");

joinGroupBtn.on("click", function () {
    window.location.href = "http://localhost:8080/user/";
});

// QR-code
if (join_link.text()) {
    qrCodeContainer.html("");

    // Validate input
    if (!join_link) {
        alert("Please enter a valid link!");
    }

    // Generate QR code URL
    const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(
        join_link
    )}&size=200x200`;

    // Display QR code
    const qrCodeImg = document.createElement("img");
    qrCodeImg.src = qrCodeUrl;
    qrCodeContainer.append(qrCodeImg);
}
