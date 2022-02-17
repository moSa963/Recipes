var processing = false;
var page = 2;

const loadItems = async (id) => {
    if (!processing && page){
        processing = true;

        const res = await fetch("/api/comment/list/" + id + "?page=" + page);

        if (!res.ok){
            processing = false;
            return;
        }

        const js = await res.json();

        page = js.next;

        const root = document.getElementById("commentsCont");

        js.list.forEach(element => {
            root.appendChild(getCardItem(element));
        });

        processing = false;
    }
}

const deleteRecipe = async (id) => {
    const res = await fetch("/recipe/" + id, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
        method: 'DELETE',
    });

    if (res.redirected){
        window.location.href = res.url;
    }
}

//when user click on the rating stars
const onStarClick = (count) => {
    document.querySelector("#stars").querySelectorAll('svg')
        .forEach((e, i) => {
            if (i < count){
                e.setAttribute("fill", "green");
            } else {
                e.setAttribute("fill", "none");
            }
        });
    document.getElementById("ratingInput").setAttribute('value', count);
}


const getCardItem = (element) => {
    const root = document.createElement("div");
    root.className = "class='mb-10 w-full'";

    var ih = `
        <div class="flex mx-3 sm:mx-1 items-center">
        <span class="flex justify-center items-center w-10 h-10 rounded-full overflow-hidden">
            <img class="w-full h-full" src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimages.media-allrecipes.com%2Fuserphotos%2F8079468.jpg" />
        </span>
        <p class="p-2">${element.username}</p>
    `;

    ih += getRatingCard(element.rating);

    ih += `
        </div>
            <p>${element.comment}</p>
        </div>
    `;

    root.innerHTML = ih;

    return root;
}

const getRatingCard = (rating) => {
    var card = "<div class='w-full flex'>";

    for (var i = 0; i < 5; ++i){
        card += `<svg class="w-5 h-5" fill="${ i < rating ? "green" : "none" }" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>`;
    }

    card += "</div>";
    return card;
}

const toggleReportCard = (e) => {
    const card = document.getElementById("reportCard");

    if (card.classList.contains("flex")){
        card.classList.remove("flex");
        card.classList.add("hidden");
    }else {
        card.classList.remove("hidden");
        card.classList.add("flex");
    }
}

document.querySelector("#stars").querySelectorAll('svg')
    .forEach((e, i) => e.onclick = () => onStarClick(i + 1));

