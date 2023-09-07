import API from "../../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);

// Get the URL query parameters
const urlParams = new URLSearchParams(window.location.search);
// Get the value of the 'id' parameter
const id_article = parseInt(urlParams.get('id'));
// Use the 'id' value as needed
console.log(id_article); // This will print the 'id' value to the console
// set Section info in section page

function displayArticle(id_article) {
    api.getById('getArticleById', id_article)
        .then(response => {
            const article = response.data;
            console.log(article);
            const article_area=document.querySelector("#article-area");
            article.map(article => {
                const article_element = `
                <div class="single-post" id="article-${article.id}">
                    <div class="post-meta"><span class="date">${article.section_title}</span> <span class="mx-1">&bullet;</span> <span>${article.date_published}</span></div>
                    <h1 class="mb-5">${article.title}</h1>
                    <figure class="my-4">
                        <img src="../../backend/uploads/img/article/${article.image}" alt="" class="img-fluid">
                    </figure>
                    <p>${article.description}</p>
                   
                </div>
                `;
                article_area.innerHTML+= article_element;

                console.log(article_element);
            })
        })
}
displayArticle(id_article);