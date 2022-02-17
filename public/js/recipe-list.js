var processing = false;
var page = 1;

const loadItems = async () => {
    if (!processing && page){
        processing = true;

        const userid = document.getElementById("cardsCont").dataset["userid"];

        var url = `/api/recipe/list?page=${page}`;
        userid && (url += "&user=" + userid);

        const res = await fetch(url);

        if (!res.ok){
            processing = false;
            return;
        }

        const js = await res.json();

        page = js.next;

        const root = document.getElementById("cardsCont");

        js.list.forEach(element => {
            root.appendChild(getCardItem(element));
        });

        processing = false;
    }
}


const getCardItem = (recipe) => {
    const root = document.createElement("a");
    root.className = "card";
    root.href = "/recipe/" + recipe.id;

    var ih = `
        <div class="absolute top-2 left-2 rounded-md bg-slate-600 bg-opacity-50 p-1">
            <p class="text-sm text-white">@ ${ recipe.username }</p>
        </div>
        <img src="/recipe/${recipe.id}/image/${recipe.img_id}" class="object-cover " />
    `;
    
    ih += getRatingCard(recipe.rating);

    ih += `
        <div class="m-2">
            <div class="max-h-12 overflow-hidden mb-2">
                <p class="max-h-full overflow-hidden text-ellipsis">${recipe.title}</p>
            </div>
            <p class="overflow-hidden whitespace-nowrap text-gray-600 text-sm text-ellipsis">
                ${recipe.description}
            </p>
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



window.onscroll = async () => {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 200) {
        await loadItems();
    }
};



loadItems();