import { asset } from "../../admin/panelAdmin.js";

document.addEventListener("DOMContentLoaded", () => {
    console.log("Chatbot loaded");
    iconChat();
});

function iconChat() {
    const iconChat = document.createElement("div");
    iconChat.classList.add("chat-icon");

    iconChat.innerHTML = `<img src="${asset(
        "icons/web/chat.svg"
    )}" class="w-10 h-10">`;
    document.body.appendChild(iconChat);

    iconChat.addEventListener("click", () => {
        console.log("Icon chat clicked");

        chatbox();
    });
}

function chatbox() {
    const chatbox = document.createElement("div");
    chatbox.classList.add(
        "bg-custom-dark1",
        "text-white",
        "w-64",
        "h-64",
        "border-2",
        "border-gray-700",
        "rounded-lg",
        "shadow-md",
        "fixed",
        "bottom-15",
        "right-15",
        "z-50"
    );
    chatbox.innerHTML = `<img src="${asset(
        "icons/web/chat.svg"
    )}" class="w-10 h-10">`;
    document.body.appendChild(chatbox);
}
