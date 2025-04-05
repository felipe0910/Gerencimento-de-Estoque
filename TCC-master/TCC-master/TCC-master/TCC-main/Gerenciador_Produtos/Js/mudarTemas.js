document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggle-theme");
    const body = document.body;

    // Selecionar elementos afetados
    const elements = [
        body,
        document.querySelector(".sidebar"),
        document.querySelector(".navbar"),
        document.querySelector(".content_form"),
        document.querySelector(".content_table"),
        document.querySelector(".container-search"),
        document.querySelector(".input-group"),
        ...document.querySelectorAll(".h2-group, .h2-group img, .h2-group h2") // Inclui ícones e textos do centro
    ];

    const themeIcon = toggleButton.querySelector("img");

    // Carregar tema salvo
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "light-mode") {
        elements.forEach(el => el && el.classList.add("light-mode"));
        if (themeIcon) themeIcon.classList.add("light-mode");
    }

    // Alternar tema
    toggleButton.addEventListener("click", () => {
        const isLightMode = body.classList.contains("light-mode");
        elements.forEach(el => el && el.classList.toggle("light-mode", !isLightMode));
        if (themeIcon) themeIcon.classList.toggle("light-mode", !isLightMode);
        localStorage.setItem("theme", isLightMode ? "" : "light-mode");
    });
});
