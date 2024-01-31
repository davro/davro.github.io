
document.addEventListener("DOMContentLoaded", function () {
    // Fetch the JSON file containing articles
    fetch("https://davro.github.io/data/site.json")
        .then(response => response.json())
        .then(data => {
            // Update the title, keywords, and articles grid with the fetched data
            document.title = data.site.title;
            document.querySelector('meta[name="keywords"]').content = data.site.keywords;

            // Paginate the articles
            const articlesPerPage = 9; // Change this value based on your preference
            const totalPages = Math.ceil(data.site.articles.length / articlesPerPage);

            // Initialize pagination
            const paginationContainer = document.getElementById("pagination");
            const articleGrid = document.getElementById("article-grid");

            for (let i = 1; i <= totalPages; i++) {
                const pageItem = document.createElement("li");
                pageItem.classList.add("page-item");
                const pageLink = document.createElement("a");
                pageLink.classList.add("page-link");
                pageLink.href = "#";
                pageLink.textContent = i;
                pageLink.addEventListener("click", () => displayArticles(i));
                pageItem.appendChild(pageLink);
                paginationContainer.appendChild(pageItem);
            }

            // Display the first page initially
            displayArticles(1);

            // Function to display articles for a specific page
            function displayArticles(page) {
                const startIdx = (page - 1) * articlesPerPage;
                const endIdx = startIdx + articlesPerPage;
                const currentArticles = data.site.articles.slice(startIdx, endIdx);

                // Clear the article grid
                articleGrid.innerHTML = "";

                // Populate the articles grid
                currentArticles.forEach(article => {
                    const articleCard = createArticleCard(article);
                    articleGrid.appendChild(articleCard);
                });

                // Update active class for pagination
                const paginationLinks = document.querySelectorAll(".page-link");
                paginationLinks.forEach(link => link.classList.remove("active"));
                paginationLinks[page - 1].classList.add("active");
            }
        })
        .catch(error => console.error("Error fetching JSON:", error));

    // Function to create an article card
    function createArticleCardOLD(article) {
        const card = document.createElement("div");
        card.className = "col";

        //<p class="card-text">${article.content}</p>
            card.innerHTML = `
            <div class="card">
            <div class="card-body">
            <h5 class="card-title">${article.title}</h5>
            <a href="article/${article.date}/${article.url}"><img src="data/${article.date}/${article.image}-300x157.jpg" /></a>
            </div>
            </div>
            `;

        return card;
    }

    // Function to create an article card
    //
    // images
    //   -150x150.jpg
    //   -300x157.jpg
    //   -768x402.jpg
    //
    function createArticleCardTEST(article) {
        const card = document.createElement("div");
        card.className = "col-md-4"; // Set the column size for medium devices (desktop)
        card.innerHTML = `
            <div class="card">
            <a href="article/${article.url}">
            <img srcset="data/${article.date}/${article.image}-150x150.jpg 150w, data/${article.date}/${article.image}-300x157.jpg 300w, data/${article.date}/${article.image}-768x402.jpg 768w"
                 sizes="(max-width: 576px) 150px, (max-width: 768px) 300px, 768px"
                 src="data/${article.date}/${article.image}-300x157.jpg"
                 alt="${article.title} Image"
                 class="card-img-top" />
            </a>
            <div class="card-body">
            <h5 class="card-title">${article.title}</h5>
            </div>
            </div>
            `;
        return card;
    }


    // Function to format the date string
    function formatDate(dateString) {
        const date = new Date(dateString);
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Month is zero-based
        return `${year}/${month}`;
    }

    // Function to create an article card
    function createArticleCard(article) {
        const formattedDate = formatDate(article.date);

        const card = document.createElement("div");
        card.className = "col-md-4"; // Set the column size for medium devices (desktop)
        card.innerHTML = `
            <div class="card">
            <a href="article/${formattedDate}/${article.url}"> <!-- Replace ${article.date} with formattedDate -->
            <img srcset="data/${article.date}/${article.image}-150x150.jpg 150w,
            data/${article.date}/${article.image}-300x157.jpg 300w,
            data/${article.date}/${article.image}-768x402.jpg 768w"
        sizes="(max-width: 576px) 150px,
            (max-width: 768px) 300px,
            768px"
        src="data/${article.date}/${article.image}-300x157.jpg"
        alt="${article.title} Image"
        class="card-img-top">
            </a>
            <div class="card-body">
            <h5 class="card-title">${article.title}</h5>
            </div>
            </div>
            `;
        return card;
    }

});

