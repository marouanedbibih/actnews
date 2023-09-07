import API from "../../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);

// Get the URL query parameters
const urlParams = new URLSearchParams(window.location.search);
// Get the value of the 'id' parameter
const id_section = parseInt(urlParams.get('id'));
// Use the 'id' value as needed
console.log(id_section); // This will print the 'id' value to the console
// set Section info in section page

function setInfosSection(id_section) {
    api.getById('readSectionById', id_section)
        .then(response => {
            // console.log(response);
            const section_header = document.querySelector('.section-header');
            const section_description = document.querySelector('.section-description');
            // console.log(section_header);
            response.map(section => {
                const h2_title = `<h2>${section.title}</h2>`;
                section_header.innerHTML += h2_title;
                const p_description = `<p>${section.description}</p>`
                section_description.innerHTML += p_description;

            })
        })

}
setInfosSection(id_section);

// set TeamMembres in Section
function setTeamMembres(id_section) {
    api.getById('getMembreByIdSection', id_section)
        .then(response => {
            const membres = response.membres;
            // console.log(membres);
            const cards_membres_section = document.querySelector("#membres-card-section");
            cards_membres_section.innerHTML = ''; // Clear existing content before adding new cards
            membres.map(membre => {
                const card_membre = `
                    <div class="col-lg-4 text-center mb-5 pt-3 shadow-sm transform hover:scale-105" id="membre-${membre.id}">
                        <img src="../../backend/uploads/img/team/${membre.image}" alt class="img-fluid rounded-circle w-50 h-50 mb-4">
                        <h4>${membre.last_name} ${membre.first_name}</h4>
                        <span class="d-block mb-3 text-uppercase">${membre.job}</span>
                        <p>${membre.email}</p>
                        <p>${membre.phone}</p>
                    </div>
                    `;
                // console.log(card_membre);
                cards_membres_section.innerHTML += card_membre;
                // console.log(cards_membres_section)

            })
        })
}
setTeamMembres(id_section);

// set article by id section
function readArticleByIdSection(id_section) {
    api.getById('readArticleByIdSection', id_section)
        .then(response => {
            console.log(response.data);
            const articles = response.data;
            const section_article = document.querySelector('#section-article');
            articles.map(article => {
                const short_article_description = article.description.substr(0,300);
                console.log(short_article_description);
                const article_element = `
                <div class="d-lg-flex post-entry-2" id="article-${article.id}">
                    <a href="article.php?id=${article.id}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                        <img src="../../backend/uploads/img/article/${article.image}" alt class="img-fluid">
                    </a>
                    <div>
                        <div class="post-meta"><span class="date">${article.title}</span><br><small>${article.date_published}</small></div>
                        <h3><a>${article.title}</a></h3>
                        <p>${short_article_description}...Read More</p>
                    </div>
                </div>
                `
                section_article.innerHTML+=article_element;
                console.log(article_element);
            })
        })
}
readArticleByIdSection(id_section);

function renderNewsInHome(){

    api.getById('getNewBySection',id_section)
        .then(response=>{
            console.log(response);
            const datas = response.data;
            const side_news = document.querySelector('#side-news');
            datas.map(data=>{
                const news = `
                <div class="post-entry-1 border-bottom" id="new-${data.id}">
                    <div class="post-meta"><span class="date">${data.section_title}</span> <br> <span class="mx-1">&bullet;</span> <span>${data.date_created}</span></div>
                    <h2 class="mb-2"><a href="section.php?id=${data.id_section}">${data.title}</a></h2>
                </div>
                `;
                side_news.innerHTML+=news;

            })
        })
}
renderNewsInHome();


