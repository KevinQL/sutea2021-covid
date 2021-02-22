console.log("load home.js");
import { slider } from './data/slider.js';
import { news } from './data/noticias.js';
import { videos } from './data/videos.js';

function loadSliders() {
    const in_slider = document.querySelector("#sliderHome");
    const dataSlider = slider;
    let slider_HTML = '';
    dataSlider.sliders.forEach((item, index) => {
        let button = '';
        item.buttons.forEach(but => {
            button += `<a 
            class="btn btn-primary-own font-weight-500 aos-init aos-animate" href="#${but.link}" data-aos="fade-up" data-aos-delay="100">${but.name}</a>
            `;
        })
        slider_HTML += `
        <div class="carousel-item ${index === 0 ? 'active' : ''}">
        <div class="w-100">
          <div class="page-header-content py-5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                  <div data-aos="fade-up" class="aos-init aos-animate">
                    <h1 class="">${item.title}</h1>
                    <p class="">${item.subtitle}</p>
                  </div>
                    ${button}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>`
    })
    in_slider.innerHTML += slider_HTML;
}

function loadNews() {
    const in_news = document.querySelector("#noticias");
    const dataNews = news;
    let header_HTML = `
        <h2 class="text-center">${dataNews.title}</h2>
        <p class="text-muted pb-4 text-center">${dataNews.subtitle}</p>
    `;
    let listHTML = ``;
    dataNews.list.forEach((element, index) => {
        const buttonHTML = element.seeMore ? `
        <button type="button" class="btn btn-inline-own seeMoreNews" data-bs-toggle="modal" data-bs-target="#exampleModal" id="button${index}"
            >
            Ver más
        </button>` : ``;
        listHTML += `
        <div class="col-sm-4 mb-3">
            <div class="card card-own">
                <div class="card-body">
                    <h5 class="card-title">${element.title}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">${element.date}</h6>
                    <p class="card-text">${element.description}</p>
                    ${buttonHTML}                      
                </div>
            </div>
        </div>
        `
    });
    in_news.innerHTML += (header_HTML + listHTML);
}

function loadVideos() {
    const in_videos = document.querySelector("#videosHome");
    const in_videos_title = document.querySelector("#videosHomeTitle");
    const in_videos_subtitle = document.querySelector("#videosHomeSutitle");
    const dataVideos = videos;
    let videos_HTML = '';
    dataVideos.videos.forEach((element, index) => {
      const video = `
        <video width="100%" height="550px" controls>
            <source src="${element.video}" type="video/mp4">
        </video>`
      const link = `
        <div class="w-100" height="550px">
          <div class="">
            <iframe class="" src="${element.src}" allowfullscreen width="100%" height="550vh"></iframe>
          </div>
        </div>`
      
        const source = element.video ? video : link;
        videos_HTML += `
        <div class="carousel-item ${index === 0 ? 'active' : ''}">
            ${source}
          </div>`
    });
    in_videos_title.innerHTML += dataVideos.title;
    in_videos_subtitle.innerHTML += dataVideos.subTitle;
    in_videos.innerHTML += videos_HTML;
}


setTimeout(() => {
    loadSliders();
    loadNews();
    loadVideos();
    const buttonHTML = document.getElementsByClassName('seeMoreNews');
    for (let index = 0; index < buttonHTML.length; index++) {
        buttonHTML[index].addEventListener('click', ($event) => {
            const index = $event.target.id.replace('button', '');
            openModalNews(Number(index));
        })
    }
}, 50);



function openModalNews(index) {
    const dataNews = news;
    let content = {}
    dataNews.list.forEach((element, i) => {
        if (i === index) {
            content = element.seeModal;
        }
    })
    const title = document.querySelector("#titleNews");
    title.innerHTML = content.title;

    const body = document.querySelector("#contentNews");
    body.innerHTML = content.content;
}




