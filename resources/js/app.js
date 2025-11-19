import "./bootstrap";

/*
|--------------------------------------------------------------------------
| Livewire-Safe UI Initialization
|--------------------------------------------------------------------------
| All interactive UI logic must re-run after Livewire replaces DOM elements.
| These init functions run on page load AND after every Livewire navigation.
|--------------------------------------------------------------------------
*/

document.addEventListener("livewire:init", initUI);
document.addEventListener("livewire:navigated", initUI);

function initUI() {
    initDropdowns();
    initDarkMode();
}

/*
|--------------------------------------------------------------------------
| DROPDOWNS
|--------------------------------------------------------------------------
*/

function initDropdowns() {
    const dropdownConfigs = [
        { btn: "dropdown1Btn", menu: "dropdown1" },
        { btn: "dropdown2Btn", menu: "dropdown2" },
        { btn: "accountBtn", menu: "accountDropdown" },
    ];

    dropdownConfigs.forEach(({ btn, menu }) => {
        const button = document.getElementById(btn);
        const dropdown = document.getElementById(menu);

        if (!button || !dropdown) return;

        // Remove any old listeners (prevents duplicates)
        button.onclick = (e) => {
            e.stopPropagation();

            // Close all other dropdowns
            closeAllDropdowns(menu);

            // Toggle this dropdown
            dropdown.classList.toggle("hidden");
        };
    });

    // Clicking anywhere else closes all dropdowns
    document.onclick = () => closeAllDropdowns();
}

function closeAllDropdowns(exceptId = null) {
    const all = document.querySelectorAll(
        "#dropdown1, #dropdown2, #accountDropdown"
    );

    all.forEach((el) => {
        if (el.id !== exceptId) {
            el.classList.add("hidden");
        }
    });
}

/*
|--------------------------------------------------------------------------
| DARK MODE
|--------------------------------------------------------------------------
*/

function initDarkMode() {

    const toggleBtn = document.getElementById("darkModeToggle");
    const status = document.getElementById("darkModeStatus");

    if (!toggleBtn || !status) return;

    // Use Tailwind's recommended approach: toggle "dark" on <html>
    const html = document.documentElement;

    // Initialize from localStorage
    const saved = localStorage.getItem("darkMode");

    if (saved === "enabled") {
        html.classList.add("dark");
        status.textContent = "On";
    } else {
        html.classList.remove("dark");
        status.textContent = "Off";
    }

    // Avoid duplicate listeners
    toggleBtn.onclick = (e) => {
        e.stopPropagation();
        e.preventDefault();

        html.classList.toggle("dark");

        const isDark = html.classList.contains("dark");

        status.textContent = isDark ? "On" : "Off";
        localStorage.setItem("darkMode", isDark ? "enabled" : "disabled");
    };
}
