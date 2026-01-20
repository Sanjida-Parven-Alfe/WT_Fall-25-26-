function deleteMessageAjax(id) {
  if (confirm("Are you sure you want to delete this message?")) {
    fetch(`../php/delete_message_ajax.php?id=${id}`)
      .then((res) => {
        if (!res.ok) throw new Error("Network response was not ok");
        return res.json();
      })
      .then((data) => {
        if (data.status === "success") {
          const row = document.getElementById(`message-row-${id}`);
          if (row) {
            row.style.transition = "0.5s";
            row.style.opacity = "0";
            setTimeout(() => {
              row.remove();
              const tbody = document.querySelector("tbody");
              if (tbody.children.length === 0) {
                location.reload();
              }
            }, 500);
          }
        } else {
          alert("Error: " + data.message);
        }
      })
      .catch((err) => {
        console.error("Error:", err);
        alert("Failed to delete message. Check console for details.");
      });
  }
}
