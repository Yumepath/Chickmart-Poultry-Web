document.addEventListener("DOMContentLoaded", () => {
    function setupToggle(itemsClass, detailsClass) {
        document.querySelectorAll(itemsClass).forEach(item => {
            item.addEventListener("click", () => {
                const details = item.querySelector(detailsClass);

                // Check if the clicked item is already expanded
                const isExpanded = item.classList.contains("expanded");

                // Close all other expanded items
                document.querySelectorAll(itemsClass).forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove("expanded");
                        otherItem.querySelector(detailsClass).style.maxHeight = "0px";
                    }
                });

                // Toggle the clicked item
                if (isExpanded) {
                    item.classList.remove("expanded");
                    details.style.maxHeight = "0px";
                } else {
                    item.classList.add("expanded");
                    details.style.maxHeight = details.scrollHeight + "px"; // Smooth expansion
                    item.scrollIntoView({ behavior: "smooth", block: "center" }); // Scroll smoothly
                }
            });
        });
    }

    // Initialize toggles for categories and featured products
    setupToggle(".category-item", ".category-details");
    setupToggle(".product-item", ".product-details");

    // Ensure page fade-in animation works
    document.body.classList.add("loaded");
});
