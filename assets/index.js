
document.addEventListener("DOMContentLoaded", function () {
    // Fetch the JSON file containing articles
    fetch("articles.json")
        .then(response => response.json())
        .then(data => {
            // Update the title, keywords, and articles grid with the fetched data
            document.title = data.site.title;
            document.getElementById("site-header").textContent = data.site.title;
            document.getElementById("site-header-hidden").textContent = data.site.title;
            document.querySelector('meta[name="keywords"]').content = data.site.keywords;

            // Populate the articles grid
            const articleGrid = document.getElementById("article-grid");
            data.articles.forEach(article => {
                const articleCard = createArticleCard(article);
                articleGrid.appendChild(articleCard);
            });
        })
        .catch(error => console.error("Error fetching JSON:", error));

    // Function to create an article card
    function createArticleCard(article) {
        const card = document.createElement("div");
        card.className = "col";

        card.innerHTML = `
            <div class="card">
            <div class="card-body">
            <h5 class="card-title">${article.title}</h5>
            <p class="card-text">${article.content}</p>
            </div>
            </div>
            `;

        return card;
    }
});
