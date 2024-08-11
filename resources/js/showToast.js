function showToast(type = "success", message, duration = 3000) {
    // type: success, error, warning, info
    let bgColor = "";
    if (type == "success") {
        bgColor = "linear-gradient(to right, #00b09b, #96c93d)";
    } else if (type == "error") {
        bgColor = "linear-gradient(to right, #ff416c, #ff4b2b)";
    } else if (type == "warning") {
        bgColor = "linear-gradient(to right, #f09819, #edde5d)";
    } else if (type == "info") {
        bgColor = "linear-gradient(to right, #6e45e2, #88d3ce)";
    }

    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: bgColor,
    }).showToast();
}

export default showToast;
