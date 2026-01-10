document.addEventListener("click", function (e) {
  if (e.target.classList.contains("qty-btn")) {
    const id = e.target.dataset.id;
    const input = document.querySelector(`#qty-${id}`);
    let qty = parseInt(input.value);

    if (e.target.dataset.type === "inc") qty++;
    else if (qty > 1) qty--;

    sendCart("update", id, qty);
  }

  if (e.target.classList.contains("remove-btn")) {
    sendCart("remove", e.target.dataset.id);
  }
});

function sendCart(action, id, qty = null) {
  const fd = new FormData();
  fd.append("action", action);
  fd.append("product_id", id);
  if (qty !== null) fd.append("quantity", qty);

  fetch("include/cart/cart.ajax.php", {
    method: "POST",
    body: fd,
  })
    .then((res) => res.json())
    .then(() => location.reload());
}
