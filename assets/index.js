////////////////////////////////////////////////////////////////////////////////
// index.js
////////////////////////////////////////////////////////////////////////////////

//
// Function to format the date string
//
function formatDate(dateString) {
    if (!dateString) {
        return ''; // Return empty string if date is not provided
    }

    const date = new Date(dateString);
    if (isNaN(date.getTime())) {
        return ''; // Return empty string if the date is invalid
    }

    const year = date.getFullYear();
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Month is zero-based
    return `${year}/${month}`;
}

////////////////////////////////////////////////////////////////////////////////
// Function to create an article card
//
// images
//   -150x150.jpg
//   -300x157.jpg
//   -768x402.jpg
//
////////////////////////////////////////////////////////////////////////////////
function createArticleCard(article) {
    const formattedDate = formatDate(article.date);

    const card = document.createElement("div");
    card.className = "col-md-4"; // Set the column size for medium devices (desktop)

    let AImgTag = ''; // Initialize an empty string for a - img tag

    // Check if article.image is provided
    // <a href="data/${article.url}.html">
    // hx-get="http://localhost:8000/data/the-rise-of-deep-tech-transforming-industries-and-shaping-the-future.html" hx-target="#article"
    //<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="loadHTML('yourfile.html')">Open Modal</button>
    //onclick="loadHTML('/data/articles/${article.url}.html')"
    if (article.image) {

	    // Simplified version without the srcset.
        AImgTag = `
            <div>
            <img
	        src="${formattedDate}/${article.image}.jpg"
		alt="${article.title} Image"
	        class="card-img-top"
		data-bs-toggle="modal"
	        data-bs-target="#articleModal"
		onclick="loadHTML('/${formattedDate}/${article.url}.html', '${article.title}', '${formattedDate}/${article.image}-768x402.jpg')"
            >
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#articleModal" onclick="loadHTML('/${formattedDate}/${article.url}.html', '${article.title}', '${formattedDate}/${article.image}.jpg')">Open Article</button>
            <a href="/${formattedDate}/${article.url}.html" target="_blank" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span> PermaLink</a>

            </div>
            `;
    }

    // Create the Card HTML
    card.innerHTML = `
        <div class="card">
        ${AImgTag}
        <div class="card-body">
        <h5 class="card-title">${article.title}</h5>
        <!-- <p>${article.date} | ${formattedDate}</p> -->
        <!-- <p>${article.image}</p> -->
        </div>
        </div>
        `;

    return card;
}

////////////////////////////////////////////////////////////////////////////////
//
// Function loadHTML
//
////////////////////////////////////////////////////////////////////////////////
function loadHTML(htmlFilePath, articleModalTitle, articleModalImage) {
    // Fetch HTML content
    fetch(htmlFilePath)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(htmlContent => {

            document.getElementById('article-modal-title').innerHTML = "WordGit - Davro.net";
            document.getElementById('article').innerHTML = htmlContent;

            // Show the modal
            //new bootstrap.Modal(document.getElementById('articleModal')).show();
        })
        .catch(error => {
            console.error('Error fetching the HTML file:', error);
        });
}


document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(event) {
        var clickedId = event.target.id;
        var clickedElement = document.getElementById(clickedId);

        if (clickedElement) {
            document.querySelectorAll('.nav-link.active').forEach(link => link.classList.remove('active'));
            clickedElement.classList.add('active');
        }
        // Now you can use the clickedId as needed
    });
});

/*
document.querySelectorAll("[data-go-to-id]").forEach(function(link) {
  link.addEventListener("click", function() {
    const element = document.getElementById(link.dataset.goToId);

    if (!(element instanceof HTMLElement)) {
      throw new ReferenceError(`Unable to found element with id "${goToId}"`);
    }

    window.scroll({
      top: element.getBoundingClientRect().top,
      left: 0,
      behavior: "smooth"
    });
  });
});
//*/

function loadArticles() {
    // Fetch the JSON file containing articles
    //fetch("https://davro.github.io/site.json")

    console.log("Loading Article ...");

    fetch("/site.json")
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
        paginationContainer.innerHTML = "";
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
                //console.log(article);
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
}


document.addEventListener("DOMContentLoaded", function () {
    loadArticles();
});

