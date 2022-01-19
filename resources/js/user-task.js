const completeUserTask = (el, id) => {
    axios.post(`/user-tasks/${id}/complete`)
        .then(() => {
            let msg = document.createElement("span");
            msg.innerHTML = "Sent";
            el.parentNode.replaceChild(msg, el);
        })
        .catch(() => {
            let msg = document.createElement("span");
            msg.innerHTML = "Error";
            el.parentNode.replaceChild(msg, el);
        })
}

document.addEventListener("DOMContentLoaded", () => {
    let nodes = document.querySelectorAll('[data-task-resolve]');
    nodes.forEach((el) => {
        el.addEventListener('click', function (event) {
            el.disabled = true
            let id = el.getAttribute('data-task-id')
            completeUserTask(el, id)
            console.log(id)
        }, false);
    });
});
