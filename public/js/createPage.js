var ingredients = [];
var directions = [];

const onIngredientInput = (event) => {
    const index = event.currentTarget.dataset["index"];

    if (event.currentTarget.value === ""){
        if (index != ingredients.length - 1 && ingredients.length != 1){
            ingredients = ingredients.filter(e => e !== event.currentTarget);
            ingredients.forEach((e, i) => e.dataset["index"] = i);
            document.getElementById("ingredients").removeChild(event.currentTarget);
        }
    } else if (index == ingredients.length - 1){
        event.currentTarget.name = 'ingredients[]';
        document.getElementById("ingredients").appendChild(createNewIngredient());
    }
}

const onDirectionsInput = (event) => {
    const index = event.currentTarget.dataset["index"];

    if (event.currentTarget.value === ""){
        if (index != directions.length - 1 && directions.length != 1){
            directions = directions.filter(e => e !== event.currentTarget);
            directions.forEach((e, i) => e.dataset["index"] = i);
            document.getElementById("directions").removeChild(event.currentTarget);
        }
    } else if (index == directions.length - 1){
        event.currentTarget.name = 'directions[]';
        document.getElementById("directions").appendChild(createNewStep());
    }
}

const ingredient1 = document.getElementById("ingredient");
ingredient1.oninput = onIngredientInput;
ingredient1.dataset["index"] = 0;
ingredients.push(ingredient1);

const step1 = document.getElementById("step");
step1.oninput = onDirectionsInput;
step1.dataset["index"] = 0;
directions.push(step1);

const createNewIngredient = ()=>{
    const element = document.createElement("input");
    element.dataset["index"] = ingredients.length;
    element.type = "text";
    element.className = "w-full p-2 outline-none border-blue-500 focus:border-b-2 transition-all text-lg";
    element.placeholder = `ingredient...`;
    element.oninput = onIngredientInput;
    ingredients.push(element);
    return element;
}

const createNewStep = ()=>{
    const element = document.createElement("input");
    element.dataset["index"] = directions.length;
    element.type = "text";
    element.className = "w-full p-2 outline-none border-blue-500 focus:border-b-2 transition-all text-lg";
    element.placeholder = `Step...`;
    element.oninput = onDirectionsInput;
    directions.push(element);
    return element;
}