function loadArticles() {
    // Fetch the JSON file containing articles
    fetch("/site.json")
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
        paginationContainer.innerHTML = "";

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement("li");
            pageItem.classList.add("page-item");

            const pageLink = document.createElement("a");
            pageLink.classList.add("page-link");
            pageLink.href = `#page${i}`;  // Set the href to include page number in the hash
            pageLink.textContent = i;

            // Add event listener for pagination link click
            pageLink.addEventListener("click", function(event) {
                event.preventDefault();  // Prevent the default anchor behavior
                window.location.hash = `#page${i}`;  // Update the URL hash

                displayArticles(i);  // Directly display the selected page
                updatePagination(i);  // Update active pagination class
            });

            pageItem.appendChild(pageLink);
            paginationContainer.appendChild(pageItem);
        }

        // Handle initial load or hash change event
        function handleHashChange() {
            const hash = window.location.hash;

            if (!hash || hash === '#') {
                displayArticles(1);  // Default to the first page if no hash is present
                updatePagination(1);
            } else {
                const pageNum = parseInt(hash.replace('#page', ''), 10);
                if (!isNaN(pageNum) && pageNum >= 1 && pageNum <= totalPages) {
                    displayArticles(pageNum);
                    updatePagination(pageNum);
                } else {

                    const articleGrid = document.getElementById("article-grid");

                    switch (hash) {
                        case '#books':
                            // Handle books hash
                            articleGrid.innerHTML = "BOOKS Coming soon!";
                            console.log("Books hash detected");
                        break;

                        case '#economics':
                            // Handle coding hash
                            articleGrid.innerHTML = "ECONOMICS Coming soon!";

                            // Modify the class
                            articleGrid.classList.remove('row-cols-md-3');
                            articleGrid.classList.add('row-cols-1');

                            // Fetch the HTML file
                            fetch('/economics/model.html')
                            .then(response => {
                                // Check if the response is successful
                                if (!response.ok) {
                                throw new Error('Failed to fetch HTML file');
                                }
                                // Return the HTML content
                                return response.text();
                            })
                            .then(htmlContent => {
                                // Render the fetched HTML content into the articleGrid element
                                articleGrid.innerHTML = htmlContent;
                            })
                            .catch(error => {
                                // Handle any errors that occur during the fetch
                                console.error('Error fetching HTML file:', error);
                            });

                        break;

                        // case '#crypto':
                        //     articleGrid.innerHTML = "Crypto Coming soon!";

                        //     //pairTest = 'https://api.dexscreener.com/latest/dex/tokens/0x2170Ed0880ac9A755fd29B2688956BD959F933F8,0xbb4CdB9CBd36B01bD1cBaEBF2De08d9173bc095c';
                        //     pairTest = 'https://api.dexscreener.com/latest/dex/pairs/pulsechain/0xE56043671df55dE5CDf8459710433C10324DE0aE';

                        //     fetch(pairTest)
                        //     .then(response => response.json())
                        //     .then(data => {
                        //         // Update the title, keywords, and articles grid with the fetched data
                        //         articleGrid.innerHTML = "<div><strong>PLS:</strong> " + data.pair.priceUsd + "</div>";
                        //         console.log("Data:", data);
                        //     })
                        //     .catch(error => console.error("Error fetching JSON:", error));
                        // break;

                        default:
                        // code block
                        displayArticles(1);  // Default to the first page for invalid hashes
                        updatePagination(1);
                    }
                }
            }
        }

        // Function to display articles for a specific page
        function displayArticles(page) {
            const startIdx = (page - 1) * articlesPerPage;
            const endIdx = startIdx + articlesPerPage;
            const currentArticles = data.site.articles.slice(startIdx, endIdx);

            // Clear the article grid
            const articleGrid = document.getElementById("article-grid");
            articleGrid.innerHTML = "";

            // Populate the articles grid
            currentArticles.forEach(article => {
                const articleCard = createArticleCard(article);
                articleGrid.appendChild(articleCard);
            });
        }

        // Function to update the active class on pagination links
        function updatePagination(page) {
            const paginationLinks = document.querySelectorAll(".page-link");
            paginationLinks.forEach(link => link.classList.remove("active"));

            const activeLink = document.querySelector(`a[href="#page${page}"]`);
            if (activeLink) {
                activeLink.classList.add("active");
            }
        }

        // Add event listener for hashchange
        window.addEventListener("hashchange", handleHashChange);

        // Call handleHashChange on initial load to check initial hash value
        handleHashChange();
    })
    .catch(error => console.error("Error fetching JSON:", error));
}

// Add event listener for hashchange event
window.addEventListener("hashchange", handleHashChange);

// Call handleHashChange function on initial load to check initial hash value
handleHashChange();
