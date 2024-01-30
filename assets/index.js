

document.addEventListener("DOMContentLoaded", function () {

  // Fetch the JSON file
  fetch("https://davro.github.io/data/site.json")
    .then(response => response.json())
    .then(data => {
      // Update the title with the fetched data
      document.title = data.site.title;
    })
    .catch(error => console.error("Error fetching JSON:", error));
});
