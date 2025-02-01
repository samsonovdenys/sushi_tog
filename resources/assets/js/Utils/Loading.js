export default {
    on() {
        if (!document.getElementById("loading-overlay")) {
            // Crea il div overlay
            const overlay = document.createElement("div");
            overlay.id = "loading-overlay";
            overlay.style.position = "fixed";
            overlay.style.top = "0";
            overlay.style.left = "0";
            overlay.style.width = "100vw";
            overlay.style.height = "100vh";
            overlay.style.background = "rgba(0, 0, 0, 0.5)"; // Oscura lo schermo
            overlay.style.display = "flex";
            overlay.style.alignItems = "center";
            overlay.style.justifyContent = "center";
            overlay.style.zIndex = "10000";

            // Crea la rotella di loading
            const spinner = document.createElement("div");
            spinner.classList.add("loading-spinner");
            spinner.style.width = "80px";
            spinner.style.height = "80px";
            spinner.style.border = "8px solid rgba(255, 255, 255, 0.3)";
            spinner.style.borderTop = "8px solid white";
            spinner.style.borderRadius = "50%";
            spinner.style.animation = "spin 1s linear infinite";

            // Aggiungi lo spinner all'overlay
            overlay.appendChild(spinner);
            document.body.appendChild(overlay);

            // Aggiungi animazione CSS
            const style = document.createElement("style");
            style.innerHTML = `
                @keyframes spin {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            `;
            document.head.appendChild(style);
        }
    },

    off() {
        const overlay = document.getElementById("loading-overlay");
        if (overlay) {
            overlay.remove();
        }
    }
};
