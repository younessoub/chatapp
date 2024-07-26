const sendMessageForm = document.querySelector("#sendMessageForm");
const messageInput = document.querySelector("#message-input");

sendMessageForm.addEventListener("submit", async (e) => {
  e.preventDefault();
  messageInput.focus();
  const formData = new FormData();
  formData.append("message", messageInput.value);
  const response = await fetch(window.location.href + "&action=add-message", {
    body: formData,
    method: "POST",
  });

  const text = await response.text();
  updateMessagesArea(text);
  messageInput.value = "";
});

setInterval(async function () {
  //checking for incoming messages
  try {
    url = window.location.href;
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(`Response status: ${response.status}`);
    }
    const text = await response.text();
    updateMessagesArea(text);
  } catch (error) {
    console.error(error.message);
  }
}, 2000);

function updateMessagesArea(text) {
  const parser = new DOMParser();
  const doc = parser.parseFromString(text, "text/html");
  let currentChat = document.querySelector("#message-area");
  let responseChat = doc.querySelector("#message-area");
  if (responseChat.innerHTML !== currentChat.innerHTML) {
    currentChat.innerHTML = responseChat.innerHTML;
  }
}
