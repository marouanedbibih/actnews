import API from "../../../../api/js/api.js";
const apiUrl = 'http://localhost/ActNews/api/php/api.php'; // Update with your API URL
const api = new API(apiUrl);

/**
 * Function render the last thwo articles in home page
 */
function renderLastArtical(){
    api.get('getLastArticle')
        .then(response=>{
            const datas = response.data;
            console.log(datas);
            const home_actualites_article = document.querySelector("#home-actualites-article");
            console.log(home_actualites_article);
            datas.map(data=>{
                const short_article_description = data.article_description.substr(0,300);
                const article = `
                <div class="d-lg-flex post-entry-2" id="article-${data.article_id}">
                    <a href="article.php?id=${data.article_id}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                      <img src="../../backend/uploads/img/article/${data.article_image}" alt class="img-fluid">
                    </a>
                    <div>
                      <div class="post-meta"><span class="date">${data.section_title}</span><br><small>${data.date_published}</small></div>
                      <h3><a>${data.article_title}</a></h3>
                      <p>${short_article_description}...Read More<a href="article.php?id=${data.article_id}"></></a></p>
                    </div>
                </div>
                `
                home_actualites_article.innerHTML+=article;
                
            })
            

        })
}
renderLastArtical();

/**
 * Render Sections infos to home page
 */
function renderSectionsInHome(){
    fetch('assets/json/sections.json')
        .then(response=> response.json())
            .then(sections=>{
                console.log(sections);
                const row_section_card = document.querySelector("#row-section-card");
                sections.map(section=>{
                    const short_section_description = section.description.substr(0,180);
                    const card_section =`
                    
                        <div class="col-lg-4 text-start mb-5" id=section-${section.id}>
                            <a href="section.php?id=${section.id_section}">
                                <div class="card border-0 shadow-sm ">
                                    <div class="card-body text-center">
                                      <i class="rounded-circle ${section.icon} fs-1 mb-4"></i>
                                      <h4 class="card-title">${section.title}</h4>
                                      <p class="card-text">${short_section_description}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    
                    `
                    row_section_card.innerHTML+= card_section;
                    console.log(row_section_card);
                })
            })
}
renderSectionsInHome();

function renderNewsInHome(){
    api.get('getLastNew')
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
