function urlGet(urlString, query) {
    let url = new URL(urlString);
    Object.keys(query).forEach(key => {
        if (query[key] != null && query[key].length > 0) {
            url.searchParams.append(key, query[key]);
        }
    });
    return url.href;
}

const ArticleCard = (function() {
    class ArticleCard {
        constructor(size, article) {
            this.size = size;
            this.article = article;
        }

        buildHtml() {
            let content = document.createElement('div');
            content.className = 'col-' + this.size;
            let html = '';
                html += '<div class="card margin-10">' ;
                html += '<div class="card-body">';
                html += '<h5 class="card-title title">' +this.article.title+'</h5>';
                html += '<img class="card-img-bottom url" src="'+this.article.url+'">';
                html += '<p class="card-text description">'+this.article.description+'</p>';
                html += '<p class="card-text updated">';
                html += '<small class="text-muted">'+this.article.publishDate+'</small>';
                html += '</div>';
                html += '</div>';
                content.innerHTML = html;
            return content;
        }
    }
    return ArticleCard;
})();

const NewsComponent = (function(){
    class NewsComponent {

        constructor() {
            this.headers = new Headers({
                "Content-Type": 'application/json',
            });
        }

        async getNews(filters, id) {
            let request = { 
                method: 'GET',
                headers: this.headers,
                cache: 'default' 
            };
            let url = API_URL + '/articles';
            
            if (id != null) {
                url += '/'+id;
            }
            
            url  = urlGet(url, filters);

            return fetch(url, request);
        }


    }

    return NewsComponent;
})();