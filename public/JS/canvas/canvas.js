window.onload = function () {
    main();
}


const button = document.getElementById("send_template_button");
button.addEventListener("click", () => {
    postApi("http://localhost/cardstudio/public/api/template/new", getComputedFields()).then(r => console.log(r))
})


let shapes = [];

const scale = 0.5


function getCanvas(width, height) {
    let canvasObject = {
        canvas: null,
        context: null
    }
    canvasObject.canvas = document.getElementById("canvas");
    canvasObject.context = canvasObject.canvas.getContext("2d");

    canvasObject.canvas.width = width;
    canvasObject.canvas.height = height;
    return canvasObject;

}


function drawImageOnCanvas(canvas, posX, posY, width, height) {
    const image = new Image()
    image.src = "./assets/pdf/template.jpg"
    image.onload = function () {
        canvas.context.drawImage(image, posX, posY, width, height);
        drawShapes(canvas, shapes)

    }
}


function main() {
    const initialX = 2031;
    const initialY = 1276
    const width = makeSize(initialX);
    const height = makeSize(initialY)
    const canvas = getCanvas(width, height);
    drawImageOnCanvas(canvas, 0, 0, width, height)
    shapes.push(getImageShape());

    for (let shape of getTextShapes()) {
        shapes.push(shape)
    }


    drawShapes(canvas, shapes);


    returnShapes();

}


function makeSize(initial) {
    return initial * scale;
}


function revertSize(initial) {

    return initial / scale;

}


function getSize(fraction, initialX, initialY) {


    const dividedX = initialX / fraction;
    const dividedY = initialY / fraction;

    return {dividedX, dividedY}

}


function getImageShape() {
    const imageShape = {
        name: "student_image",
        x: makeSize(78),
        y: makeSize(371),
        width: makeSize(524),
        height: makeSize(683),
        color: 'red'
    }

    return imageShape;
}

function getTextShapes() {
    const textShapeWidth = 600;
    const textShapeHeight = 100;
    let textShapes = [];
    const firstName = getShape(652, 492, textShapeWidth, textShapeHeight, "student_firstname")
    const lastname = getShape(652, 732, textShapeWidth, textShapeHeight, "student_lastname")
    const birthdate = getShape(652, 974, textShapeWidth, textShapeHeight, "student_birthdate")
    const valid = getShape(1383, 492, textShapeWidth, textShapeHeight, "template_valid")
    const residence = getShape(1383, 732, textShapeWidth, textShapeHeight, "student_residence")
    textShapes.push(firstName, lastname, birthdate, valid, residence)

    return textShapes;

}


function getShape(x, y, width, height, name) {

    return {
        name: name,
        x: makeSize(x),
        y: makeSize(y),
        width: makeSize(width),
        height: makeSize(height),
        color: "red"
    }


}


function drawShapes(canvas, shapes) {

    console.log("drawing shapes");

    for (let shape of shapes) {
        canvas.context.fillStyle = shape.color;
        canvas.context.fillRect(shape.x, shape.y, shape.width, shape.height)

    }


}


function getComputedFields() {
    fields = {}
    for (let shape of shapes) {
        const computedShape = getShapeCoordinates(shape);
        fields[shape.name] = computedShape;
    }

    return fields;
}


function getShapeCoordinates(shape) {
    return {
        x: revertSize(shape.x),
        y: revertSize(shape.y),
        width: revertSize(shape.width),
        height: revertSize(shape.height)
    }


}


async function postApi(url, data) {

    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })

    const content = await response.json();
    return content


}



