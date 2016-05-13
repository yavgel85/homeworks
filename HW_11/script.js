var fileUpload = document.getElementById("file"),
    uploadLabel = document.querySelector("label[for='file']"),
    fileInsert = document.createElement("button");
fileInsert.id = "fileSelector";
fileInsert.innerHTML = uploadLabel.innerHTML;
fileUpload.parentNode.insertBefore(fileInsert, fileUpload.nextSibling)
fileUpload.style.display = "none";
uploadLabel.style.display = "none";
fileInsert.addEventListener('click', function (e) {
    e.preventDefault();
    fileUpload.click();
}, false);