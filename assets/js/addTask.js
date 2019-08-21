function drop(event) {
    event.stopPropagation();
    event.preventDefault();

    var files = event.dataTransfer.files; //It returns a FileList object
    var filesInfo = "<table><thead><tr><th>Name</th><th>Size</th><th>Type</th><th>Modified Date</th></tr></thead>";

    for (var i = 0; i < files.length; i++) {
        var file = files[i];

        filesInfo += "<tr><td>" + file.name + "</td><td>" + file.size + " bytes" + "</td><td>" + file.type + "</td><td>" + file.lastModifiedDate + "</td></tr>";

    }
    filesInfo += "</table>";
    var output = document.getElementById("file_list");

    output.innerHTML = filesInfo;
}
