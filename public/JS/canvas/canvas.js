const button = document.getElementById("send_template_button");
button.addEventListener("click", () => {
    postApi("http://localhost/cardstudio/public/api/template/new", getComputedFields()).then(r => console.log(r))
})


let shapes = [];

const scale = 0.1

const image = new Image();
image.src = "./assets/pdf/template.png";
image.onload = () => {
    main(image.width, image.height, image);
}


function getCanvas(width, height) {
    let canvasObject = {
        canvas: null,
        context: null
    }
    canvasObject.canvas = document.getElementById("canvas");
    canvasObject.context = canvasObject.canvas.getContext("2d");

    canvasObject.canvas.width = makeSize(width);
    canvasObject.canvas.height = makeSize(height);
    return canvasObject;

}


function drawImageOnCanvas(image, canvas, posX, posY, width, height) {
    canvas.context.drawImage(image, posX, posY, makeSize(width), makeSize(height));
    drawShapes(canvas, shapes)
}


function main(width, height, image) {
    const canvas = getCanvas(width, height);
    drawImageOnCanvas(image, canvas, 0, 0, width, height)
    shapes.push(getImageShape());

    for (let shape of getTextShapes()) {
        shapes.push(shape)
    }


    drawShapes(canvas, shapes);


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
        x: makeSize(326),
        y: makeSize(1724),
        width: makeSize(2181),
        height: makeSize(2665),
        color: 'red',
    }

    return imageShape;
}

function getTextShapes() {
    const textShapeWidth = 2500;
    const textShapeHeight = 470;
    let textShapes = [];
    const firstName = getShape(2729, 2032, textShapeWidth, textShapeHeight, "student_firstname")
    const lastname = getShape(2729, 3027, textShapeWidth, textShapeHeight, "student_lastname")
    const birthdate = getShape(2729, 4006, textShapeWidth, textShapeHeight, "student_birthdate")
    const valid = getShape(5772, 2033, textShapeWidth, textShapeHeight, "template_valid")
    const residence = getShape(5772, 3028, textShapeWidth, textShapeHeight, "student_residence")
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



