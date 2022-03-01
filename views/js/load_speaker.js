console.log("load speaker.js");
import { speakers } from './data/speakers.js';

function load_speakers() {
    let in_speakers = document.querySelector("#listSpeakers");// speakerTitle
    let in_speakers_title = document.querySelector("#speakerTitle");
    let in_speakers_subtitle = document.querySelector("#speakerSubtitle");
    const dataSpeakers = speakers;
    let speakers_HTML = '';
    dataSpeakers.events.forEach((event, index) => {
        let speakerContent = '';
        event.speakers.forEach(spk => {

            /**
             * Definimos el tipo de boton de acuerdo al estado del stream. 
             * Si existe ponencia entonces pintar boton mirar-ponenencia, sino sin-ponencia
             */
            let buttonStream = spk.streaming.state ?  `<a small class="next btn btn-primary-own mx-2" target="_blank" href="${spk.streaming.link}">mirar ponencia</a>`:`<a small class="next btn btn-danger-own mx-2" target="_blank" href="${spk.streaming.link}">sin ponencia</a>`;

            speakerContent += `
                    <div class="col-lg-4 mb-3">
                        <div class="card-speakers">
                            <div class="text-white mb-3">
                                <img src="${spk.photo}" class="bg-img-cover rounded-circle speaker-photo">
                            </div>
                            <h5>${spk.name}</h5>
                            <span small class="font-color-vprimary font-weight-bold">${spk.proffesion}</span>
                            <p class="mt-2">${spk.description}</p>
                            <span small class="font-color-vprimary font-weight-bold">${spk.date}</span>
            
                            ${buttonStream}
                            
                        </div>
                    </div>
             `
        });
        speakers_HTML += `
            <div class="">
                <h3 class="mb-4">${event.day}, <small> ${event.date} </small></h3>
                <div class="row text-center mb-5">
                    ${speakerContent}
                </div>
            </div>
        `;
    });
    in_speakers.innerHTML += speakers_HTML;
    in_speakers_title.innerHTML += dataSpeakers.title;
    in_speakers_subtitle.innerHTML += dataSpeakers.subtitle;
}

setTimeout(() => {
    load_speakers()
}, 20);